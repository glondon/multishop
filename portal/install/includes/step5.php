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
/* $Id: step5.php,v 1.2 2005/11/22 16:50:37 tropic Exp $ */

?>
<table width="100%" height="100%" class="content">
<tr><td valign="top">
<p class="title">
<? echo TITLE_CONFIGURATION . "<br><br></p>";

if (empty($HTTP_POST_VARS['DB_SERVER']) || empty($HTTP_POST_VARS['DB_SERVER_USERNAME']) || empty($HTTP_POST_VARS['DB_SERVER_PASSWORD']) || empty($HTTP_POST_VARS['DB_DATABASE'])) {
 	
		echo "<p class=\"title\">Error</p><p>" . MISSING_DATA . "</p>"
			."</td></tr><tr><td valign=\"bottom\">";
} else {

	$DB_SERVER = trim(stripslashes($HTTP_POST_VARS['DB_SERVER']));
    $DB_DATABASE = trim(stripslashes($HTTP_POST_VARS['DB_DATABASE']));
    $DB_SERVER_USERNAME = trim(stripslashes($HTTP_POST_VARS['DB_SERVER_USERNAME']));
    $DB_PREFIX = trim(stripslashes($HTTP_POST_VARS['DB_PREFIX']));
    $DB_USER_PREFIX = trim(stripslashes($HTTP_POST_VARS['DB_USER_PREFIX']));
    $DB_SERVER_PASSWORD = trim(stripslashes($HTTP_POST_VARS['DB_SERVER_PASSWORD']));
    $DB_TYPE = $HTTP_POST_VARS['DB_TYPE'];
    
    @include("includes/db.php");
    if ($problems_DB == 1 ){
		echo "<p class=\"title\">Error</p><p>" . ERROR_DB . "</p>";
			?>
			</td></tr>
			<tr><td valign="bottom">
			</form>
			<?

    } else {

		$script_filename = getenv('PATH_TRANSLATED');
		if (empty($script_filename)) {
			$script_filename = getenv('SCRIPT_FILENAME');
		}
		$script_filename = str_replace('\\', '/', $script_filename);
		$script_filename = str_replace('//', '/', $script_filename);
		$dir_fs_www_root_array = explode('/', dirname($script_filename));
		$dir_fs_www_root = array();
		for ($i=0, $n=sizeof($dir_fs_www_root_array)-1; $i<$n; $i++) {
			$dir_fs_www_root[] = $dir_fs_www_root_array[$i];
		}
  		$dir_fs_www_root = implode('/', $dir_fs_www_root) . '/';
		
		$sql_file = $dir_fs_www_root . 'install/includes/db/nuke.sql';
	    osc_set_time_limit(0);
	    $return = osc_db_install($sql_file);
		if ($return == -1 ){
			echo ERROR_SQL_FILE . $sql_file;
			echo "</td></tr><tr><td valign=\"bottom\">";
		} else {
			
			$res = $DB->sql_query("show tables");
			$num_tables = $DB->sql_numrows($res);
			$num_required = 108;
			if ($num_tables != $num_required ){
				echo '<p align="center" class="title">DataBase Error !!!</p>';
				echo IMPORT_PROBLEMS . $num_tables . TABLES_INSTEAD . $num_required . ".<br>" . IMPORT_MANUALLY . "'portal/install/includes/db/nuke.sql'.";
			} else {
				echo IMPORT_DB_OK . $num_tables . TABLES_ON . $num_required ;
			}
			echo "<br><br>";
			
			echo "<form name=\"form1\" action=\"index.php\" method=\"post\">";
			$www_location = 'http://' . getenv('HTTP_HOST') . getenv('SCRIPT_NAME');
			$www_location = substr($www_location, 0, strpos($www_location, 'install'));
?>
			<table bgcolor="#efefef" width="98%" border="0" cellpadding="2" align="center">
			  <tr>
			    <td width="18%" valign="top">Url Portal:</td>
			    <td width="48%" valign="top"><input type="text" name="HTTP_WWW_ADDRESS" size="40" value="<? echo $www_location; ?>"></td>
			    <td width="34%" valign="top"><font size="1"><? echo WEB_ADDRESS; ?></font></td>
			  </tr>
			  <tr>
			    <td width="18%" valign="middle"></td>
			    <td width="48%"></td>
			    <td width="34%" valign="middle"></td>
			  </tr>
			  <tr>
			    <td width="18%" valign="top">Full Path:</td>
			    <td width="48%" valign="top"><input type="text" name="DIR_FS_DOCUMENT_ROOT" size="40" value="<? echo $dir_fs_www_root; ?>"></td>
			    <td width="34%" valign="top"><font size="1"><? echo FULL_PATH; ?></font></td>
			  </tr>
			  <tr>
			    <td width="18%" valign="middle"></td>
			    <td width="48%"></td>
			    <td width="34%" valign="middle"></td>
			  </tr>
			  <tr>
			    <td width="18%" valign="top">Security Code:</td>
			    <td width="48%" valign="top">
				<select name="GFX_CHK">
				<option value="0">0 - No check</option>
				<option value="1">1 - Administrators login only</option>
				<option value="2">2 - Users login only</option>
				<option value="3">3 - New users registration only</option>
				<option value="4">4 - Users login and new users registr</option>
				<option value="5">5 - Admins and users login only</option>
				<option value="6">6 - Admins and new users registration</option>
				<option value="7">7 - Everywhere on all login options</option>
				</select>
			    <td width="34%" valign="top"><font size="1"><? echo SECURITY_CODE; ?></font></td>
			  </tr>
			  <tr>
			    <td width="18%" valign="middle"></td>
			    <td width="48%"></td>
			    <td width="34%" valign="middle"></td>
			  </tr>
			  <tr>
			    <td width="18%" valign="top">Admin File:</td>
			    <td width="48%" valign="top"><input type="text" name="ADMIN_FILE" size="12" value="admin" ><b>.php</b></td>
			    <td width="34%" valign="top"><font size="1"><? echo TEXT_ADMIN_FILE; ?></font></td>
			  </tr>
			  <tr>
			    <td width="18%" valign="middle"></td>
			    <td width="48%"></td>
			    <td width="34%" valign="middle"></td>
			  </tr>
              <tr>
                <td width="18%" valign="top" nowrap>Default Language:</td>
                <td width="48%" valign="top">
                <select name="DEFAULT_LANGUAGE">
                <option value="english">&nbsp;english&nbsp;</option>
                <option value="german">&nbsp;german&nbsp;</option>
                <option value="spanish">&nbsp;spanish&nbsp;</option>
                <option value="italian">&nbsp;italian&nbsp;</option>
                <option value="french">&nbsp;french&nbsp;</option>
                </select>
                </td>
                <td width="34%" valign="top"></td>
              </tr>
			  <tr>
			    <td width="18%" valign="middle"></td>
			    <td width="48%"></td>
			    <td width="34%" valign="middle"></td>
			  </tr>
			  <tr>
			    <td width="18%" valign="top" nowrap>Url Subscription:</td>
			    <td width="48%" valign="top"><input type="text" name="SUBSCRIPTION" size="36"></td>
			    <td width="34%" valign="top"><font size="1"><? echo TEXT_SUBSCRIPTION; ?></font></td>
			  </tr>
			  <tr>
			    <td width="18%" valign="middle"></td>
			    <td width="48%"></td>
			    <td width="34%" valign="middle"></td>
			  </tr>
              <tr>
                <td width="18%" valign="top" nowrap>Advanced Editor:</td>
                <td width="48%" valign="top">
                <select name="ADVANCED_EDITOR">
                <option value="0">0 - Editor Off&nbsp;</option>
                <option value="1">1 - Editor On&nbsp;</option>
                </select>
                </td>
                <td width="34%" valign="top"><font class="tiny"><? echo TEXT_ADVANCED_EDITOR; ?></font></td>
              </tr>
			</table>

<?
			reset($HTTP_POST_VARS);
			while (list($key, $value) = each($HTTP_POST_VARS)) {
				if (($key != 'x') && ($key != 'y') && ($key != 'step')) {
					if (is_array($value)) {
					    for ($i=0; $i<sizeof($value); $i++) {
					      echo osc_draw_hidden_field($key . '[]', $value[$i]);
					    }
					} else {
						echo osc_draw_hidden_field($key, $value);
					}
				}
			}
			?>
			</td></tr>
			<tr><td valign="bottom">
			<input type="hidden" name="step" value="6">
			<input type="image" src="images/next.gif" border="0" alt="next" title="next" align="right">
			</form>
			<?
		}
    }
}

?>
<form name="form2" action="index.php" method="post">
<input type="hidden" name="step" value="4">
<input type="hidden" name="choice" value="on">
<input type="image" src="images/back.gif" border="0" alt="back" title="back" align="left">
</form>
</td></tr>
</table>
