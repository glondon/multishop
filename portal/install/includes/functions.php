<?php

/************************************************************************/
/* Php-MultiShop                                                        */
/* http://www.php-multishop.com                                         */
/* Copyright (c) 2003-2005 by Piero Trono                               */
/* ======================================                               */
/*                                                                      */
/* This	program	is free	software. You can redistribute it and/or modify	*/
/* it under the	terms of the GNU General Public	License	as published by	*/
/* the Free Software Foundation; either	version	2 of the License.       */
/************************************************************************/
/* $Id: functions.php,v 1.1.1.2 2005/11/21 13:51:18 tropic Exp $ */


function tep_rand($min = null, $max = null) {
	static $seeded;

    if (!$seeded) {
		mt_srand((double)microtime()*1000000);
		$seeded = true;
	}

	if (isset($min) && isset($max)) {
		if ($min >= $max) {
        	return $min;
      	} else {
        	return mt_rand($min, $max);
      	}
    } else {
      	return mt_rand();
    }
}

function tep_encrypt_password($plain) {
    $password = '';
    for ($i=0; $i<10; $i++) {
      $password .= tep_rand();
    }
    $salt = substr(md5($password), 0, 2);
    $password = md5($salt . $plain) . ':' . $salt;
    return $password;
}

function create_first($name, $url, $email, $pwd, $user_new) {
    global $DB_PREFIX, $DB, $DB_USER_PREFIX;

    $first = $DB->sql_numrows($DB->sql_query("SELECT * FROM ".$DB_PREFIX."_authors"));
    if ($first == 0) {
		$pwd = md5($pwd);
		$the_adm = "God";
		$DB->sql_query("INSERT INTO ".$DB_PREFIX."_authors VALUES ('$name', '$the_adm', '$url', '$email', '$pwd', '0', '1', '')");
		if ($user_new == 1) {
		    $user_regdate = date("M d, Y");
		    $user_avatar = "gallery/blank.gif";
		    $commentlimit = 4096;
		    if ($url == "http://") { $url = ""; }
	            $DB->sql_query("INSERT INTO ".$DB_USER_PREFIX."_users (user_id, username, user_email, user_website, user_avatar, user_regdate, user_password, theme, commentmax, user_level, user_lang, user_dateformat) VALUES (NULL,'$name','$email','$url','$user_avatar','$user_regdate','$pwd','$Default_Theme','$commentlimit', '2', 'english','D M d, Y g:i a')");
#== // Php-MultiShop
			$u_id = $DB->sql_nextid();
			$crypted_password = tep_encrypt_password($pwd);
		    $DB->sql_query("INSERT INTO address_book (customers_id, entry_firstname) VALUES ('$u_id','$name') ");
		    //$DB->sql_query("INSERT INTO " . TABLE_ADDRESS_BOOK . " (customers_id, entry_firstname) VALUES ('$u_id','$name') ");
		    $address_id = $DB->sql_nextid();
			$DB->sql_query("INSERT INTO customers (customers_id, customers_firstname, customers_email_address, customers_password, customers_default_address_id) VALUES ('$u_id', '$name', '$email', '$crypted_password', '$address_id')");
#== //
		}
    }
}

function osc_in_array($value, $array) {
	if (!$array) $array = array();
	
	if (function_exists('in_array')) {
		if (is_array($value)) {
			for ($i=0; $i<sizeof($value); $i++) {
				if (in_array($value[$i], $array)) return true;
			}
			return false;
		} else {
			return in_array($value, $array);
		}
	} else {
		reset($array);
		while (list(,$key_value) = each($array)) {
			if (is_array($value)) {
				for ($i=0; $i<sizeof($value); $i++) {
					if ($key_value == $value[$i]) return true;
				}
			  	return false;
			} else {
			  	if ($key_value == $value) return true;
			}
		}
	}
	return false;
}

////
// Sets timeout for the current script.
// Cant be used in safe mode.
function osc_set_time_limit($limit) {
	if (!get_cfg_var('safe_mode')) {
	  	set_time_limit($limit);
	}
}

function osc_draw_input_field($name, $text = '', $type = 'text', $parameters = '', $reinsert_value = true) {
	$field = '<input type="' . $type . '" name="' . $name . '"';
	if ( ($key = $GLOBALS[$name]) || ($key = $GLOBALS['HTTP_GET_VARS'][$name]) || ($key = $GLOBALS['HTTP_POST_VARS'][$name]) || ($key = $GLOBALS['HTTP_SESSION_VARS'][$name]) && ($reinsert_value) ) {
	  	$field .= ' value="' . $key . '"';
	} elseif ($text != '') {
	  	$field .= ' value="' . $text . '"';
	}
	if ($parameters) $field.= ' ' . $parameters;
	$field .= '>';
	
	return $field;
}

function osc_draw_password_field($name, $text = '') {
	return osc_draw_input_field($name, $text, 'password', '', false);
}

function osc_draw_hidden_field($name, $value) {
	return '<input type="hidden" name="' . $name . '" value="' . $value . '">';
}

function osc_draw_selection_field($name, $type, $value = '', $checked = false) {
	$selection = '<input type="' . $type . '" name="' . $name . '"';
	if ($value != '') $selection .= ' value="' . $value . '"';
	if ( ($checked == true) || ($GLOBALS[$name] == 'on') || ($value == 'on') || ($value && $GLOBALS[$name] == $value) ) {
		$selection .= ' CHECKED';
	}
	$selection .= '>';
	
	return $selection;
}

function osc_draw_checkbox_field($name, $value = '', $checked = false) {
	return osc_draw_selection_field($name, 'checkbox', $value, $checked);
}

function osc_draw_radio_field($name, $value = '', $checked = false) {
	return osc_draw_selection_field($name, 'radio', $value, $checked);
}

function osc_db_install($sql_file) {
  	global $DB;
	
	if (file_exists($sql_file)) {
		$fd = fopen($sql_file, 'rb');
		$restore_query = fread($fd, filesize($sql_file));
		fclose($fd);
	} else {
		return -1;
	}
	$num_tables = 0;
	$sql_array = array();
	$sql_length = strlen($restore_query);
	$pos = strpos($restore_query, ';');
	for ($i=$pos; $i<$sql_length; $i++) {
		if ($restore_query[0] == '#') {
			$restore_query = ltrim(substr($restore_query, strpos($restore_query, "\n")));
			$sql_length = strlen($restore_query);
			$i = strpos($restore_query, ';')-1;
			continue;
		}
		if ($restore_query[($i+1)] == "\n") {
			for ($j=($i+2); $j<$sql_length; $j++) {
				if (trim($restore_query[$j]) != '') {
		  			$next = substr($restore_query, $j, 6);
					if ($next[0] == '#') {
						// find out where the break position is so we can remove this line (#comment line)
			    		for ($k=$j; $k<$sql_length; $k++) {
			    			if ($restore_query[$k] == "\n") break;
			    		}
						$query = substr($restore_query, 0, $i+1);
						$restore_query = substr($restore_query, $k);
						// join the query before the comment appeared, with the rest of the dump
						$restore_query = $query . $restore_query;
						$sql_length = strlen($restore_query);
						$i = strpos($restore_query, ';')-1;
						continue 2;
					}
	  				break;
				}
			}
			if ($next == '') { // get the last insert query
				$next = 'insert';
			}
			if ( (eregi('create', $next)) || (eregi('insert', $next)) || (eregi('drop t', $next)) ) {
				if (eregi('create', $next)) $num_tables ++;
				$next = '';
				$sql_array[] = substr($restore_query, 0, $i);
				$restore_query = ltrim(substr($restore_query, $i+1));
				$sql_length = strlen($restore_query);
				$i = strpos($restore_query, ';')-1;
			}
		}
	}
	
	for ($i=0; $i<sizeof($sql_array); $i++) {
		$DB->sql_query($sql_array[$i]);
	}
	return $num_tables;
}

?>
