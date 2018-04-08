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
/* $Id: block-Product_Random.php,v 1.1.1.1 2005/11/21 13:47:35 tropic Exp $ */

if ( !defined('BLOCK_FILE') ) {
    Header("Location: ../index.php");
    die();
}

global $prefix, $db, $currentlang, $currentcurrency, $user, $lang_id, $currencies, $Conf_Multishop;
if (is_user($user)) global $usession;

$included_tax = $Conf_Multishop['include_taxrate'];
$show_tax = $Conf_Multishop['show_taxrate'];
$name_default = "name_" . DEFAULT_LANGUAGE;

$language_id = $lang_id[$currentlang];
if (!isset($language_id)){
	$language_id = 1;
}

$decimal_places = $currencies->get_decimal_places($currentcurrency);
$result = $db->sql_query("SELECT * FROM ".$prefix."_vendors where show_prods='1'  ORDER BY RAND() LIMIT 0,1");
$row = $db->sql_fetchrow($result);
	
if ($db->sql_numrows($result) == 0 ) {
	
	$content = "<div align=\"center\"><br><font class=\"content\">"._VENDORS_NOT_FOUND."<br><br></font></div>";

} elseif ($db->sql_numrows($db->sql_query("show tables like '" . $row['vendors_prefix'] . "_" . TABLE_PRODUCTS . "'")) != 1 ){
	
	$content = "<div align=\"center\"><br><font class=\"content\">"._TABLE_NOT_FOUND.":<br>"
			. $row['vendors_prefix'] . "_" . TABLE_PRODUCTS . "<br><br></font></div>";
	
} else {
	
	$vend = $row['vendors_prefix'];
	$host = $row['vendors_host'];
	$type = $row['vendors_type'];
	if ($row['vendors_type'] == "external") $external = 1; else $external = 0;
	
	$pos = strrpos($host, '/');
	$host = substr($host, 0, $pos) . "/";

	$products_new_query_raw = "select p.products_id, p.products_image, p.products_price, pd.products_name from " . $vend . "_" . TABLE_PRODUCTS . " p, " . $vend . "_" . TABLE_PRODUCTS_DESCRIPTION . " pd where products_status = '1' and p.products_id = pd.products_id and (pd.language_id = '" . $language_id . "' or pd.language_id = '1') ORDER BY RAND() LIMIT 0,1";
	$Res = $db->sql_query($products_new_query_raw);
	$Row = $db->sql_fetchrow($Res);
	$prod_id = $Row['products_id'];
	$prod_image = $Row['products_image'];
	$prod_price = $Row['products_price'];
	$prod_name = $Row['products_name'];
	$tax_result = $db->sql_fetchrow($db->sql_query("select * from " . $vend . "_tax_rates"));
	$tax = $tax_result['tax_rate'];
	$prod_tax = tep_round($tax, $decimal_places);

	$content = "<div align=\"center\"><br>" . _PRODUCT_RANDOM . "<br><br>";

	if (!isset($prod_id)){
		$content = "<br><div align=\"center\"><font class=\"content\">"._PRODUCTS_NOT_FOUND."<br><br></font></div>";
	} else {
		if (is_user($user) && !$external){
			$content .= "<a href=\"http://". $host . "login.php?redirect=product_info.php&amp;products_id=" . $prod_id . "&amp;usession=$usession\" target=\"_blank\" title=\"" . _DETAILS_PROD . "\">";
		} else {
			$content .= "<a href=\"http://". $host . "product_info.php?products_id=" . $prod_id . "\" target=\"_blank\" title=\"" . _DETAILS_PROD . "\">";
		}
		$content .= "<img src=\"http://" . $host . "images/" . $prod_image ."\" width=\"100\" border=\"0\" alt=\"" . _DETAILS_PROD . "\">";
		$content .= "<br><br><b>$prod_name</b></a><br>" . $currencies->format($prod_price*(1+($prod_tax/100)*$included_tax)) ;
		if ($show_tax == 1) { $content .= "<br>(tax: $prod_tax %)";}
		$content .= "<br><br></div>";
	}
}

?>