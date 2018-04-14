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
/* $Id: block-Product_Specials.php,v 1.1.1.1 2005/11/21 13:47:35 tropic Exp $ */

if ( !defined('BLOCK_FILE') ) {
    Header("Location: ../index.php");
    die();
}

$limit_specials = 10;
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

$result = $db->sql_query("SELECT * FROM ".$prefix."_vendors where show_specials='1' ORDER BY RAND() LIMIT 0,1");

$row = $db->sql_fetchrow($result);
if ($db->sql_numrows($result) == 0 ) {
	
	$content = "<div align=\"center\"><br><font class=\"content\">"._VENDORS_NOT_FOUND."<br><br></font></div>";

} elseif ($db->sql_numrows($db->sql_query("show tables like '" . $row['vendors_prefix'] . "_" . TABLE_SPECIALS . "'")) != 1 ){
	
	$content = "<div align=\"center\"><br><font class=\"content\">"._TABLE_NOT_FOUND.":<br>"
			. $row['vendors_prefix'] . "_" . TABLE_SPECIALS . "<br><br></font></div>";
	
} else {
	
	$vend = $row['vendors_prefix'];
	$host = $row['vendors_host'];
	$type = $row['vendors_type'];
	if ($row['vendors_type'] == "external") $external = 1; else $external = 0;
	
	$pos = strrpos($host, '/');
	$host = substr($host, 0, $pos) . "/";

	$random_product = tep_random_select("select p.products_id, pd.products_name, p.products_price, p.products_tax_class_id, p.products_image, s.specials_new_products_price from " . $vend . "_" . TABLE_PRODUCTS . " p, " . $vend . "_" . TABLE_PRODUCTS_DESCRIPTION . " pd, " . $vend . "_" . TABLE_SPECIALS . " s where p.products_status = '1' and p.products_id = s.products_id and pd.products_id = s.products_id and pd.language_id = '1' and s.status = '1' order by s.specials_date_added desc limit $limit_specials");
	$prod_id = $random_product['products_id'];
	$prod_image = $random_product['products_image'];
	$price = $random_product['products_price'];
	$prod_name = $random_product['products_name'];
	$special_price = $random_product['specials_new_products_price'];
	$tax_result = $db->sql_fetchrow($db->sql_query("select * from " . $vend . "_tax_rates"));
	$tax = $tax_result['tax_rate'];
	$prod_tax = tep_round($tax, $decimal_places);

	if ($included_tax == 1 ){
		$new_price = $price * ($tax / 100 +1);
	    $new_price = tep_round($new_price, $decimal_places);
	    $prod_price = tep_round($new_price, $decimal_places);
		$new_special_price = $special_price * ($tax / 100 +1);
	    $new_special_price = tep_round($new_special_price, $decimal_places);
	    $prod_special_price = tep_round($new_special_price, $decimal_places);
	} else {
	    $prod_price = tep_round($price, $decimal_places);
	    $prod_special_price = tep_round($special_price, $decimal_places);
	}		

	$content = "<div align=\"center\"><br>";

	if (!isset($prod_id)){
		$content = "<br><font class=\"content\">"._PRODUCTS_NOT_FOUND."<br><br></font></div>";
	} else {
		if (is_user($user) && !$external){
			$content .= "<a href=\"http://". $host . "login.php?redirect=product_info.php&amp;products_id=" . $prod_id . "&amp;usession=$usession\" target=\"_blank\" title=\"" . _DETAILS_PROD . "\">";
		} else {
			$content .= "<a href=\"http://". $host . "product_info.php?products_id=" . $prod_id . "\" target=\"_blank\" title=\"" . _DETAILS_PROD . "\">";
		}
		$content .= "<img src=\"http://" . $host . "images/" . $prod_image ."\" width=\"100\" border=\"0\" alt=\"" . _DETAILS_PROD . "\">";
		$content .= "<br><br><b>$prod_name</b></a><br><s>" . $currencies->format($prod_price) . "</s>"
				 . "<br><font color=\"red\">" . $currencies->format($prod_special_price) ."</font>";
		if ($show_tax == 1) { $content .= "<br>(tax: $prod_tax %)";}
		$content .= "<br><br></div>";
	}
}

?>