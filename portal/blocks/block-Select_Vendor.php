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
/* $Id: block-Select_Vendor.php,v 1.1.1.1 2005/11/21 13:47:35 tropic Exp $ */

if ( !defined('BLOCK_FILE') ) {
    Header("Location: ../index.php");
    die();
}

global $prefix, $db, $currentlang, $user, $Conf_Multishop;
if (is_user($user)) global $usession;

// if $display_as_tree is 1, the shops will be displayed as tree
if ($Conf_Multishop['mode_shops_block'] == "1") {
	$display_as_tree = 0;
} elseif ($Conf_Multishop['mode_shops_block'] == "2") {
	$display_as_tree = 1;
} else {
	$display_as_tree = rand(0,1);
}

$result = $db->sql_query("SELECT * FROM ".$prefix."_vendors WHERE vendors_type !='inactive' ORDER BY vendors_name");

$content0 = "";
$content1 = "";
if ($db->sql_numrows($result)){
	$content0 .= "<div align=\"center\">";
	$content0 .= "<br><form action=\"index.php\" method=\"get\">";
	$content0 .= "\n<select name=\"sel_vendor\" onChange=\"if (this.options[this.selectedIndex].value != 0) { window.open(this.options[this.selectedIndex].value)}\">";
	$content0 .= "\n<option selected value =\"\">"._SELECT_VENDOR."</option>\n";
	
	if (is_user($user) ){
		
		while ($row = $db->sql_fetchrow($result)) {
			if ($row['vendors_type'] == "external"){
				$content0 .= "<option value = \"http://" . $row['vendors_host'] . "\">" . $row['vendors_name'] . "</option>\n";
			    $content1 .= "<strong><big>&middot;</big></strong>&nbsp;<a href=\"http://$row[vendors_host]\" target=\"blank\">$row[vendors_name]</a><br>\n";
			} else {
			    $row[vendors_host] = ereg_replace("index.php","login.php?usession=$usession",$row[vendors_host]);
			    $content0 .= "<option value = \"http://$row[vendors_host]\">$row[vendors_name]</option>\n";
			    $content1 .= "<strong><big>&middot;</big></strong>&nbsp;<a href=\"http://$row[vendors_host]\" target=\"blank\">$row[vendors_name]</a><br>\n";
			}
		}
	
	} else {
		while ($row = $db->sql_fetchrow($result)) {
		    $content0 .= "<option value = \"http://$row[vendors_host]\">$row[vendors_name]</option>\n";
		    $content1 .= "<strong><big>&middot;</big></strong>&nbsp;<a href=\"http://$row[vendors_host]\" target=\"blank\">$row[vendors_name]</a><br>\n";
		}
	}
	$content0 .= "</select></form></div>";
	if ($display_as_tree == 1 ){
		$content .= $content1;
	} else {
		$content .= $content0;
	}

} else {
	$content = "<div align=\"center\"><br><font class=\"content\">"._VENDORS_NOT_FOUND."<br><br></font></div>";
}

?>