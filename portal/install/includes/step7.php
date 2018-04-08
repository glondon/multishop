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
/* $Id: step7.php,v 1.1.1.2 2005/11/21 13:51:20 tropic Exp $ */

?>
<table width="100%" height="100%" class="content">
<tr><td valign="top">
<?

if ($HTTP_POST_VARS['stop'] == 1 || empty($HTTP_POST_VARS['name']) || empty($HTTP_POST_VARS['email']) || empty($HTTP_POST_VARS['pwd'])){
	
	echo "<p class=\"title\">" . TITLE_CREATE_ADMIN . "</p>";

	echo "<br>" . ADMIN_STOP;
	
?>
	<br<br>
	<form name="form1" action="index.php" method="post">
	<input type="hidden" name="step" value="7">
	<table bgcolor="#efefef" width="95%" border="0" cellpadding="2" align="center">
	  <tr>
	    <td width="30%" valign="top">Nickname:</td>
	    <td width="70%" valign="top"><input type="text" name="name" size="32" value="<? echo $HTTP_POST_VARS['name']; ?>"> <font class="tiny">(required)</font></td>
	  </tr>
	  <tr>
	    <td width="30%" valign="top">Home Page:</td>
	    <td width="70%" valign="top"><input type="text" name="url" size="32" value="<? echo $HTTP_POST_VARS['url']; ?>"></td>
	  </tr>
	  <tr>
	    <td width="30%" valign="top">Email:</td>
	    <td width="70%" valign="top"><input type="text" name="email" size="32" value="<? echo $HTTP_POST_VARS['email']; ?>"> <font class="tiny">(required)</font></td>
	  </tr>
	  <tr>
	    <td width="30%" valign="top">Password:</td>
	    <td width="70%" valign="top"><input type="password" name="pwd" size="32"> <font class="tiny">(required)</font></td>
	  </tr>
	  <tr>
	    <td width="45%" valign="top"><? echo CREATE_USER; ?></td>
	    <td width="55%" valign="top">
	    <input type="radio" name="user_new" value="1"> Yes &nbsp;&nbsp;
	    <input type="radio" name="user_new" value="0" checked> No 
	    </td>
	  </tr>
	</table>
	<input type="hidden" name="SITE_URL" value="<? echo $HTTP_POST_VARS['SITE_URL'];?>">
	<input type="hidden" name="PATH_CONFIG" value="<? echo $HTTP_POST_VARS['PATH_CONFIG'];?>">
	<?
	while (list($key, $value) = each($HTTP_POST_VARS)) {
		if (preg_match("/DB_/",$key)) {
			echo osc_draw_hidden_field($key, $value);
		}
	}
	?>
	</td></tr>
	<tr><td valign="bottom">
	<input type="image" src="images/next.gif" border="0" alt="next" title="next" align="right">
	</form>
	<?

} else {
	
	echo "<p class=\"title\">" . TITLE_FINISH . "</p>";
	
	if (is_writeable($HTTP_POST_VARS['PATH_CONFIG'] . 'config.php')) echo "<br><font color=\"red\"><b>Warning</b></font>: " . WARNING_CHMOD ;
	
	$DB_SERVER = trim(stripslashes($HTTP_POST_VARS['DB_SERVER']));
	$DB_DATABASE = trim(stripslashes($HTTP_POST_VARS['DB_DATABASE']));
	$DB_SERVER_USERNAME = trim(stripslashes($HTTP_POST_VARS['DB_SERVER_USERNAME']));
	$DB_PREFIX = trim(stripslashes($HTTP_POST_VARS['DB_PREFIX']));
	$DB_USER_PREFIX = trim(stripslashes($HTTP_POST_VARS['DB_USER_PREFIX']));
	$DB_SERVER_PASSWORD = trim(stripslashes($HTTP_POST_VARS['DB_SERVER_PASSWORD']));
	$DB_TYPE = $HTTP_POST_VARS['DB_TYPE'];
	$ADMIN_FILE = $HTTP_POST_VARS['ADMIN_FILE'];
	@include("includes/db.php");
	
	create_first($HTTP_POST_VARS['name'], $HTTP_POST_VARS['url'], $HTTP_POST_VARS['email'], $HTTP_POST_VARS['pwd'], $HTTP_POST_VARS['user_new']);
	echo "<br><br>" . ADMIN_CREATED . "<br><br>" ;
?>
	<table bgcolor="#efefef" width="50%" border="0" cellpadding="2" align="center">
	  <tr>
	    <td>
			<ul>
			<li><font color="red"><b>Site Name</b></font></li>
			<li><font color="red"><b>Site URL</b></font></li>
			<li>Site Slogan</li>
			<li><font color="red"><b>Administrator Email</b></font></li>
			<li>...</li>
			</ul>
	    </td>
	  </tr>
	</table>
	<br>
	<? echo "<font class=\"tiny\">" . MORE_CONFIGURATION . "</font>"; ?>
	</td></tr><tr><td valign="top" align="center">
<?
	
	if ($HTTP_POST_VARS['ADMIN_FILE'] != "admin") {
		$ADMIN_FILE = $HTTP_POST_VARS['ADMIN_FILE'] . ".php";
		echo RENAME_ADMIN_FILE . "'<b>$ADMIN_FILE</b>'<br><br>";
	} else {
		$ADMIN_FILE = "admin.php";
	}
?>
	<form name="form3" action="<? echo $HTTP_POST_VARS['SITE_URL'] . $ADMIN_FILE; ?>" method="post">
	<input type="image" src="images/login.gif" border="0" alt="Login Admin" title="Login Admin" align="center">
	</form>
	<br>
<?

	echo DELETE_FOLDER ;
}

?>
</td></tr>
</table>