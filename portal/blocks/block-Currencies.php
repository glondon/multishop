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
/* $Id: block-Currencies.php,v 1.1.1.2 2005/11/21 13:51:12 tropic Exp $ */

if ( !defined('BLOCK_FILE') ) {
    Header("Location: ../index.php");
    die();
}

$MySelf = $_SERVER['PHP_SELF'];
$MyGet  = $MySelf . "?";
if ($_GET) {
  	foreach ($_GET as $k => $v) {
    		$_GET[$k] = $v;
    		if ($k != "new_currency"){
    			$MyGet .= "$k=$v&amp;";
    		}
  	}
} 
if (!$_GET['name'] && strstr($MySelf, "modules.php")){
	$MyGet = "index.php?";
}

global $db, $currentlang, $currentcurrency;

$result = $db->sql_query("SELECT code, title FROM " . TABLE_CURRENCIES . " ORDER BY title");

if ($db->sql_numrows($result) == 0 ) {
	$content = "<div align=\"center\"><br><font class=\"content\">"._CURRENCIES_NOT_FOUND."<br><br></font></div>";
} else {
    $content = "\n<div align=\"center\"><font class=\"content\">"._SELECTCURRENCY."<br><br></font>\n";
    $content .= "<form action=\"index.php\" method=\"get\">";
    $content .= "<select name=\"newcurrency\" onChange=\"top.location.href=this.options[this.selectedIndex].value\">\n";
    
    while($row = $db->sql_fetchrow($result)) { 
    	
    	$content .= "<option value=\"" . $MyGet . "newcurrency=$row[code]\"";
    	if ($row['code'] == $currentcurrency) $content .= " selected";
    	$content .= ">$row[title]</option>\n";	
    }
    $content .= "</select></form></div>\n";
}

?>