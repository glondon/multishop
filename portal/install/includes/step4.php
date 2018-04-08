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
/* $Id: step4.php,v 1.1.1.2 2005/11/21 13:51:19 tropic Exp $ */

?>
	<table width="100%" height="100%" class="content">
	<tr><td valign="top">
	<p class="title">
	<? echo TITLE_IMPORT_DB ; ?>
	</p>
	<p>
	<? echo "<br>" . TEXT_IMPORT_DB ; ?>
	<p>
	<br>
	<form name="form" action="index.php" method="post">
	<table bgcolor="#efefef" width="95%" border="0" cellpadding="2" align="center">
	  <tr>
	    <td width="25%" valign="middle">Database Server:</td>
	    <td width="35%"><input type="text" name="DB_SERVER" size="25" value="localhost"></td>
	    <td  width="40%" valign="middle"><font size="1">(eg. localhost, or IP)</font></td>
	  </tr>
	  <tr>
	    <td width="25%" valign="middle">Database Name:</td>
	    <td width="35%"><input type="text" name="DB_DATABASE" size="25"></td>
	    <td width="40%" valign="middle"><font class="tiny">(eg. nuke)</font></td>
	  </tr>
	  <tr>
	    <td width="25%" valign="middle">Username:</td>
	    <td width="35%"><input type="text" name="DB_SERVER_USERNAME" size="25"></td>
	    <td width="40%" valign="middle"><font class="tiny">User with full access to the DB</font></td>
	  </tr>
	  <tr>
	    <td width="25%" valign="middle">Password:</td>
	    <td width="35%"><input type="password" name="DB_SERVER_PASSWORD" size="25"></td>
	    <td width="40%" valign="middle"></td>
	  </tr>
	  <tr>
	    <td width="25%" valign="middle">Prefix:</td>
	    <td width="35%" valign="middle"><input type="text" name="DB_PREFIX" size="25" value="nuke" readonly style="color: #888888;"></td>
	    <td width="40%" valign="middle"><font class="tiny">default (suggested): nuke (*)</font></td>
	  </tr>
	  <input type="hidden" name="DB_USER_PREFIX" value="nuke">
<?
/*
	  <tr>
	    <td width="25%" valign="middle">User Prefix:</td>
	    <td width="35%"><input type="text" name="DB_USER_PREFIX" size="25" value="nuke"></td>
	    <td width="40%" valign="middle"><font class="tiny">(default: nuke)</font></td>
	  </tr>
*/
?>
	  <input type="hidden" name="DB_TYPE" value="MySQL">
<?
/*
	  <tr>
	    <td width="25%" valign="middle">DataBase Type:</td>
	    <td width="35%">
		<select name="DB_TYPE">
		<option value="MySQL">MySQL</option>
		<option value="msaccess">MSAccess</option>
		<option value="mssql">MSSQL</option>
		<option value="mssql-odbc">MsSql-ODBC</option>
		<option value="mysql4">MySQL4</option>
		<option value="oracle">Oracle</option>
		<option value="postgres">PostGres7</option>
		<option value="db2">DB2</option>
		</select>
	    <td width="40%" valign="middle"><font class="tiny">(default: MySQL)</font></td>
	  </tr>
*/
?>
	</table>
	<br><font class="tiny">(*) <? echo CHANGE_PREFIX; ?> <i>install/includes/db/nuke.sql</i>.</font>
	</td></tr>
	<tr><td valign="bottom">
	<input type="hidden" name="step" value="5">
	<input type="image" src="images/next.gif" border="0" alt="next" title="next" align="right">
	</form>
	<form name="form1" action="index.php" method="post">
	<input type="hidden" name="step" value="3">
	<input type="hidden" name="choice" value="on">
	<input type="image" src="images/back.gif" border="0" alt="back" title="back" align="left">
	</form>
	</td></tr>
	</table>
