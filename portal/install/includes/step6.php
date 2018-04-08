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
/* $Id: step6.php,v 1.1.1.2 2005/11/21 13:51:20 tropic Exp $ */

?>
<table width="100%" height="100%" class="content">
<tr><td valign="top">
<p class="title"><? echo TITLE_CREATE_ADMIN; ?></p>
<br>
<p><? echo WRITE_CONFIG; ?></p>
<?

$dir_fs_document_root = $HTTP_POST_VARS['DIR_FS_DOCUMENT_ROOT'];
if ((substr($dir_fs_document_root, -1) != '/') && (substr($dir_fs_document_root, -1) != '/')) {
	$where = strrpos($dir_fs_document_root, '\\');
    if (is_string($where) && !$where) {
		$dir_fs_document_root .= '/';
    } else {
		$dir_fs_document_root .= '\\';
    }
}

if (!file_exists($dir_fs_document_root . 'config.php')){
	
	echo "</td></tr><tr><td valign=\"top\"><p>"
		. NOT_EXISTS
		."<div align=\"center\"><b>" . $dir_fs_document_root . "config.php</b></div>";
?>
<?	
	echo "<form name=\"form1\" action=\"index.php\" method=\"post\">";
	while (list($key, $value) = each($HTTP_POST_VARS)) {
		if (($key != 'x') && ($key != 'y')) {
			echo osc_draw_hidden_field($key, $value);
		}
	}
} elseif (file_exists($dir_fs_document_root . 'config.php') && !is_writeable($dir_fs_document_root . 'config.php')) {

	echo "</td></tr><tr><td valign=\"middle\"><p>"
		. NOT_WRITABLE;
?>
	<br><br><table cellpadding="6"><tr><td width="30"></td>
	<td width="400" bgcolor="#000000">
	<font color="#ffffff">
	<br>
	<? echo "root@localhost#&nbsp;&nbsp;&nbsp;&nbsp;chmod 666 config.php&nbsp;" ; ?>
	<br><br>
	</font>
	</td></tr>
	</table>
<?	
	echo "<form name=\"form1\" action=\"index.php\" method=\"post\">";
	while (list($key, $value) = each($HTTP_POST_VARS)) {
		if (($key != 'x') && ($key != 'y')) {
			echo osc_draw_hidden_field($key, $value);
		}
	}
} else {

	$file_contents = '<?php' . "\n\n" .
	'######################################################################' . "\n" .
	'# PHP-NUKE: Advanced Content Management System' . "\n" .
	'# ============================================' . "\n" .
	'#' . "\n" .
	'# Copyright (c) 2005 by Francisco Burzi' . "\n" .
	'# http://phpnuke.org' . "\n" .
	'#' . "\n" .
	'# This program is free software. You can redistribute it and/or modify' . "\n" .
	'# it under the terms of the GNU General Public License as published by' . "\n" .
	'# the Free Software Foundation; either version 2 of the License.' . "\n" .
	'######################################################################' . "\n" .
	'#                     Nuke Patch version: 3.1' . "\n" .
	'######################################################################' . "\n" .
	'#  changed by Piero Trono (c) 2005 for http://php-multishop.com      #' . "\n" .
	'######################################################################' . "\n" .
	'' . "\n" .
	'if (stristr(htmlentities($_SERVER[\'PHP_SELF\']), "config.php")) {' . "\n" .
	'    Header("Location: index.php");' . "\n" .
	'    die();' . "\n" .
	'}' . "\n" .
	'' . "\n" .
	'######################################################################' . "\n" .
	'# Database & System Config' . "\n" .
	'#' . "\n" .
	'# dbhost:       SQL Database Hostname' . "\n" .
	'# dbuname:      SQL Username' . "\n" .
	'# dbpass:       SQL Password' . "\n" .
	'# dbname:       SQL Database Name' . "\n" .
	'# $prefix:      Your Database table\'s prefix' . "\n" .
	'# $user_prefix: Your Users\' Database table\'s prefix (To share it)' . "\n" .
	'# $dbtype:      Your Database Server type. Supported servers are:' . "\n" .
	'#               MySQL, mysql4, postgres, mssql, oracle, msaccess,' . "\n" .
	'#               db2 and mssql-odbc' . "\n" .
	'#               Be sure to write it exactly as above, case SeNsItIvE!' . "\n" .
	'# $sitekey:	Security Key. CHANGE it to whatever you want, as long' . "\n" .
	'#               as you want. Just don\'t use quotes.' . "\n" .
	'# $gfx_chk:	Set the graphic security code on every login screen,' . "\n" .
	'#		You need to have GD extension installed:' . "\n" .
	'#		0: No check' . "\n" .
	'#		1: Administrators login only' . "\n" .
	'#		2: Users login only' . "\n" .
	'#		3: New users registration only' . "\n" .
	'#		4: Both, users login and new users registration only' . "\n" .
	'#		5: Administrators and users login only' . "\n" .
	'#		6: Administrators and new users registration only' . "\n" .
	'#		7: Everywhere on all login options (Admins and Users)' . "\n" .
	'#		NOTE: If you aren\'t sure set this value to 0' . "\n" .
	'# $subscription_url : If you manage subscriptions on your site, you' . "\n" .
	'#                     must write here the url of the subscription' . "\n" .
	'#                     information/renewal page. This will send by' . "\n" .
	'#                     email if set.' . "\n" .
	'# $admin_file: Administration panel filename. "admin" by default for' . "\n" .
	'#		   "admin.php". To improve security please rename the file' . "\n" .
	'#              "admin.php" and change the $admin_file value to the' . "\n" .
	'#              new filename (without the extension .php)' . "\n" .
	'# $tipath:          Path to where the topic images are stored.' . "\n" .
    '# $advanced_editor: On/Off the advanced WYSIWYG text editor for admins' . "\n" .
    '#                   0: Off, will use the default simple text editor' . "\n" .
    '#                   1: On, will use the full featured text editor' . "\n" .
	'# $display_errors: Debug control to see PHP generated errors.' . "\n" .
	'#                   false: Don\'t show errors' . "\n" .
	'#                   true: See all errors ( No notices )' . "\n" .
	'######################################################################' . "\n" .
	'' . "\n" .
	'$dbhost = "' . trim(stripslashes($HTTP_POST_VARS['DB_SERVER'])) . '";' . "\n" .
	'$dbuname = "' . trim(stripslashes($HTTP_POST_VARS['DB_SERVER_USERNAME'])) . '";' . "\n" .
	'$dbpass = "' . trim(stripslashes($HTTP_POST_VARS['DB_SERVER_PASSWORD'])) . '";' . "\n" .
	'$dbname = "' . trim(stripslashes($HTTP_POST_VARS['DB_DATABASE'])) . '";' . "\n" .
	'$prefix = "' . trim(stripslashes($HTTP_POST_VARS['DB_PREFIX'])) . '";' . "\n" .
	'$user_prefix = "nuke";' . "\n" .
	'$dbtype = "' . $DB_TYPE . '";' . "\n" .
	'$sitekey = "SdFk*fa28367-dm56w69.3a2fDS+e9";' . "\n" .
	'$gfx_chk = ' . trim(stripslashes($HTTP_POST_VARS['GFX_CHK'])) . ';' . "\n" .
	'$subscription_url = "' . trim(stripslashes($HTTP_POST_VARS['SUBSCRIPTION'])) . '";' . "\n" .
	'$admin_file = "' . trim(stripslashes($HTTP_POST_VARS['ADMIN_FILE'])) . '";' . "\n" .
	'$tipath = "images/topics/";' . "\n" .
	'$advanced_editor = ' . trim(stripslashes($HTTP_POST_VARS['ADVANCED_EDITOR'])) . ';' . "\n" .
	'$display_errors = false;' . "\n" .
	'' . "\n" .
	'define("STORE_PREFIX", "Multi-Shop"); // anything, a prefix for your mall-portal' . "\n" .
	'define("NAME_MARKET_PLACE", "Multi-Shop");' . "\n" .
	'define("DEFAULT_LANGUAGE", "' . trim(stripslashes($HTTP_POST_VARS['DEFAULT_LANGUAGE'])) . '");' . "\n" .
	'' . "\n" .
	'$lang_id["english"] = 1;' . "\n" .
	'$lang_id["german"]  = 2;' . "\n" .
	'$lang_id["spanish"] = 3;' . "\n" .
	'$lang_id["italian"] = 4;' . "\n" .
	'$lang_id["french"]  = 5;' . "\n" .
	'' . "\n" .
	'define("HTTP_SERVER", "' . $HTTP_POST_VARS['HTTP_WWW_ADDRESS'] . '"); // eg, http://www.yoursite.com/ - should not be NULL for productive servers' . "\n" .
	'define("HTTPS_SERVER", ""); // eg, https://www.yoursite.com/ - should not be NULL for productive servers' . "\n" .
	'define("ENABLE_SSL", false); // secure webserver for checkout procedure?' . "\n" .
	'define("DIR_FS_DOCUMENT_ROOT", "' . $dir_fs_document_root . '"); // IMPORTANT: it\'s the absolut path on server where is located the current file' . "\n" .
	'define("DIR_WS_INCLUDES", DIR_FS_DOCUMENT_ROOT . "includes/oscommerce/");' . "\n" .
	'' . "\n" .
	'define("ENTRY_FIRST_NAME_MIN_LENGTH", "3");' . "\n" .
	'define("ENTRY_LAST_NAME_MIN_LENGTH", "3");' . "\n" .
	'define("ENTRY_TELEPHONE_MIN_LENGTH", "6");' . "\n" .
	'define("ENTRY_STREET_ADDRESS_MIN_LENGTH", "3");' . "\n" .
	'define("ENTRY_CITY_MIN_LENGTH", "2");' . "\n" .
	'define("ENTRY_STATE_PROVINCE_MIN_LENGTH", "2");' . "\n" .
	'define("ENTRY_STATE_MIN_LENGTH", "2");' . "\n" .
	'define("ENTRY_POSTCODE_MIN_LENGTH", "4");' . "\n" .
	'' . "\n" .
	'/*********************************************************************/' . "\n" .
	'/* You finished to configure the Database. Now you can change all    */' . "\n" .
	'/* you want in the Administration Section.   To enter just launch    */' . "\n" .
	'/* you web browser pointing to http://yourdomain.com/admin.php       */' . "\n" .
	'/*                                                                   */' . "\n" .
	'/* Remeber to go to Settings section where you can configure your    */' . "\n" .
	'/* new site. In that menu you can change all you need to change.     */' . "\n" .
	'/*                                                                   */' . "\n" .
	'/* Congratulations! now you have an automated news portal!           */' . "\n" .
	'/* Thanks for choose PHP-Nuke: The Future of the Web                 */' . "\n" .
	'/*********************************************************************/' . "\n" .
	'' . "\n" .
	'// DO NOT TOUCH ANYTHING BELOW THIS LINE UNTIL YOU KNOW WHAT YOU\'RE DOING' . "\n" .
	'' . "\n" .
    '$reasons = array("As Is","Offtopic","Flamebait","Troll","Redundant","Insighful","Interesting","Informative","Funny","Overrated","Underrated");' . "\n" .
    '$badreasons = 4;' . "\n" .
    '$AllowableHTML = array("b"=>1,"i"=>1,"u"=>1,"div"=>2,"a"=>2,"em"=>1,"br"=>1,"strong"=>1,"blockquote"=>1,"tt"=>1,"li"=>1,"ol"=>1,"ul"=>1);' . "\n" .
    '$CensorList = array("fuck","cunt","fucker","fucking","pussy","cock","c0ck","cum","twat","clit","bitch","fuk","fuking","motherfucker");' . "\n" .
    '' . "\n" .
    '//***************************************************************' . "\n" .
    '// IF YOU WANT TO LEGALY REMOVE ANY COPYRIGHT NOTICES PLAY FAIR AND CHECK: http://phpnuke.org/modules.php?name=Commercial_License' . "\n" .
    '// COPYRIGHT NOTICES ARE GPL SECTION 2(c) COMPLIANT AND CAN\'T BE REMOVED WITHOUT PHP-NUKE\'S AUTHOR WRITTEN AUTHORIZATION' . "\n" .
    '// THE USE OF COMMERCIAL LICENSE MODE FOR PHP-NUKE HAS BEEN APPROVED BY THE FSF (FREE SOFTWARE FOUNDATION)' . "\n" .
    '// YOU CAN REQUEST INFORMATION ABOUT THIS TO GNU.ORG REPRESENTATIVE. THE EMAIL THREAD REFERENCE IS #213080' . "\n" .
    '// YOU\'RE NOT AUTHORIZED TO CHANGE THE FOLLOWING VARIABLE\'S VALUE UNTIL YOU ACQUIRE A COMMERCIAL LICENSE' . "\n" .
    '// (http://phpnuke.org/modules.php?name=Commercial_License)' . "\n" .
    '//***************************************************************' . "\n" .
    '$commercial_license = 0;' . "\n" .
    '//Nuke Patched 3.1' . "\n" .
    '?>';


    $fp = fopen($dir_fs_document_root . 'config.php', 'w');
    fputs($fp, $file_contents);
    fclose($fp);
	echo "<br>" . WRITE_OK . "<br>"
		."<font class=\"title\" color=\"red\">Important</font>: " . RETRY_CHMOD . "<br><br>" . CREATE_ADMIN
		."<br><br>\n<form name=\"form1\" action=\"index.php\" method=\"post\">\n"
		."<input type=\"hidden\" name=\"step\" value=\"7\">\n";
?>
	<table bgcolor="#efefef" width="95%" border="0" cellpadding="2" align="center">
	  <tr>
	    <td width="30%" valign="top">Nickname:</td>
	    <td width="70%" valign="top"><input type="text" name="name" size="32" value="<? echo $www_location; ?>"> <font size="1">(required)</font></td>
	  </tr>
	  <tr>
	    <td width="30%" valign="top">Home Page:</td>
	    <td width="70%" valign="top"><input type="text" name="url" size="32"></td>
	  </tr>
	  <tr>
	    <td width="30%" valign="top">Email:</td>
	    <td width="70%" valign="top"><input type="text" name="email" size="32"> <font size="1">(required)</font></td>
	  </tr>
	  <tr>
	    <td width="30%" valign="top">Password:</td>
	    <td width="70%" valign="top"><input type="password" name="pwd" size="32"> <font size="1">(required)</font></td>
	  </tr>
	  <tr>
	    <td width="45%" valign="top"><? echo CREATE_USER; ?></td>
	    <td width="55%" valign="top">
	    <input type="radio" name="user_new" value="1"> Yes &nbsp;&nbsp;
	    <input type="radio" name="user_new" value="0" checked> No 
	    </td>
	  </tr>
	</table>
	<input type="hidden" name="SITE_URL" value="<? echo $HTTP_POST_VARS['HTTP_WWW_ADDRESS'];?>">
	<input type="hidden" name="PATH_CONFIG" value="<? echo $dir_fs_document_root;?>">
<?
}

while (list($key, $value) = each($HTTP_POST_VARS)) {
	if (preg_match("/DB_/",$key) || $key == "ADMIN_FILE") {
		//echo "<br> $key: $value";
		echo osc_draw_hidden_field($key, $value);
	}
}

?>
</td></tr>
<tr><td valign="bottom">
<input type="image" src="images/next.gif" border="0" alt="next" title="next" align="right">
</form>

<form name="form2" action="index.php" method="post">
<input type="hidden" name="step" value="5">
<input type="hidden" name="DB_SERVER" value="<? echo trim(stripslashes($HTTP_POST_VARS['DB_SERVER'])); ?>">
<input type="hidden" name="DB_DATABASE" value="<? echo trim(stripslashes($HTTP_POST_VARS['DB_DATABASE'])); ?>">
<input type="hidden" name="DB_SERVER_USERNAME" value="<? echo trim(stripslashes($HTTP_POST_VARS['DB_SERVER_USERNAME'])); ?>">
<input type="hidden" name="DB_PREFIX" value="<? echo trim(stripslashes($HTTP_POST_VARS['DB_PREFIX'])); ?>">
<input type="hidden" name="DB_USER_PREFIX" value="<? echo trim(stripslashes($HTTP_POST_VARS['DB_USER_PREFIX'])); ?>">
<input type="hidden" name="DB_SERVER_PASSWORD" value="<? echo trim(stripslashes($HTTP_POST_VARS['DB_SERVER_PASSWORD'])); ?>">
<input type="hidden" name="DB_TYPE" value="<? echo trim(stripslashes($HTTP_POST_VARS['DB_TYPE'])); ?>">
<input type="image" src="images/back.gif" border="0" alt="back" title="back" align="left">
</form>
</td></tr>
</table>