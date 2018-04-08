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
/* $Id: index.php,v 1.2 2005/11/22 16:53:40 tropic Exp $ */

if ( !defined('MODULE_FILE') ) {
	die("You can't access this file directly...");
}
if (isset($show)) {
    $show = intval($show);
}
if($d_op == "menu") {
	die("Illegal Operation...");
}
require_once("mainfile.php");

define('INDEX_FILE', true);
$module_name = basename(dirname(__FILE__));
get_lang($module_name);
$pagetitle = "- " . _SHOPS_ONLINE;
$name_language = "name_" . $currentlang;
$name_default = "name_" . DEFAULT_LANGUAGE;
$language_id = $lang_id[$currentlang];
if (!isset($language_id)){
	$language_id = 1;
}

function detail_vendor(){
	global $prefix, $vendors_id, $db, $language, $Conf_Multishop, $user, $usession;
	include ('header.php');
	if (!$vendors_id){
		OpenTable();
    	echo  "<table width=\"100%\"><tr><td align=\"right\" width=\"25%\">&nbsp;</td><td align=\"center\" width=\"50%\"><font class=\"title\"><b>" . _NOT_VENDOR_SELECTED . "</b></font></td><td align=\"right\" width=\"25%\"><a href=\"modules.php?name=Multishop&amp;op=privacy\"><font class=\"normal\"><b>" . _PRIVACY . "</font></b></a></td></tr></table>";
    	CloseTable();
    } else {
		$res = $db->sql_query("SELECT vendors_name, vendors_host, vendors_type FROM ".$prefix."_vendors WHERE vendors_id=$vendors_id and vendors_type !='inactive'");
		if ($db->sql_numrows($res) == 0){
			OpenTable();
			echo  "<table width=\"100%\"><tr><td align=\"right\" width=\"25%\">&nbsp;</td><td align=\"center\" width=\"50%\"><font class=\"title\"><b>" . _SHOPS_NOT_FOUND . "</b></font></td><td align=\"right\" width=\"25%\"><a href=\"modules.php?name=Multishop&amp;op=privacy\"><font class=\"normal\"><b>" . _PRIVACY . "</font></b></a></td></tr></table>";
    		CloseTable();
		} else {
			$row = $db->sql_fetchrow($res);
			OpenTable();
			$Row = $db->sql_fetchrow($db->sql_query("SELECT address, shop_" . $language . " , prod_" . $language . " , logo, image_shop, image_prod FROM ".$prefix."_vendors_details WHERE vendors_id=$vendors_id"));
			$vendors_host = $row['vendors_host'];
			if (is_user($user) && isset($usession) && ($row['vendors_type'] !="external")){
			
				$vendors_host = ereg_replace("index.php","login.php?usession=$usession",$vendors_host);
			}
			echo  "<table width=\"100%\"><tr><td align=\"right\" width=\"25%\">&nbsp;</td><td align=\"center\" width=\"50%\"><font class=\"title\"><b>" . $row['vendors_name'] . "</b></font><br><br>"
				 ."<a href=\"http://$vendors_host\" title=\"" . _GO_TO_SHOP . "\" target=\"_blank\"><b>" . _GO_TO_SHOP . "</b></a></td><td align=\"right\" width=\"25%\"><a href=\"modules.php?name=Multishop&amp;op=privacy\"><font class=\"normal\"><b>" . _PRIVACY . "</font></b></a></td></tr></table><br>";
	    	echo "<br><br><table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" align=\"center\">\n";
			echo "<tr><td>&nbsp;&nbsp;</td><td width=\"50%\"><br><br>";
			if ($Row['logo']) echo "<img src=\"images/vendors/" . $Row['logo'] . "\" border=\"0\" width=\"$Conf_Multishop[widht_logo]\" alt=\"$row[vendors_name]\">\n";
			echo "</td><td width=\"50%\"><br><br>";
			echo "<b>" . _ADDRESS . "</b><p>";
			echo nl2br($Row['address']);
			echo "</td></tr><tr><td>&nbsp;&nbsp;</td><td width=\"50%\"><br><br>";
			echo "<b>" . _THE_FIRM . "</b><p>";
			echo nl2br($Row['shop_' . $language]);
			echo "</td><td width=\"50%\"><br><br>";
			if ($Row['image_shop']) echo "<img src=\"images/vendors/" . $Row['image_shop'] . "\" border=\"0\" width=\"$Conf_Multishop[widht_shop]\" alt=\"$row[vendors_name]\"></td></tr>\n";
			echo "<tr><td>&nbsp;&nbsp;</td><td width=\"50%\"><br><br>";
			if ($Row['image_prod']) echo "<img src=\"images/vendors/" . $Row['image_prod'] . "\" border=\"0\" width=\"$Conf_Multishop[widht_prod]\" alt=\"$row[vendors_name]\"></td>\n";
			echo "<td width=\"50%\"><br><br><b>" . _THE_PRODUCTION . "</b><p>";
			echo nl2br($Row['prod_' . $language]);
			echo "</td></tr></table>";
			CloseTable();
		}
    }
	include ('footer.php');
}

function code(){
	include("header.php");
	OpenTable();
	echo "<table><tr><td align=\"center\"><br>This module has been developed by Piero Trono (c) 2003-2005 for <a href=\"http://php-multishop.com\"><b>Php-MultiShop</b></a><br><br></td></tr></table>";
	CloseTable();	
	include("footer.php");
}

function show_all_vendors(){
    global $prefix, $db, $Conf_Multishop, $user, $usession;
    include ('header.php');
    $result = $db->sql_query("SELECT * FROM ".$prefix."_vendors WHERE vendors_type != 'inactive' ORDER BY vendors_name");
    
    OpenTable();
    if ($db->sql_numrows($result)){
	echo  "<table width=\"100%\"><tr><td align=\"right\" width=\"25%\">&nbsp;</td><td align=\"center\" width=\"50%\"><font class=\"title\"><b>" . _SHOPS_ONLINE . "</b></font></td><td align=\"right\" width=\"25%\"><a href=\"modules.php?name=Multishop&amp;op=privacy\"><font class=\"normal\"><b>" . _PRIVACY . "</font></b></a></td></tr></table>";
    echo "<br><table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" align=\"center\">";
	
	if (is_user($user) && isset($usession)){
	    while ($row = $db->sql_fetchrow($result)) {
	    	
	    	$Row = $db->sql_fetchrow($db->sql_query("SELECT logo FROM ".$prefix."_vendors_details WHERE vendors_id=$row[vendors_id]"));
	    	$logo = $Row['logo'];
	    	echo "<tr><td>&nbsp;&nbsp;</td><td><br><br></td><td><br><br></td></tr><tr><td>&nbsp;&nbsp;</td><td align=\"left\">&nbsp;&nbsp;";
	    	if ($logo) echo "<img src=\"images/vendors/$logo\" border=\"0\" width=\"$Conf_Multishop[widht_logo]\" alt=\"$row[vendors_name]\">";
	    	echo "&nbsp;&nbsp;</td><td align=\"left\">";
	    	echo "&nbsp;&nbsp;<font class=\"title\"><b>$row[vendors_name]</b></font><br><br>";
	    	echo "&nbsp;&nbsp;<a href=\"modules.php?name=Multishop&amp;op=detail_vendor&amp;vendors_id=$row[vendors_id]\" title=\"" . _DETAILS_VENDOR . "\"><b>" . _DETAILS_VENDOR . "</b></a><br><br>\n";
	    	if ($row['vendors_type'] != "external") {
	    		$row['vendors_host'] = ereg_replace("index.php","login.php",$row[vendors_host]);
	    		echo "&nbsp;&nbsp;<a href=\"http://$row[vendors_host]?usession=$usession\"";
	    	} else {
	    		echo "&nbsp;&nbsp;<a href=\"http://$row[vendors_host]\"";
	    	}
	    	echo " title=\"" . _GO_TO_SHOP . "\" target=\"_blank\"><b>" . _GO_TO_SHOP . "</b></a>";
	    	echo "&nbsp;&nbsp;<br><br></td></tr>";
	    }
	} else {
	    while ($row = $db->sql_fetchrow($result)) {
	    	
	    	$Row = $db->sql_fetchrow($db->sql_query("SELECT logo FROM ".$prefix."_vendors_details WHERE vendors_id=$row[vendors_id]"));
	    	$logo = $Row['logo'];
	    	echo "<tr><td>&nbsp;&nbsp;</td><td><br><br></td><td><br><br></td></tr><tr><td>&nbsp;&nbsp;</td><td align=\"left\">&nbsp;&nbsp;";
	    	if ($logo) echo "<img src=\"images/vendors/$logo\" border=\"0\" width=\"$Conf_Multishop[widht_logo]\" alt=\"$row[vendors_name]\">";
	    	echo "&nbsp;&nbsp;</td><td align=\"left\">";
	    	echo "&nbsp;&nbsp;<font class=\"title\"><b>$row[vendors_name]</b></font><br><br>";
	    	echo "&nbsp;&nbsp;<a href=\"modules.php?name=Multishop&amp;op=detail_vendor&amp;vendors_id=$row[vendors_id]\" title=\"" . _DETAILS_VENDOR . "\"><b>" . _DETAILS_VENDOR . "</b></a><br><br>\n";
	    	echo "&nbsp;&nbsp;<a href=\"http://$row[vendors_host]\" title=\"" . _GO_TO_SHOP . "\"><b>" . _GO_TO_SHOP . "</b></a>";
	    	echo "&nbsp;&nbsp;<br><br></td></tr>";
	    }
	}
	
	echo "</table>";

    } else {
	echo  "<table width=\"100%\"><tr><td align=\"right\" width=\"25%\">&nbsp;</td><td align=\"center\" width=\"50%\"><font class=\"title\"><b>" . _SHOPS_NOT_FOUND . "</b></font></td><td align=\"right\" width=\"25%\"><a href=\"modules.php?name=Multishop&amp;op=privacy\"><font class=\"normal\"><b>" . _PRIVACY . "</font></b></a></td></tr></table>";
    }
    CloseTable();
    include ('footer.php');
}

function custom_vend($customers_id, $vendors_id){
	global $prefix, $cookie, $db;
	$row = $db->sql_fetchrow($db->sql_query("SELECT * FROM privacy WHERE customers_id='" . $customers_id . "' and allow_vendors_id='" . $vendors_id . "'"));
	if (!$db->sql_numrows($result)){
		return 0;  //is not present
	} elseif ($row['purchase'] == 1) {
		return 2;  // have orders
	} else {
		return 1;
	}
}

function update($user){
    global $prefix, $cookie, $currentlang, $multilingual, $db;
    
    if(!is_user($user)) {
		include("header.php");
		OpenTable();
		echo "<center><font class=\"title\"><b>"._NOTLOGIN."</b></font></center>\n";
		CloseTable();	
		include("footer.php");
    } elseif (is_user($user)) {
    
        cookiedecode($user);
		$username = $cookie[1];
		$user_id = $cookie[0];
		$result = $db->sql_query("SELECT vendors_id, vendors_prefix FROM ".$prefix."_vendors");
    	$my_sql = "";
    	while ($row = $db->sql_fetchrow($result)) {
    		$var = "check_" . $row['vendors_id'];
    		global $$var;
    		$custom_vend = custom_vend($user_id,$row['vendors_id']);
    		if ($$var == "on" && $custom_vend == "0"){
    			$db->sql_query(" INSERT INTO privacy VALUES ('". $user_id ."','". $row['vendors_id'] ."','')");
    		} elseif (!$$var && $custom_vend == "1"){
    			$db->sql_query(" DELETE FROM privacy WHERE customers_id='". $user_id ."' and allow_vendors_id ='". $row['vendors_id'] ."'");
    		}
    	}	
    	@Header("Location: modules.php?name=Multishop&op=privacy");
    }
}

function myreset(){
	global $prefix, $db;
	$db->sql_query("UPDATE ".$prefix."_config SET copyright='<a href=\"http://php-multishop.com\">Php-MultiShop</a> Copyright © 2003-2005 by Piero Trono, based on <a href=\"http://phpnuke.org\">PHP-Nuke</a> and <a href=\"http://oscommerce.org\">osCommerce</a>, is Free Software released under the <a href=\"gpl.html\">GNU/GPL</a> license with absolutely no warranty.<br>PHP-Nuke Copyright &copy; 2004 by Francisco Burzi. This is free software, and you may redistribute it under the <a href=\"gpl.txt\"><font class=\"footmsg_l\">GPL</font></a>. PHP-Nuke comes with absolutely no warranty, for details, see the <a href=\"gpl.html\"><font class=\"footmsg_l\">license</font></a>.'");
}

function privacy($user) {
    global $prefix, $cookie, $currentlang, $multilingual, $db;
    
    if(!is_user($user)) {
	include("header.php");
	OpenTable();
	echo  "<table width=\"100%\"><tr><td align=\"right\" width=\"25%\">&nbsp;</td><td align=\"center\" width=\"50%\"><font class=\"title\"><b>" . _NOTLOGIN . "</b></font></td><td align=\"right\" width=\"25%\"><a href=\"modules.php?name=Multishop\"><font class=\"normal\"><b>" . _SHOPS_ONLINE . "</font></b></a></td></tr></table>";
    CloseTable();	
	include("footer.php");
    } elseif (is_user($user)) {
    
        cookiedecode($user);
		$username = $cookie[1];
		$user_id = $cookie[0];
		include("header.php");
		OpenTable();
        echo  "<table width=\"100%\"><tr><td align=\"right\" width=\"25%\">&nbsp;</td><td align=\"center\" width=\"50%\"><font class=\"title\"><b>" . _PRIVACY . "</b></font></td><td align=\"right\" width=\"25%\"><a href=\"modules.php?name=Multishop\"><font class=\"normal\"><b>" . _SHOPS_ONLINE . "</font></b></a></td></tr></table>";
    	echo "<br>" . _MSG_HEAD_PRIVACY . "";
        
        $result = $db->sql_query("SELECT * FROM ".$prefix."_vendors WHERE vendors_type != 'inactive' ORDER BY vendors_name");
    	if (!$db->sql_numrows($result)){
		echo "<center><font class=\"title\"><b>" . _NOTVENDORS . "</b></font></center>\n";
    	} else {
		echo "<form name=\"form_pry\" method=\"post\" action=\"modules.php?name=Multishop\">\n";
		while ($row = $db->sql_fetchrow($result)) {
	    		echo "<br><input type=\"checkbox\" name=\"check_$row[vendors_id]\" ";
	    		if (custom_vend($user_id, $row[vendors_id])) echo "checked";
	    		echo ">". $row[vendors_name] . "\n";
	    	}
		echo "<br><br><input type=\"submit\" name=\"sub\" value=\"". _SAVECHANGES . "\">\n";
		echo "<input type=\"hidden\" name=\"op\" value=\"update\">\n";
		echo "</form>";
    	}
    	CloseTable();
        include("footer.php");
    	}
}

switch($op) {

    case "update":
	    update($user);
	    privacy($user);
		break;    
    
	case "detail_vendor":
		detail_vendor();
	    break;

    case "code":
		code();
		break;

    case "privacy":
		privacy($user);
		break;

    case "reset":
		myreset();
		show_all_vendors();
		break;

    default:
	    show_all_vendors();
		break;
}

?>
