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
/* $Id: index.php,v 1.2 2005/11/22 16:52:51 tropic Exp $ */

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

$show_cat_list = 1;
$maxprods_for_page = 15;
$maxprods_for_shop = 3;

define('INDEX_FILE', true);
$module_name = basename(dirname(__FILE__));
get_lang($module_name);
$pagetitle = "-	"._CATEGORIES_PRODUCTS."";
$name_language = "name_" . $currentlang;
$name_default = "name_" . DEFAULT_LANGUAGE;
$content_language = "content_" . $currentlang;
$content_default = "content_" . DEFAULT_LANGUAGE;
$language_id = $lang_id[$currentlang];
if (!isset($language_id)){
	$language_id = 1;
}

function count_shops($cat_id){
    global $prefix, $db;
    $num = $db->sql_numrows($db->sql_query("SELECT c.vendor_id FROM ".$prefix."_categories_to_vendors c, ".$prefix."_vendors v WHERE c.cat_id=$cat_id and c.vendor_id = v.vendors_id and v.vendors_type !='inactive'"));
    return $num;
}

function show_random_prods(){
    global $currentcurrency, $currencies, $language_id, $prefix, $Conf_Multishop, $cookie, $currentlang, $multilingual, $db, $module_name, $name_language, $name_default, $user, $usession;
    
    $max_prod = $Conf_Multishop['num_prod_home'];
    $num_line = $Conf_Multishop['num_prod_line'];
    $num_total = $Conf_Multishop['num_prod_total'];
    $included_tax = $Conf_Multishop['include_taxrate'];
    $show_tax = $Conf_Multishop['show_taxrate']; 
    $prods = array();
    $result = $db->sql_query("SELECT * FROM ".$prefix."_vendors where show_prods='1'");
    $num_vend = $db->sql_numrows($result);
    $i = 1 ;
    $decimal_places = $currencies->get_decimal_places($currentcurrency);
    while ($row = $db->sql_fetchrow($result)) {
    		
    	$pos = strrpos($row['vendors_host'], '/');
    	$host = substr($row['vendors_host'], 0, $pos) . "/";
    	if ($row['vendors_type'] == "external") $external = 1; else $external = 0;

    	$Res = $db->sql_query("select p.products_id, p.products_image, p.products_price, p.products_tax_class_id, pd.products_name, IF(s.status, s.specials_new_products_price, NULL) as specials_new_products_price, IF(s.status, s.specials_new_products_price, p.products_price) as final_price from " . $row['vendors_prefix'] . "_" . TABLE_PRODUCTS . " p, " . $row['vendors_prefix'] . "_" . TABLE_PRODUCTS_DESCRIPTION . " pd left join " . $row['vendors_prefix'] . "_" . TABLE_SPECIALS . " s on p.products_id = s.products_id where products_status = '1' and p.products_id = pd.products_id and (pd.language_id = '" . $language_id . "' ) ORDER BY RAND() LIMIT 0,$max_prod");
    	
    	while ($Row = $db->sql_fetchrow($Res)) {

    		array_push($prods,$i);
    		$tax_result = $db->sql_fetchrow($db->sql_query("select tax_rate from " . $row['vendors_prefix'] . "_tax_rates where tax_class_id = '" . $Row['products_tax_class_id'] . "'"));
			$tax = $tax_result['tax_rate'];
    		$prod_tax[$i] = tep_round($tax, $decimal_places);
    		$host_prods[$i] = $host;
    		$vend_external[$i] = $external;
    		$prod_id[$i] = $Row['products_id'];
    		$prod_image[$i] = $Row['products_image'];
    		$prod_name[$i] = $Row['products_name'];
    		$price = $Row['final_price'];

    		if ($included_tax == 1 && intval($tax)){
    			$new_price = $price * ($tax / 100 +1);
    			$new_price = tep_round($new_price, $decimal_places);
    			$prod_price[$i] = $currencies->format($new_price);
    		} else {
    			$prod_price[$i] = $currencies->format($price);
    		}
    		
    		$i ++;
    	}
    }
    
    OpenTable();
    echo  "<table width=\"100%\"><tr><td align=\"center\" class=\"title\">" . _SOME_PRODUCTS . "</td></tr></table>";
    echo '<table border="0" width="100%" cellspacing="0" cellpadding="0">' . "\n\n";
    
    $n =1;
    shuffle($prods);
    $prods = array_slice($prods, 0, $num_total);

    if ($num_vend == 0 ) {
		echo "<div align=\"center\"><br><font class=\"content\">"._SHOPS_NOT_FOUND."<br><br></div>";
    } elseif (empty($prods)){
		echo "<div align=\"center\"><br><font class=\"content\">"._PRODUCTS_NOT_FOUND."<br><br></font></div>";
    } elseif (is_user($user) && isset($usession)){
    	foreach($prods as $i){
    	    if ($n == 1 || ($n % $num_line) == 1) echo '<tr>';
    	    echo "\n<td>";
    	    if ($vend_external[$i] == 1){
    	    	$my_url = "product_info.php?";
    	    } else {
    	    	$my_url = "login.php?usession=$usession&redirect=product_info.php&amp;";
    	    }
    	    echo "<div align=\"center\"><br><a href=\"http://". $host_prods[$i] . $my_url . "products_id=" . $prod_id[$i] . "\" title=\"" . _DETAILS_PROD . "\" target=\"_blank\">";
    	    echo "<img src=\"http://" . $host_prods[$i] . "images/" . $prod_image[$i] ."\" width=\"100\" border=\"0\" alt=\"" . _DETAILS_PROD . "\"></a>";
    	    echo "<br><a href=\"http://". $host_prods[$i] . $my_url . "products_id=" . $prod_id[$i] . "\" title=\"" . _DETAILS_PROD . "\" target=\"_blank\"><b>$prod_name[$i]</b></a>\n";
    	    echo "<br>$prod_price[$i]";
    	    
    	    // show tax_rate
    	    if ($show_tax == 1 && intval($prod_tax[$i])){
    	    	echo "<br>(tax: $prod_tax[$i]%)";
    	    }
    	    
    	    echo "</div>";
    	    echo "</td>\n";
    	    if ( $n == count($prods) || ($n % $num_line) == 0) echo '</tr>';
    	    $n ++;
    	}
    } else {
    	foreach($prods as $i){
    	    if ($n == 1 || ($n % $num_line) == 1) echo '<tr>';
    	    echo "\n<td>";
    	    echo "<div align=\"center\"><br><a href=\"http://". $host_prods[$i] . "product_info.php?products_id=" . $prod_id[$i] . "\" title=\"" . _DETAILS_PROD . "\" target=\"_blank\">";
    	    echo "<img src=\"http://" . $host_prods[$i] . "images/" . $prod_image[$i] ."\" width=\"100\" border=\"0\" alt=\"" . _DETAILS_PROD . "\"></a>\n";
    	    echo "<br><a href=\"http://". $host_prods[$i] . "product_info.php?products_id=" . $prod_id[$i] . "\" title=\"" . _DETAILS_PROD . "\" target=\"_blank\"><b>$prod_name[$i]</b></a>";
    	    echo "<br>$prod_price[$i]";
    	    
    	    // show tax_rate
    	    if ($show_tax == 1 && intval($prod_tax[$i])){
    	    	echo "<br>(tax: $prod_tax[$i]%)";
    	    }
    	    echo "</div>";
    	    echo "</td>\n";
    	    if ( $n == count($prods) || ($n % $num_line) == 0) echo '</tr>';
    	    $n ++;
    	}
    }
    echo '</table>';
    CloseTable();
}

function show_all_categories(){
    global $prefix, $cookie, $currentlang, $multilingual, $db, $module_name, $name_language, $name_default;
    
    $result = $db->sql_query("SELECT cat_id, $name_language, $name_default FROM ".$prefix."_categories_products WHERE parent_id='0' ORDER BY '" . $name_language . "'");
    OpenTable();
    echo  "<table width=\"100%\"><tr><td align=\"center\" width=\"75%\"><font class=\"title\"><b>" . _ALL_CATEGORIES . "</b></font></td><td align=\"right\" width=\"25%\"><a href=\"modules.php?name=Categories_Products&amp;op=show_random_prods\"><font class=\"normal\"><b>" . _PRODUCTS . "</font></b></a></td></tr></table>";
    while($row = $db->sql_fetchrow($result)) {
    	if (!$row[$name_language]) {
    	    $name_category = $row[$name_default];
	} else {
	    $name_category = $row[$name_language];
	}
    	echo "<br><br><a href=\"modules.php?name=Categories_Products&amp;op=show_shops&cat_id=" . $row[cat_id]. "\"><b>" . $name_category . "</b></a>\n";
    	if ($num = count_shops($row[cat_id])) echo "($num)";
        $res = $db->sql_query("SELECT cat_id, $name_language, $name_default FROM ".$prefix."_categories_products WHERE parent_id=$row[cat_id] ORDER BY '" . $name_language . "'");
        while($r = $db->sql_fetchrow($res)) { 
	    if (!$r[$name_language]) {
	    	$name_category = $r[$name_default];
            } else {
            	$name_category = $r[$name_language];
            }
            echo "<br>";
            for ($i=0;$i<10;$i++) echo "&nbsp;";
            echo "<a href=\"modules.php?name=Categories_Products&op=show_shops&cat_id=$r[cat_id]\">$name_category</a>\n";
            if ($num = count_shops($r[cat_id])) echo "($num)";
            $res1 = $db->sql_query("SELECT cat_id, $name_language, $name_default FROM ".$prefix."_categories_products WHERE parent_id=$r[cat_id] ORDER BY '" . $name_language . "'");
            while($r1 = $db->sql_fetchrow($res1)) {
        	if (!$r1[$name_language]) {
        	    $name_category = $r1[$name_default];
        	} else {
        	    $name_category = $r1[$name_language];
        	}
        	echo "<br>";
        	for ($i=0;$i<20;$i++) echo "&nbsp;";
        	echo "<a href=\"modules.php?name=Categories_Products&op=show_shops&cat_id=$r1[cat_id]\">$name_category</a>\n";
        	if ($num = count_shops($r1[cat_id])) echo "($num)";
        	
        	$res2 = $db->sql_query("SELECT cat_id, $name_language, $name_default FROM ".$prefix."_categories_products WHERE parent_id=$r1[cat_id] ORDER BY '" . $name_language . "'");
        	while($r2 = $db->sql_fetchrow($res2)) {
        		if (!$r2[$name_language]) {
        			$name_category = $r2[$name_default];
        		} else {
        			$name_category = $r2[$name_language];
        		}
        		echo "<br>";
        		for ($i=0;$i<40;$i++) echo "&nbsp;";
        		echo "<a href=\"modules.php?name=Categories_Products&op=show_shops&cat_id=$r2[cat_id]\">$name_category</a>\n";
        		if ($num = count_shops($r2[cat_id])) echo "($num)";
        	}
            }
        }
    }
    CloseTable();
}

function show_by_prods(){
    global $prefix, $cookie, $currentlang, $multilingual, $db, $module_name, $name_language, $name_default, $content_language, $content_default;
    
    OpenTable();
	echo  "<table width=\"100%\"><tr><td align=\"center\" width=\"75%\"><font class=\"title\"><b>" . _PRODUCTS_BY_CATEGORY . "</b></font></td><td align=\"right\" width=\"25%\"><a href=\"modules.php?name=Categories_Products&amp;op=show_by_shops\"><font class=\"normal\"><b>" . _SHOPS_BY_CATEGORY . "</font></b></a></td></tr></table>";
    $content_static = $db->sql_fetchrow($result = $db->sql_query("SELECT $content_language, $content_default FROM ".$prefix."_content_static WHERE content = 'module_categories'"));
	if ($content_static[$content_language]) {
		echo $content_static[$content_language];
	} elseif ($content_static[$content_default]) {
		echo $content_static[$content_default];
	} else {
	
		$result = $db->sql_query("SELECT cat_id, $name_language, $name_default FROM ".$prefix."_categories_products WHERE parent_id='0' ORDER BY '" . $name_language . "'");
	    while($row = $db->sql_fetchrow($result)) {
	    	if (!$row[$name_language]) {
	    	    $name_category = $row[$name_default];
			} else {
			    $name_category = $row[$name_language];
			}
	    	echo "<br><br><a href=\"modules.php?name=Categories_Products&amp;op=show_prods&cat_id=" . $row[cat_id]. "\"><b>" . $name_category . "</b></a>\n";
	    	$res = $db->sql_query("SELECT cat_id, $name_language, $name_default FROM ".$prefix."_categories_products WHERE parent_id=$row[cat_id] ORDER BY '" . $name_language . "'");
	        while($r = $db->sql_fetchrow($res)) { 
			    if (!$r[$name_language]) {
			    	$name_category = $r[$name_default];
		            } else {
		            	$name_category = $r[$name_language];
		            }
		            echo "<br>";
		            for ($i=0;$i<10;$i++) echo "&nbsp;";
		            echo "<a href=\"modules.php?name=Categories_Products&op=show_prods&cat_id=$r[cat_id]\">$name_category</a>\n";
		            $res1 = $db->sql_query("SELECT cat_id, $name_language, $name_default FROM ".$prefix."_categories_products WHERE parent_id=$r[cat_id] ORDER BY '" . $name_language . "'");
		            while($r1 = $db->sql_fetchrow($res1)) {
		        	if (!$r1[$name_language]) {
		        	    $name_category = $r1[$name_default];
		        	} else {
		        	    $name_category = $r1[$name_language];
		        	}
		        	echo "<br>";
		        	for ($i=0;$i<20;$i++) echo "&nbsp;";
		        	echo "<a href=\"modules.php?name=Categories_Products&op=show_prods&cat_id=$r1[cat_id]\">$name_category</a>\n";
		        	
		        	$res2 = $db->sql_query("SELECT cat_id, $name_language, $name_default FROM ".$prefix."_categories_products WHERE parent_id=$r1[cat_id] ORDER BY '" . $name_language . "'");
		        	while($r2 = $db->sql_fetchrow($res2)) {
		        		if (!$r2[$name_language]) {
		        			$name_category = $r2[$name_default];
		        		} else {
		        			$name_category = $r2[$name_language];
		        		}
		        		echo "<br>";
		        		for ($i=0;$i<40;$i++) echo "&nbsp;";
		        		echo "<a href=\"modules.php?name=Categories_Products&op=show_prods&cat_id=$r2[cat_id]\">$name_category</a>\n";
		        	}
				}
	        }
	    }
	}
    CloseTable();
}

function show_by_shops(){
    global $prefix, $cookie, $currentlang, $multilingual, $db, $module_name, $name_language, $name_default, $content_language, $content_default;
    
    OpenTable();
    echo  "<table width=\"100%\"><tr><td align=\"center\" width=\"75%\"><font class=\"title\"><b>" . _SHOPS_BY_CATEGORY . "</b></font></td><td align=\"right\" width=\"25%\"><a href=\"modules.php?name=Categories_Products&amp;op=show_by_prods\"><font class=\"normal\"><b>" . _PRODUCTS_BY_CATEGORY . "</font></b></a></td></tr></table>";
    $content_static = $db->sql_fetchrow($result = $db->sql_query("SELECT $content_language, $content_default FROM ".$prefix."_content_static WHERE content = 'module_categories'"));
	if ($content_static[$content_language]) {
		echo $content_static[$content_language];
	} elseif ($content_static[$content_default]) {
		echo $content_static[$content_default];
	} else {

	    $result = $db->sql_query("SELECT cat_id, $name_language, $name_default FROM ".$prefix."_categories_products WHERE parent_id='0' ORDER BY '" . $name_language . "'");
	    
	    while($row = $db->sql_fetchrow($result)) {
	    	if (!$row[$name_language]) {
	    	    $name_category = $row[$name_default];
			} else {
			    $name_category = $row[$name_language];
			}
	    	echo "<br><br><b><a href=\"modules.php?name=Categories_Products&amp;op=show_shops&cat_id=" . $row[cat_id]. "\">" . $name_category . "</a></b>\n";
	    	if ($num = count_shops($row[cat_id])) echo "($num)";
	    	//if ($num = count_shops($row[cat_id])) echo "[<a href=\"modules.php?name=Categories_Products&amp;op=show_shops&cat_id=" . $row[cat_id]. "\">"._STORES . " $num</a>]";
	        $res = $db->sql_query("SELECT cat_id, $name_language, $name_default FROM ".$prefix."_categories_products WHERE parent_id=$row[cat_id] ORDER BY '" . $name_language . "'");
			while($r = $db->sql_fetchrow($res)) { 
			    if (!$r[$name_language]) {
			    	$name_category = $r[$name_default];
		            } else {
		            	$name_category = $r[$name_language];
		            }
		            echo "<br>";
		            for ($i=0;$i<10;$i++) echo "&nbsp;";
		            echo "<a href=\"modules.php?name=Categories_Products&op=show_shops&cat_id=$r[cat_id]\">$name_category</a>\n";
		            if ($num = count_shops($r[cat_id])) echo "($num)";
		            //if ($num = count_shops($r[cat_id])) echo "[<a href=\"modules.php?name=Categories_Products&amp;op=show_shops&cat_id=" . $r[cat_id]. "\">"._STORES . " $num</a>]";
		            $res1 = $db->sql_query("SELECT cat_id, $name_language, $name_default FROM ".$prefix."_categories_products WHERE parent_id=$r[cat_id] ORDER BY '" . $name_language . "'");
		            while($r1 = $db->sql_fetchrow($res1)) {
		        	if (!$r1[$name_language]) {
		        	    $name_category = $r1[$name_default];
		        	} else {
		        	    $name_category = $r1[$name_language];
		        	}
		        	echo "<br>";
		        	for ($i=0;$i<20;$i++) echo "&nbsp;";
		        	echo "<a href=\"modules.php?name=Categories_Products&op=show_shops&cat_id=$r1[cat_id]\">$name_category</a>\n";
		        	if ($num = count_shops($r1[cat_id])) echo "($num)";
		        	//if ($num = count_shops($r1[cat_id])) echo "[<a href=\"modules.php?name=Categories_Products&amp;op=show_shops&cat_id=" . $r1[cat_id]. "\">"._STORES . " $num</a>]";
		            $res2 = $db->sql_query("SELECT cat_id, $name_language, $name_default FROM ".$prefix."_categories_products WHERE parent_id=$r1[cat_id] ORDER BY '" . $name_language . "'");
		        	while($r2 = $db->sql_fetchrow($res2)) {
		        		if (!$r2[$name_language]) {
		        			$name_category = $r2[$name_default];
		        		} else {
		        			$name_category = $r2[$name_language];
		        		}
		        		echo "<br>";
		        		for ($i=0;$i<40;$i++) echo "&nbsp;";
		        		echo "<a href=\"modules.php?name=Categories_Products&op=show_shops&cat_id=$r2[cat_id]\">$name_category</a>\n";
		        		if ($num = count_shops($r2[cat_id])) echo "($num)";
		        	}
				}
			}
	    }

	}
    CloseTable();
}

function show_all_vendors(){
    global $prefix, $db, $Conf_Multishop, $user, $usession;
    $result = $db->sql_query("SELECT * FROM ".$prefix."_vendors WHERE vendors_type != 'inactive' ORDER BY vendors_name");
    
    OpenTable();
    if ($db->sql_numrows($result)){
		echo  "<div align=\"center\" class=\"title\">" . _SHOPS_ONLINE . "</div>";
	    echo "<br><table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" align=\"center\">";
		
		if (is_user($user) && $usession ){
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
		echo  "<div align=\"center\" class=\"title\">" . _SHOPS_NOT_FOUND . "</div>";
    }
    CloseTable();
}

function code(){
	include("header.php");
	OpenTable();
	echo "<table><tr><td align=\"center\"><br>This module has been developed by Piero Trono (c) 2003-2005 for <a href=\"http://php-multishop.com\"><b>Php-MultiShop</b></a><br><br></td></tr></table>";
	CloseTable();	
	include("footer.php");
}

function show_shops(){
    global $show_cat_list, $prefix, $Conf_Multishop, $cookie, $currentlang, $multilingual, $db, $module_name, $cat_id, $name_language, $name_default, $user, $usession;
    
    if ($show_cat_list == 1 ){
    	 show_by_shops();
    }
    
    if (isset($cat_id) && intval($cat_id)){
    	$query = $db->sql_query("SELECT cat_id, $name_language, $name_default FROM ".$prefix."_categories_products WHERE cat_id='" . $cat_id . "' ORDER BY '" . $name_language . "'");
	    if ($db->sql_numrows($query) == 1) {
	    	$row = $db->sql_fetchrow($query);
	    	if (!$row[$name_language]) {
	    	    $name_category = $row[$name_default];
			} else {
			    $name_category = $row[$name_language];
			}
			echo "<br>";
	    	OpenTable();
	    	echo  "<div align=\"center\"><font class=\"title\"><b>" . _CATEGORY . ":&nbsp;&nbsp;$name_category</b></font></div><br>";
	    	$res1 = $db->sql_query("SELECT c.vendor_id, c.cpath FROM ".$prefix."_categories_to_vendors c, ".$prefix."_vendors v WHERE c.vendor_id = v.vendors_id and v.vendors_type != 'inactive' and c.cat_id='" . $cat_id . "'");
	    	if ($db->sql_numrows($res1)){
	    	    echo "<br><br><table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" align=\"center\">";
	    	    
	    	    if (is_user($user)  && isset($usession)) {
	    	    	while($row1 = $db->sql_fetchrow($res1)) {
	    	    	    $row2 = $db->sql_fetchrow($db->sql_query("SELECT * FROM ".$prefix."_vendors WHERE vendors_id='" . $row1[vendor_id] . "'"));
	    	    	    $Row = $db->sql_fetchrow($db->sql_query("SELECT logo FROM ".$prefix."_vendors_details WHERE vendors_id='" . $row1[vendor_id] . "'"));
	    	    	    $logo = $Row['logo'];
	    	    	    
	    	    	    echo "<tr><td>&nbsp;&nbsp;</td><td align=\"left\">&nbsp;&nbsp;<br>";
	    	    	    if ($logo) echo "<img src=\"images/vendors/$logo\" border=\"0\" width=\"$Conf_Multishop[widht_logo]\">";
	    	    	    echo "&nbsp;&nbsp;<br><br></td><td align=\"left\">";
	    	    	    echo "&nbsp;&nbsp;<font class=\"title\"><b>$row2[vendors_name]</b></font><br><br>";
	    	    	    echo "&nbsp;&nbsp;<a href=\"modules.php?name=Multishop&op=detail_vendor&vendors_id=$row1[vendor_id]\" title=\"" . _DETAILS_VENDOR . "\"><b>" . _DETAILS_VENDOR . "</b></a><br><br>\n";
	    	    	    if ($row2['vendors_type'] == "active") {
	    	    	    	$row2['vendors_host'] = ereg_replace("index.php","login.php?usession=$usession",$row2['vendors_host']);
	    	    	    	echo "&nbsp;&nbsp;<a href=\"http://" . $row2['vendors_host'];
	    	    	    	if ($row1[cpath]) echo "&amp;redirect=index.php&amp;cPath=$row1[cpath]";
	    	    	    } else {
	    	    	    	echo "&nbsp;&nbsp;<a href=\"http://" . $row2['vendors_host'];
	    	    	    	if ($row1[cpath]) echo "&amp;cPath=$row1[cpath]";
	    	    	    }
	    	    	    echo "\" title=\"" . _GO_TO_SHOP . "\" target=\"_blank\"><b>" . _GO_TO_SHOP . "</b></a>";
	    	    	    echo "&nbsp;&nbsp;<br><br></td></tr>";
		    		}
		    	} else {
	    	    	while($row1 = $db->sql_fetchrow($res1)) {
	    	    	    $row2 = $db->sql_fetchrow($db->sql_query("SELECT * FROM ".$prefix."_vendors WHERE vendors_id='" . $row1[vendor_id] . "'"));
	    	    	    $Row = $db->sql_fetchrow($db->sql_query("SELECT logo FROM ".$prefix."_vendors_details WHERE vendors_id='" . $row1[vendor_id] . "'"));
	    	    	    $logo = $Row['logo'];
	    	    	    
	    	    	    echo "<tr><td>&nbsp;&nbsp;</td><td align=\"left\">&nbsp;&nbsp;<br>";
	    	    	    if ($logo) echo "<img src=\"images/vendors/$logo\" border=\"0\" width=\"$Conf_Multishop[widht_logo]\">";
	    	    	    echo "&nbsp;&nbsp;<br><br></td><td align=\"left\">";
	    	    	    echo "&nbsp;&nbsp;<font class=\"title\"><b>$row2[vendors_name]</b></font><br><br>";
	    	    	    echo "&nbsp;&nbsp;<a href=\"modules.php?name=Multishop&op=detail_vendor&vendors_id=$row1[vendor_id]\" title=\"" . _DETAILS_VENDOR . "\"><b>" . _DETAILS_VENDOR . "</b></a><br><br>\n";
	    	    	    echo "&nbsp;&nbsp;<a href=\"http://$row2[vendors_host]";
	    	    	    if ($row1[cpath]) echo "?cPath=$row1[cpath]";
	    	    	    echo "\" title=\"" . _GO_TO_SHOP . "\" target=\"_blank\"><b>" . _GO_TO_SHOP . "</b></a>";
	    	    	    echo "&nbsp;&nbsp;<br><br></td></tr>";
		    		}
		    	}
		    
		    	echo "</table>";
			} else {
	    		echo "<br> " . _SHOPS_NOT_FOUND;
	    	}
	    	CloseTable();
	    }
    }
}

function show_prods(){
    global $currentcurrency, $currencies, $language_id, $pag, $show_cat_list, $maxprods_for_page, $maxprods_for_shop, $prefix, $Conf_Multishop, $cookie, $currentlang, $multilingual, $db, $module_name, $cat_id, $name_language, $name_default, $user, $usession;
    
    $maxprods_for_page = intval($maxprods_for_page);
    $maxprods_for_shop = intval($maxprods_for_shop);
    $pag = intval($pag);
    if (isset($cat_id) && intval($cat_id)){
    	if ($show_cat_list == 1 ){
    		show_by_prods();
			echo "<br>";
    	}
    	$query = $db->sql_query("SELECT cat_id, $name_language, $name_default FROM ".$prefix."_categories_products WHERE cat_id='" . $cat_id . "' ORDER BY '" . $name_language . "'");
	    if ($db->sql_numrows($query) == 1) {
	    	$prods = array();
	    	$row = $db->sql_fetchrow($query);
	    	if (!$row[$name_language]) {
	    	    $name_category = $row[$name_default];
			} else {
			    $name_category = $row[$name_language];
			}
	    	OpenTable();
	    	echo  "<div align=\"center\"><font class=\"title\"><b>" . _CATEGORY . ":&nbsp;&nbsp;$name_category</b></font></div><br>";
	    	$res1 = $db->sql_query("SELECT c.vendor_id, v.vendors_host, v.vendors_type, c.cpath, v.vendors_prefix, v.vendors_id, v.vendors_name FROM ".$prefix."_categories_to_vendors c, ".$prefix."_vendors v WHERE c.vendor_id = v.vendors_id and v.show_prods='1' and c.cat_id='" . $cat_id . "'");
	    	if ($db->sql_numrows($res1)){
	    	    
	    	    ($pag && $maxprods_for_shop) ? $min = $pag * $maxprods_for_shop : $min = 0;
	    	    $maxprods_for_shop ? $limit = "limit $min,$maxprods_for_shop" : $limit ="";
	    	    $decimal_places = $currencies->get_decimal_places($currentcurrency);
	    	    $included_tax = $Conf_Multishop['include_taxrate'];
	    	    $show_tax = $Conf_Multishop['show_taxrate'];
	    	    $i = 1;

    	    	while($row1 = $db->sql_fetchrow($res1)) {
    	    		
    	    		if ($row1['cpath']) {
    	    			
    	    			ereg("([0-9]+)$",$row1['cpath'],$cpath);
    	    			
    	    			$cat = $cpath[1];
    	    			$query_sql = "select p.products_id, p.products_image, p.products_price, p.products_tax_class_id, pd.products_name, IF(s.status, s.specials_new_products_price, NULL) as specials_new_products_price, IF(s.status, s.specials_new_products_price, p.products_price) as final_price from " . $row1['vendors_prefix'] . "_" . TABLE_PRODUCTS . " p, " . $row1['vendors_prefix'] . "_" . TABLE_PRODUCTS_DESCRIPTION . " pd, " . $row1['vendors_prefix'] . "_" . TABLE_PRODUCTS_TO_CATEGORIES . " p2c left join " . $row1['vendors_prefix'] . "_" . TABLE_SPECIALS . " s on p.products_id = s.products_id where p.products_status = '1' and p.products_id = p2c.products_id and pd.products_id = p2c.products_id and pd.language_id = '" . (int)$language_id . "' and p2c.categories_id = '" . $cat . "' " . $limit;
    	    			$result = $db->sql_query($query_sql);
    	    			
    	    			$pos = strrpos($row1['vendors_host'], '/');
				    	$host = substr($row1['vendors_host'], 0, $pos) . "/";
				    	
    	    			while($prod = $db->sql_fetchrow($result)){
    	    				
    	    				array_push($prods,$i);
    	    				$tax_result = $db->sql_fetchrow($db->sql_query("select tax_rate from " . $row1['vendors_prefix'] . "_tax_rates where tax_class_id = '" . $prod['products_tax_class_id'] . "'"));
				    		$tax = $tax_result['tax_rate'];
				    		$prod_tax[$i] = tep_round($tax, $decimal_places);
				    		$host_prods[$i] = $host;
				    		$vend_type[$i] = $row1['vendors_type'];
				    		$prod_id[$i] = $prod['products_id'];
				    		$prod_image[$i] = $prod['products_image'];
				    		$prod_name[$i] = $prod['products_name'];
				    		$price = $prod['final_price'];
				    		$prod_price[$i] = $currencies->format($price);
				    		
				    		if ($included_tax == 1  && intval($tax)){
				    			$new_price = $price * ($tax / 100 +1);
				    			$new_price = tep_round($new_price, $decimal_places);
				    			$prod_price[$i] = $currencies->format($new_price);
				    		} else {
				    			$prod_price[$i] = $currencies->format($price);
				    		}
				    			    		
				    		$i ++;	    	    				
    	    			}	    	    			
    	    		}
	    		}
    		    $n =1;
			    if ($maxprods_for_page) $prods = array_slice($prods, 0, $maxprods_for_page);
				shuffle($prods);
			    
				if (empty($prods)){
					if ($pag){
				    	
				    	echo "<table width=\"100%\" border=\"0\"><tr><td align=\"center\">"
				    		."<a href=\"modules.php?name=Categories_Products&op=show_prods&cat_id=$cat_id\">"
				    		."<img src=\"modules/Categories_Products/images/top.gif\" alt=\"" . _TOP . "\" border=\"0\"></a>"
				    		."</td></tr></table>";
					} else {
					
						echo "<div align=\"center\"><br><font class=\"content\">"._PRODUCTS_NOT_FOUND."<br><br></font></div>";
					}
				} else {
					foreach($prods as $i){
			    	    
			    	    if ($vend_type[$i] == "active" && is_user($user)  && isset($usession)){
			    	    	$my_url = "login.php?usession=$usession&redirect=product_info.php&amp;";
			    	    } else {
			    	    	$my_url = "product_info.php?";
			    	    }
			    	    if ($n > 1) echo "<hr width=\"100%\" size=\"1\" align=\"center\" color=\"#fcd22b\">";
			    	    echo "<table width=\"100%\" border=\"0\"><tr><td width=\"30%\" align=\"left\" valign=\"middle\">&nbsp;"
			    	    	."<a href=\"http://". $host_prods[$i] . $my_url . "products_id=" . $prod_id[$i] . "\" title=\"" . _DETAILS_PROD . "\" target=\"_blank\">"
			    	    	."<img src=\"http://" . $host_prods[$i] . "images/" . $prod_image[$i] ."\" width=\"100\" border=\"0\" alt=\"" . _DETAILS_PROD . "\"></a>"
			    	    	."&nbsp;</td><td width=\"40%\" valign=\"middle\">&nbsp;"
			    	    	."<a href=\"http://". $host_prods[$i] . $my_url . "products_id=" . $prod_id[$i] . "\" title=\"" . _DETAILS_PROD . "\" target=\"_blank\"><b>$prod_name[$i]</b></a><br>\n"
			    	    	."&nbsp;</td><td width=\"30%\" valign=\"middle\">"
			    	    	."<b>&nbsp;$prod_price[$i]</b>";
			    	    // show tax_rate
			    	    if ($show_tax == 1 && intval($prod_tax[$i])){
			    	    	echo "<br>&nbsp;(tax: $prod_tax[$i]%)";
			    	    }
			    	    echo "</td></tr></table>";
			    	    $n ++;
			    	}
			    	if ($pag == 1){
			    		$next_pag = $pag + 1 ;
				    	$prev_pag = $pag - 1 ;
				    	echo "<hr width=\"100%\" size=\"1\" align=\"center\" color=\"#fcd22b\"><br>";
				    	echo "<table width=\"100%\" border=\"0\"><tr><td align=\"center\">"
				    		."<a href=\"modules.php?name=Categories_Products&op=show_prods&cat_id=$cat_id&amp;pag=$prev_pag\">"
				    		."<img src=\"modules/Categories_Products/images/prev.gif\" alt=\"" . _PREVIOUS . "\" border=\"0\"></a>&nbsp;&nbsp;&nbsp;&nbsp;"
				    		."<a href=\"modules.php?name=Categories_Products&op=show_prods&cat_id=$cat_id&amp;pag=$next_pag\">"
				    		."<img src=\"modules/Categories_Products/images/next.gif\" alt=\"" . _NEXT . "\" border=\"0\"></a>"
				    		."</td></tr></table>";
				    } elseif ($pag > 1){
			    		$next_pag = $pag + 1 ;
				    	$prev_pag = $pag - 1 ;
				    	echo "<hr width=\"100%\" size=\"1\" align=\"center\" color=\"#fcd22b\"><br>";
				    	echo "<table width=\"100%\" border=\"0\"><tr><td align=\"center\">"
				    		."<a href=\"modules.php?name=Categories_Products&op=show_prods&cat_id=$cat_id&amp;pag=$prev_pag\">"
				    		."<img src=\"modules/Categories_Products/images/prev.gif\" alt=\"" . _PREVIOUS . "\" border=\"0\"></a>&nbsp;&nbsp;&nbsp;&nbsp;"
				    		."<a href=\"modules.php?name=Categories_Products&op=show_prods&cat_id=$cat_id\">"
				    		."<img src=\"modules/Categories_Products/images/top.gif\" alt=\"" . _TOP . "\" border=\"0\"></a>&nbsp;&nbsp;&nbsp;&nbsp;"
				    		."<a href=\"modules.php?name=Categories_Products&op=show_prods&cat_id=$cat_id&amp;pag=$next_pag\">"
				    		."<img src=\"modules/Categories_Products/images/next.gif\" alt=\"" . _NEXT . "\" border=\"0\"></a>"
				    		."</td></tr></table>";
				    } else {
				    	echo "<hr width=\"100%\" size=\"1\" align=\"center\" color=\"#fcd22b\"><br>";
				    	echo "<table width=\"100%\" border=\"0\"><tr><td align=\"center\">"
				    		."<a href=\"modules.php?name=Categories_Products&op=show_prods&cat_id=$cat_id&amp;pag=1\">"
				    		."<img src=\"modules/Categories_Products/images/next.gif\" alt=\"" . _NEXT . "\" border=\"0\"></a>"
				    		."</td></tr></table>";
				    }
				}

			} else {
	    		echo "<br> " . _PRODUCTS_NOT_FOUND;
	    	}
	    	CloseTable();
	    } else {
	    	show_random_prods(); // category not found
	    }
    	
    } else {
		show_by_prods();
    }
}

function show_choice(){
	global $prefix, $Conf_Multishop, $cookie, $currentlang, $multilingual, $db, $module_name, $user, $usession;
    OpenTable();
    echo "<br><table align=\"center\" border=0><tr>"
    	."<td>&nbsp;<a href=\"modules.php?name=Categories_Products&amp;op=show_by_prods\"><font class=\"title\"><b>" . _PRODUCTS . "</b></font></a>&nbsp;</td><td width=\"50\"></td>"
    	."<td>&nbsp;<a href=\"modules.php?name=Categories_Products&amp;op=show_by_shops\"><font class=\"title\"><b>" . _VENDORS . "</b></font></a>&nbsp;</td>"
    	."</td></tr></table>"
    	."<div align=\"center\">(" . _BY_CATEGORY . ")</div>";    	
    CloseTable();
}

function show_choice_old(){
	global $prefix, $Conf_Multishop, $cookie, $currentlang, $multilingual, $db, $module_name, $user, $usession;
    OpenTable();
    echo "<br><table align=\"center\" border=0><tr>"
    	."<td>&nbsp;<a href=\"modules.php?name=Categories_Products&amp;op=show_all_cat\"><font class=\"title\">" . _CATEGORIES_PRODUCTS . "</font></a>&nbsp;</td><td width=\"50\"></td>"
    	."<td>&nbsp;<a href=\"modules.php?name=Categories_Products&amp;op=show_random_prods\"><font class=\"title\">" . _PRODUCTS . "</font></a>&nbsp;</td>"
    	."</td></tr></table>";    	
    CloseTable();
}

switch($op) {

    case "show_all_cat":
		include ('header.php');
    	show_all_categories();
		include ('footer.php');
	break;

    case "show_shops":
		include ('header.php');
    	show_shops();
    	include ('footer.php');
	break;

    case "show_prods":
		include ('header.php');
    	show_prods();
    	include ('footer.php');
	break;

    case "code":
		code();
		break;

    case "show_random_prods":
		include ('header.php');
    	show_random_prods();
    	include ('footer.php');
	break;

    case "show_by_shops":
		include ('header.php');
    	show_by_shops();
    	echo "<br>";
    	show_all_vendors();
    	include ('footer.php');
	break;
    
    case "show_by_prods":
		include ('header.php');
    	show_by_prods();
    	echo "<br>";
    	show_random_prods();
    	include ('footer.php');
	break;
    	
    default:
		include ('header.php');
    	show_choice();
    	include ('footer.php');
	break;
}
?>