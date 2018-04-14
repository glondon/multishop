<?php
/************************************************************************/
/* Php-MultiShop                                                        */
/* http://www.php-multishop.com                                         */
/* Copyright (c) 2003-2005 by Piero Trono                               */
/* ======================================                               */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/
/* $Id: currencies.php,v 1.1.1.1 2005/11/21 13:48:06 tropic Exp $ */

if ($radminsuper == 1 || $auth_user == 1) {
	
	function listcurrencies(){
		global $prefix, $cookie, $currentlang, $multilingual, $db, $admin_file;
	    $result = $db->sql_query("SELECT currencies_id, title, code, value FROM currencies order by title");
	    OpenTable();
	    if (!$db->sql_numrows($result)){
			echo "<center><font class=\"title\"><b>" . _NOT_CURRENCIES . "</b></font></center>";
	    } else {
	    	echo "<table border=\"0\"><tr><td>&nbsp;<b>" . _CURRENCY . "</b>&nbsp;</td><td>&nbsp;<b>" . _CODE . "</b>&nbsp;</td><td>&nbsp;<b>" . _VALUE . "</b>&nbsp;</td><td>&nbsp;<b>" . _ACTIONS . "</b>&nbsp;</td></tr>";
			while ($row = $db->sql_fetchrow($result)) {
		    	echo "<tr><td>&nbsp;";
		    	if(DEFAULT_CURRENCY == $row['code']) echo "<b>".$row['title']."&nbsp;(default)</b>";
		    	else echo $row['title'];
		    	echo "</td><td>&nbsp;".$row['code']."&nbsp;</td><td>&nbsp;". number_format($row['value'], 8) ."&nbsp;</td>"
		    		."<td>&nbsp;&nbsp;[&nbsp;<a href=\"".$admin_file.".php?op=edit_curr&amp;currencies_id=".$row['currencies_id']."\">Edit</a>&nbsp;";
		    	if(DEFAULT_CURRENCY != $row['code']) echo "-&nbsp;<a href=\"".$admin_file.".php?op=del_curr&amp;step=1&amp;currencies_id=".$row['currencies_id']."\">Delete</a>&nbsp;-&nbsp;<a href=\"".$admin_file.".php?op=default_curr&amp;currencies_id=".$row['currencies_id']."\">Set as Default</a>&nbsp;";
		    	echo "]</td></tr>";
		    }
			echo "</table>";
		}
		echo "<br><br><a href=\"".$admin_file.".php?op=add_curr\">" . _ADD_CURRENCY . "</a>";
		CloseTable();
	}
	
	function deletecurrency(){
	    global $step, $cookie, $currencies_id, $currentlang, $multilingual, $db, $admin_file;
	    if (intval($currencies_id)){
	    	$result = $db->sql_query("SELECT currencies_id, code, title FROM currencies WHERE currencies_id='" . $currencies_id . "'");
	    	$row = $db->sql_fetchrow($result);
	        if($step == 1){
	        	OpenTable();
				echo "<center><font class=\"title\">" . _WARNING_DELETE . " " .$row['title']." ?\n";
				echo "<br><br>[&nbsp;&nbsp;\n";
				echo "<a href=\"".$admin_file.".php?op=del_curr&amp;step=2&amp;currencies_id=$currencies_id\">" . _YES . "</a>&nbsp;&nbsp;-&nbsp;&nbsp;\n";
				echo "<a href=\"".$admin_file.".php?op=multishop\">"  . _NO ."</a>&nbsp;&nbsp;]</font></center>";
				CloseTable();
			} elseif ($step == 2 &&  $row['code'] != DEFAULT_CURRENCY) {
				$db->sql_query("DELETE FROM currencies WHERE currencies_id='" . $currencies_id . "'");
			}
	    }
	    echo "<br>";
	}
	
	function set_default(){
		global $cookie, $currencies_id, $currentlang, $multilingual, $db, $admin_file;
		if (intval($currencies_id)){
	    	$result = $db->sql_query("SELECT code FROM currencies WHERE currencies_id='" . $currencies_id . "'");
	    	$row = $db->sql_fetchrow($result);
			$db->sql_query("update configuration_common_stores set configuration_value = '" . $row['code'] . "' where configuration_key = 'DEFAULT_CURRENCY'");
		}
	}
	
	function add_currency(){
		global $cookie, $currencies_id, $currentlang, $multilingual, $db, $admin_file;
		OpenTable();
		echo '<center>' . TEXT_INFO_INSERT_INTRO . '</center>'
			.'<form name="form1" action="'.$admin_file.'.php" method="post">'
			.'<br>' . TEXT_INFO_CURRENCY_TITLE . '<br>'
			.'<input type="text" name="title"><br>'
			.'<br>' . TEXT_INFO_CURRENCY_CODE . '<br>'
			.'<input type="text" name="code"><br>'
			.'<br>' . TEXT_INFO_CURRENCY_SYMBOL_LEFT . '<br>'
			.'<input type="text" name="symbol_left"><br>'
			.'<br>' . TEXT_INFO_CURRENCY_SYMBOL_RIGHT . '<br>'
			.'<input type="text" name="symbol_right"><br>'
			.'<br>' . TEXT_INFO_CURRENCY_DECIMAL_POINT . '<br>'
			.'<input type="text" name="decimal_point"><br>'
			.'<br>' . TEXT_INFO_CURRENCY_THOUSANDS_POINT . '<br>'
			.'<input type="text" name="thousands_point"><br>'
			.'<br>' . TEXT_INFO_CURRENCY_DECIMAL_PLACES . '<br>'
			.'<input type="text" name="decimal_places"><br>'
			.'<br>' . TEXT_INFO_CURRENCY_VALUE . '<br>'
			.'<input type="text" name="value"><br>'
			.'<br><input type="submit" name="sub">&nbsp;&nbsp;<input type="reset" name="reset">'
			.'<input type="hidden" name="op" value="insert_curr">'
			.'</form>';
		CloseTable();
	}
	
	function insert_currency(){
		
		global $HTTP_POST_VARS, $cookie, $currencies_id, $currentlang, $multilingual, $db, $admin_file;
	        $title = $HTTP_POST_VARS['title'];
	        $code = $HTTP_POST_VARS['code'];
	        $symbol_left = $HTTP_POST_VARS['symbol_left'];
	        $symbol_right = $HTTP_POST_VARS['symbol_right'];
	        $decimal_point = $HTTP_POST_VARS['decimal_point'];
	        $thousands_point = $HTTP_POST_VARS['thousands_point'];
	        $decimal_places = $HTTP_POST_VARS['decimal_places'];
	        $value = $HTTP_POST_VARS['value'];
	
	        $sql_data_array = array('title' => $title,
	                                'code' => $code,
	                                'symbol_left' => $symbol_left,
	                                'symbol_right' => $symbol_right,
	                                'decimal_point' => $decimal_point,
	                                'thousands_point' => $thousands_point,
	                                'decimal_places' => $decimal_places,
	                                'value' => $value);
		tep_db_perform("currencies", $sql_data_array);
		
	}
	function edit_currency(){
		global $cookie, $currencies_id, $currentlang, $multilingual, $db, $admin_file;
		OpenTable();
		if (intval($currencies_id)){
			$result = $db->sql_query("SELECT * FROM currencies WHERE currencies_id='" . $currencies_id . "'");
			$row = $db->sql_fetchrow($result);
			echo '<center>' . TEXT_INFO_EDIT_INTRO . '</center>' . "\n"
				.'<form name="form2" action="'.$admin_file.'.php" method="post">' . "\n"
				.'<br>' . TEXT_INFO_CURRENCY_TITLE . '<br>' . "\n"
				.'<input type="text" name="title" value="'.$row['title'].'"><br>' . "\n"
				.'<br>' . TEXT_INFO_CURRENCY_CODE . '<br>' . "\n"
				.'<input type="text" name="code" value="'.$row['code'].'"><br>' . "\n"
				.'<br>' . TEXT_INFO_CURRENCY_SYMBOL_LEFT . '<br>' . "\n"
				.'<input type="text" name="symbol_left" value="'.$row['symbol_left'].'"><br>' . "\n"
				.'<br>' . TEXT_INFO_CURRENCY_SYMBOL_RIGHT . '<br>' . "\n"
				.'<input type="text" name="symbol_right" value="'.$row['symbol_right'].'"><br>' . "\n"
				.'<br>' . TEXT_INFO_CURRENCY_DECIMAL_POINT . '<br>' . "\n"
				.'<input type="text" name="decimal_point" value="'.$row['decimal_point'].'"><br>' . "\n"
				.'<br>' . TEXT_INFO_CURRENCY_THOUSANDS_POINT . '<br>' . "\n"
				.'<input type="text" name="thousands_point" value="'.$row['thousands_point'].'"><br>' . "\n"
				.'<br>' . TEXT_INFO_CURRENCY_DECIMAL_PLACES . '<br>' . "\n"
				.'<input type="text" name="decimal_places" value="'.$row['decimal_places'].'"><br>' . "\n"
				.'<br>' . TEXT_INFO_CURRENCY_VALUE . '<br>' . "\n"
				.'<input type="text" name="value" value="'.$row['value'].'"><br>' . "\n"
				.'<br><input type="submit" name="sub">&nbsp;&nbsp;<input type="reset" name="reset">' . "\n"
				.'<input type="hidden" name="currencies_id" value="' . $row['currencies_id'] . '">' . "\n"
				.'<input type="hidden" name="op" value="save_curr">'
				.'</form>';
		}
		CloseTable();
	}
	
	function save_currency(){
		global $HTTP_POST_VARS, $cookie, $currentlang, $multilingual, $db, $admin_file;
	    if (intval($HTTP_POST_VARS['currencies_id'])){
	    	$c_id = $HTTP_POST_VARS['currencies_id'];
			$title = $HTTP_POST_VARS['title'];
			$code = $HTTP_POST_VARS['code'];
			$symbol_left = $HTTP_POST_VARS['symbol_left'];
			$symbol_right = $HTTP_POST_VARS['symbol_right'];
			$decimal_point = $HTTP_POST_VARS['decimal_point'];
			$thousands_point = $HTTP_POST_VARS['thousands_point'];
			$decimal_places = $HTTP_POST_VARS['decimal_places'];
			$value = $HTTP_POST_VARS['value'];
			
			$sql_data_array = array('title' => $title,
			                        'code' => $code,
			                        'symbol_left' => $symbol_left,
			                        'symbol_right' => $symbol_right,
			                        'decimal_point' => $decimal_point,
			                        'thousands_point' => $thousands_point,
			                        'decimal_places' => $decimal_places,
			                        'value' => $value);
			tep_db_perform("currencies", $sql_data_array, 'update', "currencies_id = '" . (int)$c_id . "'");
		}
	}

}
?>
