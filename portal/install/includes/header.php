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
/* $Id: header.php,v 1.1.1.2 2005/11/21 13:51:19 tropic Exp $ */


@ini_set('display_errors', 1);
error_reporting(E_ALL^E_NOTICE);
if (!ini_get('register_globals')) {
  @import_request_variables("GPC", "");
}
$lang = "english";
if (isset($_GET['newlang'])){
	$new = $_GET['newlang'];
	setcookie("Lang", $new, time()+360000);
	$lang = $new;
} elseif (isset($_COOKIE['Lang'])) {
	$lang = $_COOKIE['Lang'];
} else {
	$lang = "english";
}

if (file_exists("includes/languages/".$lang.".php")){
	include("includes/languages/".$lang.".php");
} else {
	include("includes/languages/english.php");
}

@require("includes/functions.php");

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="template/style.css" type="text/css">
<title><? echo INSTALLATION_PHPMULTISHPOP; ?></title>
</head>

<body>
<table width="630" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3" height="50">
	    <h1 align="center">
	    <? echo INSTALLATION_PHPMULTISHPOP; ?>
	    </h1>
    </td>
  </tr>

  <tr>
    <td width="15" style="width:15px;"><img src="template/lu.gif" alt="" width="15" height="15" border="0"></td>
    <td width="600" bgcolor="#FFFFFF" style="width:600px;"><img src="template/26.gif" alt="" width="600" height="15" border="0"></td>
    <td width="15" style="width:15px;"><img src="template/ru.gif" alt="" width="15" height="15" border="0"></td>
  </tr>

  <tr>
    <td style="background-image:url(template/1.gif);background-repeat:repeat-y;" bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF" style="padding-left:3px;padding-right:3px;"  height="330"  valign="top">
