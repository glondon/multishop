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
/* $Id: block-Product_Reviews.php,v 1.1.1.1 2005/11/21 13:47:35 tropic Exp $ */

if ( !defined('BLOCK_FILE') ) {
    Header("Location: ../index.php");
    die();
}

// set the following value as you want:
// simply it's a limitation to the select-query
$limit_reviews = 3;

global $prefix, $db, $currentlang, $user, $lang_id;
if (is_user($user)) global $usession;

$name_default = "name_" . DEFAULT_LANGUAGE;
$language_id = $lang_id[$currentlang];
if (!isset($language_id)){
	$language_id = 1;
}

$result = $db->sql_query("SELECT * FROM ".$prefix."_vendors where show_reviews='1' ORDER BY RAND() LIMIT 0,1");
$row = $db->sql_fetchrow($result);
if ($db->sql_numrows($result) == 0 ) {
	
	$content = "<div align=\"center\"><br><font class=\"content\">"._VENDORS_NOT_FOUND."<br><br></font></div>";

} elseif ($db->sql_numrows($db->sql_query("show tables like '" . $row['vendors_prefix'] . "_" . TABLE_REVIEWS . "'")) != 1 ){
	
	$content = "<div align=\"center\"><br><font class=\"content\">"._TABLE_NOT_FOUND.":<br>"
			. $row['vendors_prefix'] . "_" . TABLE_REVIEWS . "<br><br></font></div>";
	
} else {
	
	$vend = $row['vendors_prefix'];
	$host = $row['vendors_host'];
	$type = $row['vendors_type'];
	if ($row['vendors_type'] == "external") $external = 1; else $external = 0;
	
	$pos = strrpos($host, '/');
	$host = substr($host, 0, $pos) . "/";

	$random_select = "select r.reviews_id, r.reviews_rating, p.products_id, p.products_image, pd.products_name from " . $vend . "_" . TABLE_REVIEWS . " r, " . $vend . "_" . TABLE_REVIEWS_DESCRIPTION . " rd, " . $vend . "_" . TABLE_PRODUCTS . " p, " . $vend . "_" . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_status = '1' and p.products_id = r.products_id and r.reviews_id = rd.reviews_id and rd.languages_id = '" . (int)$language_id . "' and p.products_id = pd.products_id and pd.language_id = '" . (int)$language_id . "'";
  	$random_select .= " order by r.reviews_id desc limit " . $limit_reviews;
  	$random_product = tep_random_select($random_select);

	if ($random_product) {
		
		$content = "<div align=\"center\"><br>";
	    $review_query = $db->sql_query("select substring(reviews_text, 1, 60) as reviews_text from " . $vend . "_" .  TABLE_REVIEWS_DESCRIPTION . " where reviews_id = '" . (int)$random_product['reviews_id'] . "' and languages_id = '" . (int)$language_id . "'");
    	$review = $db->sql_fetchrow($review_query);

    	$review = tep_break_string(tep_output_string_protected($review['reviews_text']), 15, '-<br>');
		
		if (is_user($user) && !$external ){
			$content .= "<a href=\"http://". $host . "login.php?redirect=product_reviews_info.php&amp;products_id=" . $random_product['products_id'] . "&amp;reviews_id=" . $random_product['reviews_id'] . "&amp;usession=$usession\" target=\"_blank\" title=\"" . $random_product['products_name'] . "\">";
		} else {
			$content .= "<a href=\"http://". $host . "product_reviews_info.php?products_id=" . $random_product['products_id'] . "&amp;reviews_id=" . $random_product['reviews_id'] . "\" target=\"_blank\" title=\"" . $random_product['products_name'] . "\">";
		}
		
		$content .= "<img src=\"http://" . $host . "images/" . $random_product['products_image'] ."\" width=\"100\" border=\"0\" alt=\"" . $random_product['products_name'] . "\">";
		$content .= "<br>$review <br><img src=\"http://" . $host . "images/stars_" . $random_product['reviews_rating'] . ".gif\" border=\"0\">";
				   
		$content .= "<br><br></div>";

  	} else {
  		$content = "<br><font class=\"content\">"._REVIEWS_NOT_FOUND."<br><br></font></div>";
  	}
}
?>