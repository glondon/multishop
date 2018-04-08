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
/* $Id: block-Product_Best.php,v 1.1.1.1 2005/11/21 13:47:35 tropic Exp $ */

if ( !defined('BLOCK_FILE') ) {
    Header("Location: ../index.php");
    die();
}


$limit_prods = 5;
global $prefix, $db, $currentlang, $user, $lang_id;
if (is_user($user)) global $usession;

$name_default = "name_" . DEFAULT_LANGUAGE;

$language_id = $lang_id[$currentlang];
if (!isset($language_id)){
	$language_id = 1;
}

$result = $db->sql_query("SELECT * FROM ".$prefix."_vendors WHERE show_best='1' ORDER BY RAND() LIMIT 0,1");
$row = $db->sql_fetchrow($result);
if ($db->sql_numrows($result) == 0 ) {
	
	$content = "<div align=\"center\"><br><font class=\"content\">"._VENDORS_NOT_FOUND."<br><br></font></div>";

} elseif ($db->sql_numrows($db->sql_query("show tables like '" . $row['vendors_prefix'] . "_" . TABLE_PRODUCTS . "'")) != 1 ){
	
	$content = "<div align=\"center\"><br><font class=\"content\">"._TABLE_NOT_FOUND.":<br>"
			. $row['vendors_prefix'] . "_" . TABLE_PRODUCTS . "<br><br></font></div>";
	
} else {
		
	$vend = $row['vendors_prefix'];
	$host = $row['vendors_host'];
	if ($row['vendors_type'] == "external") $external = 1; else $external = 0;
	$pos = strrpos($host, '/');
	$host = substr($host, 0, $pos) . "/";

	$content = "<div align=\"center\"><br>shop: <b>" . $row['vendors_name'] . "</b></div>";
    $best_sellers_query = $db->sql_query("select distinct p.products_id, pd.products_name from " . $vend . "_" . TABLE_PRODUCTS . " p, " . $vend . "_" . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_status = '1' and p.products_ordered > 0 and p.products_id = pd.products_id and pd.language_id = '" . (int)$language_id . "' order by p.products_ordered desc, pd.products_name limit " . $limit_prods);

	if ($db->sql_numrows($best_sellers_query) >= $limit_prods) {
	
	    $rows = 0;
	    $content .= "<table>";
	    if (is_user($user) && !$external ){
	    	while ($best_sellers = $db->sql_fetchrow($best_sellers_query)) {
				$rows++;
				$content .= "<tr><td valign=\"top\">" . $rows . ".</td><td><a href=\"http://" . $host . "login.php?redirect=product_info.php&amp;products_id=" . $best_sellers['products_id'] . "&amp;usession=$usession\" target=\"_blank\">" . $best_sellers['products_name'] . "</a></td></tr>";;
			}
		} else {
	    	while ($best_sellers = $db->sql_fetchrow($best_sellers_query)) {
				$rows++;
				$content .= "<tr><td valign=\"top\">" . $rows . ".</td><td><a href=\"http://" . $host . "product_info.php?products_id=" . $best_sellers['products_id'] . "\" target=\"_blank\">" . $best_sellers['products_name'] . "</a></td></tr>";;
			}
		}
		$content .= "<br></table>";				   

  	} else {
  		$content .= "<br><font class=\"content\">"._PRODUCTS_NOT_FOUND."<br><br></font></div>";
  	}
}
?>