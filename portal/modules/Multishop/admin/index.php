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
/* $Id: index.php,v 1.1.1.1 2005/11/21 13:48:09 tropic Exp $ */

if ( !defined('ADMIN_FILE') )
{
	die("Access Denied");
}
global $prefix, $db, $admin_file;
$module_name = "Multishop";
$aid = substr("$aid", 0,25);
$query = $db->sql_query("SELECT title, admins FROM ".$prefix."_modules WHERE title='$module_name'");
list($title, $admins) = $db->sql_fetchrow($query);
$query2 = $db->sql_query("SELECT name, radminsuper FROM ".$prefix."_authors WHERE aid='$aid'");
list($name, $radminsuper) = $db->sql_fetchrow($query2);
$admins = explode(",", $admins);
$auth_user = 0;
for ($i=0; $i < sizeof($admins); $i++) {
	if ($name == $admins[$i] AND !empty($admins)) {
		$auth_user = 1;
	}
}
if ($radminsuper == 1 || $auth_user == 1) {
 
	/*********************************************************/
	/* Multi-Shop Functions                                  */
	/*********************************************************/
	
	require("modules/Multishop/currencies.php");
	
	function updateconfig(){
	    global $new_num_min, $new_num_min_cat, $new_mode_cats_block, $new_mode_shops_block, $new_num_prod_home, $new_num_prod_line, $new_num_prod_total, $new_home_prods, $new_home_news, $new_show_shops, $new_widht_logo, $new_widht_shop, $new_widht_prod, $new_include_taxrate, $new_show_taxrate, $new_show_rss, $new_prod_for_shop, $new_max_prod_page, $prefix, $cookie, $currentlang, $multilingual, $db, $admin_file;
	    OpenTable();
	    if ($new_show_shops == "on") $value_show_shops = 1;
	    if ($new_include_taxrate == "on") $value_include_taxrate = 1;
	    if ($new_show_taxrate == "on") $value_show_taxrate = 1;
	    if ($new_show_rss == "on") $value_show_rss = 1;
	    $db->sql_query("UPDATE ".$prefix."_multishop_config set num_min='" . $new_num_min . "', num_min_cat='" . $new_num_min_cat . "', mode_cats_block='" . $new_mode_cats_block . "', mode_shops_block='" . $new_mode_shops_block . "', num_prod_home='" . $new_num_prod_home . "', num_prod_line='" . $new_num_prod_line . "', num_prod_total='" . $new_num_prod_total . "', home_prods='" . $new_home_prods . "', home_news='" . $new_home_news . "', show_shops='" . $value_show_shops . "', widht_logo='" . $new_widht_logo . "', widht_shop='" . $new_widht_shop . "', widht_prod ='" . $new_widht_prod . "', include_taxrate ='" . $value_include_taxrate . "', show_taxrate ='" . $value_show_taxrate . "', show_rss='" . $value_show_rss . "', prod_for_shop='" . $new_prod_for_shop . "', max_prod_page='" . $new_max_prod_page . "' ");
	    echo "<center><font class=\"title\">" . _CONFIG_UPDATED . " $min_num</font></center>";
	    CloseTable();
	    echo "<br>";
	}

	// some variables of Multi-Shop configuration
	$Conf_Multishop = $db->sql_fetchrow($db->sql_query("SELECT * FROM ".$prefix."_multishop_config"));
	$num_min = $Conf_Multishop['num_min'];
	$num_min_cat = $Conf_Multishop['num_min_cat'];
	$name_language = "name_" . $currentlang;
	$name_default = "name_" . DEFAULT_LANGUAGE;

	function addcategory() {
	    global $num_min_cat, $name_default, $prefix,  $cookie, $currentlang, $multilingual, $db, $admin_file;
	    $result = $db->sql_query("SELECT * FROM ".$prefix."_categories_products WHERE '0' ");
	    $num_fields = $db->sql_numfields($result);
	    for ($i = 1; $i < $num_fields; $i++) {
	    	$field = $db->sql_fieldname($i, $result);
	    	global $$field;
	    }
	    OpenTable();
	    if (!isset($$name_default) || strlen($$name_default) < $num_min_cat){
	    	echo "<center><b>Error:</b> " . _ERROR_LENGHT . ":<br><br><b>" . _CATEGORY . "</b></center>";
	    } else {
	    	$sql = "";
	    	echo "<center><font class=\"title\">" . _ADDED_CATEGORY . ": $name_english</font></center>\n";
	    	$sql = "INSERT INTO ".$prefix."_categories_products values(''";
	    	for ($i = 1; $i < $num_fields; $i++) {
	    		$field = $db->sql_fieldname($i, $result);
	    		$sql .= ",'" . $$field . "'";
	    	}
	    	$sql .= ")";
	    	$result = $db->sql_query($sql);
	    }
	    CloseTable();
	    echo "<br>";
	}
	
	function form_generate_list(){
		
		global $db, $prefix, $admin_file, $name_language, $name_default;
		OpenTable();
		$result = $db->sql_query("SELECT * FROM ".$prefix."_categories_products WHERE parent_id='0' ORDER BY '" . $name_language . "'");
	    echo "<center><font class=\"title\">" . GENERATION_OF_CATEGORIES_LIST . "</font></center><br>\n"
	    	. SELECT_LANGUAGES . "<br><br>"
	    	."<form name=\"form1\" method=\"post\" action=\"".$admin_file.".php\">\n";
	    $num_fields = $db->sql_numfields($result);
	    for ($i = 2; $i < $num_fields; $i++) {
	    	$field = $db->sql_fieldname($i, $result);
	    	$sub_field = substr($field,5);
	    	echo "<input type=\"checkbox\" name=\"$field\" ";
	    	if ($field == $name_default) echo " checked ><b>$sub_field</b> " . _REQUIRED . "<br>\n";
	    	else echo "><b>$sub_field</b><br>\n";
	    }
	    echo "<input type=\"hidden\" name=\"op\" value=\"generate_list\">"
	    	."<br><input type=\"submit\" value=\"" . _GENERATE_LIST . "\"></form>";
		CloseTable();
	}
	
	function generate_list(){
		
		global $db, $prefix, $admin_file, $name_language, $name_default;
		$result = $db->sql_query("SELECT * FROM ".$prefix."_categories_products limit 0");
	    $num_fields = $db->sql_numfields($result);
		OpenTable();
	    echo  "<center><font class=\"title\">" . _ALL_CATEGORIES . "</font></center>";
	    for ($fi = 1; $fi < $num_fields; $fi++) {
	    	$field = $db->sql_fieldname($fi, $result);
	    	global $$field;
			$lang_field = substr($field,5);
	    	if ($$field == "on" || $lang_field == DEFAULT_LANGUAGE) { // gererate the list for this language
	    		
	    		echo "<br><hr width=\"100%\" size=\"1\" align=\"center\" color=\"#fcd22b\">";
	    		echo "generation List in <b>$lang_field</b>";
	
			#== start list
				$name_language = $field;
				$content_block_menu = "<div align=\"center\"><br><form action=\"index.php\" method=\"get\">\n"
			    					. "<select name=\"sel_vendor\" onChange=\"top.location.href=this.options[this.selectedIndex].value\">\n"
			    					. "<option selected value =\"\"> " . _SELECT_CATEGORY . " </option>\n";
			    $content_block_tree = "";
			    $content_module = "";
			    $res0 = $db->sql_query("SELECT cat_id, $name_language, $name_default FROM ".$prefix."_categories_products WHERE parent_id='0' ORDER BY '" . $name_language . "'");
			    while($row0 = $db->sql_fetchrow($res0)) {
			    	if (!$row0[$name_language]) {
			    	    $name_category = $row0[$name_default];
					} else {
					    $name_category = $row0[$name_language];
					}
			    	$content_module .= "<br><br><a href=\"modules.php?name=Categories_Products&amp;op=show_prods&cat_id=" . $row0[cat_id]. "\"><b>" . $name_category . "</b></a>\n";
			    	$content_block_menu .= "<option value = \"modules.php?name=Categories_Products&amp;op=show_prods&amp;cat_id=" . $row0[cat_id]. "\">" . $name_category . "</option>\n";
			    	$content_block_tree .= "<strong><big>&middot;</big></strong>&nbsp;<a href=\"modules.php?name=Categories_Products&amp;op=show_prods&amp;cat_id=" . $row0[cat_id]. "\">" . $name_category . "</a><br>\n";
			    	$res1 = $db->sql_query("SELECT cat_id, $name_language, $name_default FROM ".$prefix."_categories_products WHERE parent_id=$row0[cat_id] ORDER BY '" . $name_language . "'");
	
			        while($row1 = $db->sql_fetchrow($res1)) { 
					    if (!$row1[$name_language]) {
							$name_category = $row1[$name_default];
						} else {
							$name_category = $row1[$name_language];
						}
			            $content_block_menu .= "<option value = \"modules.php?name=Categories_Products&amp;op=show_prods&amp;cat_id=" . $row1['cat_id']. "\">&nbsp;--&gt;&nbsp;$name_category</option>\n";
			            $content_block_tree .= "&nbsp;&nbsp;--&gt;&nbsp;<a href=\"modules.php?name=Categories_Products&amp;op=show_prods&amp;cat_id=" . $row1['cat_id']. "\">" . $name_category . "</a><br>\n";
			            $content_module .= "<br>";
			            for ($i=0;$i<10;$i++) $content_module .= "&nbsp;";
			            $content_module .= "<a href=\"modules.php?name=Categories_Products&op=show_prods&cat_id=$row1[cat_id]\">$name_category</a>\n";
			            $res2 = $db->sql_query("SELECT cat_id, $name_language, $name_default FROM ".$prefix."_categories_products WHERE parent_id=$row1[cat_id] ORDER BY '" . $name_language . "'");
	
			            while($row2 = $db->sql_fetchrow($res2)) {
				        	if (!$row2[$name_language]) {
				        	    $name_category = $row2[$name_default];
				        	} else {
				        	    $name_category = $row2[$name_language];
				        	}
				        	$content_block_menu .="<option value = \"modules.php?name=Categories_Products&amp;op=show_prods&amp;cat_id=" . $row2['cat_id'] . "\">&nbsp;&nbsp;&nbsp;&nbsp;--&gt;&nbsp;$name_category</option>\n";
				        	$content_block_tree .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--&gt;&nbsp;<a href=\"modules.php?name=Categories_Products&amp;op=show_prods&amp;cat_id=" . $row2['cat_id']. "\">" . $name_category . "</a><br>\n";
				        	$content_module .= "<br>";
				        	for ($i=0;$i<20;$i++) $content_module .= "&nbsp;";
				        	$content_module .= "<a href=\"modules.php?name=Categories_Products&op=show_prods&cat_id=$row2[cat_id]\">$name_category</a>\n";
				        	
				        	$res3 = $db->sql_query("SELECT cat_id, $name_language, $name_default FROM ".$prefix."_categories_products WHERE parent_id=$row2[cat_id] ORDER BY '" . $name_language . "'");
			
				        	while($row3 = $db->sql_fetchrow($res3)) {
				        		if (!$row3[$name_language]) {
				        			$name_category = $row3[$name_default];
				        		} else {
				        			$name_category = $row3[$name_language];
				        		}
				        		$content_block_menu .="<option value = \"modules.php?name=Categories_Products&amp;op=show_prods&amp;cat_id=" . $row3['cat_id'] . "\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--&gt;&nbsp;$name_category</option>\n";
				        		$content_block_tree .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--&gt;&nbsp;<a href=\"modules.php?name=Categories_Products&amp;op=show_prods&amp;cat_id=" . $row3['cat_id']. "\">" . $name_category . "</a><br>\n";
				        		$content_module .= "<br>";
				        		for ($i=0;$i<40;$i++) $content_module .= "&nbsp;";
				        		$content_module .= "<a href=\"modules.php?name=Categories_Products&op=show_prods&cat_id=$row3[cat_id]\">$name_category</a>\n";
				        	}
			
						}
						
			        }
			    }
			    $content_block_menu .= "</select></form></div>";
			    echo $content_module ;
			    $db->sql_query("UPDATE " .$prefix. "_content_static SET content_" .$lang_field. " = '".$content_block_menu."' WHERE content = 'block_categories_menu'");
			    $db->sql_query("UPDATE " .$prefix. "_content_static SET content_" .$lang_field. " = '".$content_block_tree."' WHERE content = 'block_categories_tree'");
			    $db->sql_query("UPDATE " .$prefix. "_content_static SET content_" .$lang_field. " = '".$content_module."' WHERE content = 'module_categories'");
			    
			    
			#== end list    		
	    	} else {
	    		$db->sql_query("UPDATE " .$prefix. "_content_static SET content_" .$lang_field. " = NULL WHERE content = 'block_categories_menu'");
	    		$db->sql_query("UPDATE " .$prefix. "_content_static SET content_" .$lang_field. " = NULL WHERE content = 'block_categories_tree'");
	    		$db->sql_query("UPDATE " .$prefix. "_content_static SET content_" .$lang_field. " = NULL WHERE content = 'module_categories'");
	    	}
	    }
	    CloseTable();
	}

	function editcategory($cat_id = ""){
	    global $name_default, $cat_id, $prefix, $cookie, $currentlang, $multilingual, $db, $admin_file;
	    echo "<br>";
	    OpenTable();
	    
	    if (!$cat_id){
	    	
	    	echo "<center><font class=\"title\">" . _NOT_CATEGORY_SELECTED . "</font></center>";
	    
	    } else {
	    	
	    	echo "<center><font class=\"title\">" . _EDITCATEGORY . "</font></center><br>\n";
	        echo "<form name=\"cat_edit\" method=\"post\" action=\"".$admin_file.".php\">\n";
	        $result = $db->sql_query("SELECT * FROM ".$prefix."_categories_products WHERE cat_id=$cat_id ");
	        $row = $db->sql_fetchrow($result);
	        $num_fields = $db->sql_numfields($result);
	        for ($i = 2; $i < $num_fields; $i++) {
	        	$field = $db->sql_fieldname($i, $result);
	        	$sub_field = substr($field,5);
	        	echo "<font class=\"content\"><b>$sub_field</b>\n";
	        	if ($field == $name_default) echo "&nbsp;" . _REQUIRED ;
	        	echo "<br><input type=\"text\" size=\"50\" name=\"$field\" value =\"" . $row[$field] . "\"><br><br>\n";
	        }
	        echo "<font class=\"content\"><b>". _MOTHER_CATEGORY . "</b><br>";
	        $mother = $row[parent_id];
	        echo "<select name=\"parent_id\">";
	        echo "<option ";
	        if ($mother == 0) echo "selected ";
	        echo "value =\"0\">&nbsp;&nbsp;--&nbsp;&nbsp;--&nbsp;&nbsp;--&nbsp;&nbsp;--&nbsp;&nbsp;</option>\n";
	        $result1 = $db->sql_query("SELECT * FROM ".$prefix."_categories_products WHERE parent_id=0 ORDER BY '" . $name_language . "'");
	        while($row1 = $db->sql_fetchrow($result1)) {
	            if (!$row1[$name_language]) {
	            	$name_category = $row1[$name_default];
	            } else {
	                $name_category = $row1[$name_language];
	            }
	            echo "<option ";
	            if ($mother == $row1[cat_id]) echo "selected ";
	            echo "value = \"$row1[cat_id]\">" . $name_category . "</option>\n";
	            
	            $res = $db->sql_query("SELECT * FROM ".$prefix."_categories_products WHERE parent_id=$row1[cat_id] ORDER BY '" . $name_language . "'");
	            while ($r = $db->sql_fetchrow($res)) { 
	            	if (!$r[$name_language]) {
	            	    $name_category = $r[$name_default];
	            	} else {
	            	    $name_category = $r[$name_language];
	            	}
	            	echo "<option ";
	            	if ($mother == $r[cat_id]) echo "selected ";
	            	echo "value = \"$r[cat_id]\">&nbsp;&nbsp;---&gt;&nbsp;$name_category</option>\n";
	            	
	            	$res1 = $db->sql_query("SELECT * FROM ".$prefix."_categories_products WHERE parent_id=$r[cat_id] ORDER BY '" . $name_language . "'");
	            	while ($r1 = $db->sql_fetchrow($res1)) {
	            	    if (!$r1[$name_language]) {
	            	    	$name_category = $r1[$name_default];
	            	    } else {
	            	    	$name_category = $r1[$name_language];
	            	    }
	            	    echo "<option ";
	            	    if ($mother == $r1[cat_id]) echo "selected ";
	            	    echo "value = \"$r1[cat_id]\">&nbsp;&nbsp;&nbsp;&nbsp;---&gt;&nbsp;$name_category</option>\n";
	
	            	    $res2 = $db->sql_query("SELECT * FROM ".$prefix."_categories_products WHERE parent_id=$r1[cat_id] ORDER BY '" . $name_language . "'");
	            	    while ($r2 = $db->sql_fetchrow($res2)) {
	            	        if (!$r2[$name_language]) {
	            	    	    $name_category = $r2[$name_default];
	            	        } else {
	            	    	    $name_category = $r2[$name_language];
	            	        }
	            	        echo "<option ";
	            	        if ($mother == $r2[cat_id]) echo "selected ";
	            	        echo "value = \"$r2[cat_id]\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;---&gt;&nbsp;$name_category</option>\n";
	            	    }
	            	}           	
	            }
	        }
	        echo "</select>&nbsp;(" . _NOTE_MOTHER_CATEGORY . ")";
	        echo "<br><br><br><input type=\"submit\" name=\"edit_cat\" value=\"" . _SAVECHANGES . "\">\n";
	        echo "<input type=\"hidden\" name=\"cat_id\" value=\"$cat_id\">\n";
	        echo "<input type=\"hidden\" name=\"op\" value=\"update_cat\">\n";
	        echo "</form>";
	    }
	    echo "</center>";
	    echo  "<br><br><center><font class=\"title\">Important</font>"
	    	."<br>" . _UPDATE_CATEGORIES_LIST ;
	    CloseTable();
	}
	
	function updatecategory(){
	    global $name_default, $cat_id, $prefix, $cookie, $currentlang, $multilingual, $db, $admin_file;
	    
	    $result = $db->sql_query("SELECT * FROM ".$prefix."_categories_products WHERE '0' ");
	    $num_fields = $db->sql_numfields($result);
	    for ($i = 1; $i < $num_fields; $i++) {
	    	$field = $db->sql_fieldname($i, $result);
	    	global $$field;
	    }
	    OpenTable();
	    if (!$cat_id){
	    	
	    	echo "<center><font class=\"title\">" . _NOT_CATEGORY_SELECTED . "</font></center>";
	    
	    } else {
	    	
	    	$sql = "UPDATE ".$prefix."_categories_products set ";
	    	for ($i = 1; $i < $num_fields; $i++) {
	    		$field = $db->sql_fieldname($i, $result);
	    		$sql .= $field . " = '" . $$field . "' ";
	    		if ($i < ($num_fields - 1)) $sql .= ", ";
	    	}
	    	$sql .= " WHERE cat_id='" . $cat_id . "'";
	    	$db->sql_query($sql);
	        echo "<center><font class=\"title\">" . _CATEGORY_UPDATED . ": " . $$name_default . "</font></center>";
	    }
	    CloseTable();
	    echo "<br>";
	
	    
	}
	
	function deletecategory(){
	    global $name_default, $step, $cat_id, $prefix, $cookie, $currentlang, $multilingual, $db, $admin_file;
	    
	    if (!$cat_id){
	    	OpenTable();
	        echo "<center><font class=\"title\">" . _NOT_CATEGORY_SELECTED . "</font></center>";
	    } else {
	    	$result = $db->sql_query("SELECT parent_id, $name_default FROM ".$prefix."_categories_products WHERE cat_id='" . $cat_id . "'");
	        $row = $db->sql_fetchrow($result);
	        $result1 = $db->sql_query("SELECT cat_id FROM ".$prefix."_categories_products WHERE parent_id='" . $cat_id . "'");
	        if ($db->sql_numrows($result1)) {
	            OpenTable();
	            echo "<center><font class=\"title\">" . _WARNING_HAVE_CHILD . "\n";
	            CloseTable();
	            echo "<br>";
	            menu();
		    listcategories();
	        } elseif($step == 1){
	            OpenTable();
	            echo "<center><font class=\"title\">" . _WARNING_DELETE . " '$row[$name_default]' ?\n";
	            echo "<br><br>[&nbsp;&nbsp;\n";
	            echo "<a href=\"".$admin_file.".php?op=delete_cat&step=2&cat_id=$cat_id\">" . _YES . "</a>&nbsp;&nbsp;-&nbsp;&nbsp;\n";
	            echo "<a href=\"".$admin_file.".php?op=multishop\">"  . _NO ."</a>&nbsp;&nbsp;]</font></center>";
	            CloseTable();
			} elseif ($step ==2) {
				OpenTable();
				$db->sql_query("DELETE FROM ".$prefix."_categories_products WHERE cat_id='" . $cat_id . "'");
				$db->sql_query("DELETE FROM ".$prefix."_categories_to_vendors WHERE cat_id='" . $cat_id . "'");
				echo "<center><font class=\"title\">" . _CATEGORY_DELETED . ": '$row[$name_default]'</font></center>";
				CloseTable();
			}
	    }
		echo "<br>";
	}
	
	function delete_catvend() {
	    global $cat_id, $vendors_id, $prefix, $cookie, $db, $step, $namevend, $namecat, $admin_file;
	    if ($cat_id && $vendors_id){
	    	if($step == 1){
	    		OpenTable();
	            echo "<center><font class=\"title\">" . _WARNING_DELETE . " '$namecat' & '$namevend'?\n";
	            echo "<br><br>[&nbsp;&nbsp;\n";
	           	echo "<a href=\"".$admin_file.".php?op=cat_vend_del&step=2&cat_id=$cat_id&vendors_id=$vendors_id\">" . _YES . "</a>&nbsp;&nbsp;-&nbsp;&nbsp;\n";
	            echo "<a href=\"".$admin_file.".php?op=multishop\">"  . _NO ."</a>&nbsp;&nbsp;]</font></center>";
	            CloseTable();
	    	} elseif($step == 2){
	    		$db->sql_query("DELETE FROM ".$prefix."_categories_to_vendors WHERE cat_id = '" . $cat_id . "' and vendor_id = '" . $vendors_id . "'");
	        }
	    }
	}
	
	function assign_catvend(){
	    global $cat_id, $vendors_id, $prefix,  $cookie, $currentlang, $multilingual, $db, $admin_file;
	    
	    $result = $db->sql_query("SELECT * FROM ".$prefix."_categories_to_vendors WHERE cat_id=$cat_id AND vendor_id=$vendors_id");
	    OpenTable();
	    if ($db->sql_numrows($result)){
	    	echo "<center><font class=\"title\">" . _ALREADY_ASSIGNED;
	    } else {
	        echo "<center><font class=\"title\">" . _CATEGORY_ASSIGNED . "</font></center>";
	    	$db->sql_query("INSERT INTO ".$prefix."_categories_to_vendors VALUES ('". $cat_id . "','" . $vendors_id . "', 'NULL')"); 
	    }
	    CloseTable();
	    echo "<br>";
	    
	}
	
	function form_addcategory() {
	    global $name_language, $name_default, $prefix, $cookie, $currentlang, $multilingual, $db, $admin_file;
	    
	    echo "<br>";
	    OpenTable();
	    $result = $db->sql_query("SELECT * FROM ".$prefix."_categories_products WHERE parent_id='0' ORDER BY '" . $name_language . "'");
	    echo "<center><font class=\"title\">" . _ADDCATEGORY . "</font></center><br>\n";
	    echo "<form name=\"cat_add\" method=\"post\" action=\"".$admin_file.".php\">\n";
	    $num_fields = $db->sql_numfields($result);
	    for ($i = 2; $i < $num_fields; $i++) {
	    	$field = $db->sql_fieldname($i, $result);
	    	$sub_field = substr($field,5);
	    	echo "<font class=\"content\"><b>$sub_field</b>\n";
	    	if ($field == $name_default) echo "&nbsp;" . _REQUIRED ;
	    	echo "<br><input type=\"text\" size=\"50\" name=\"$field\"><br><br>\n";
	    }
	    echo "<font class=\"content\"><b>". _MOTHER_CATEGORY . "</b><br>";
	    echo "<select name=\"parent_id\">";
	    echo "<option selected value =\"0\">&nbsp;&nbsp;--&nbsp;&nbsp;--&nbsp;&nbsp;--&nbsp;&nbsp;--&nbsp;&nbsp;</option>\n";
	    $result = $db->sql_query("SELECT cat_id, $name_language, $name_default FROM ".$prefix."_categories_products WHERE parent_id='0' ORDER BY '" . $name_language . "'");
	    while($row = $db->sql_fetchrow($result)) { 
	        if (!$row[$name_language]) {
	        	$name_category = $row[$name_default];
	        } else {
	            $name_category = $row[$name_language];
	        }
	        echo "<option value = \"$row[cat_id]\">" . $name_category . "</option>\n";
	        
	        $res = $db->sql_query("SELECT cat_id, $name_language, $name_default FROM ".$prefix."_categories_products WHERE parent_id=$row[cat_id] ORDER BY '" . $name_language . "'");
	        while ($r = $db->sql_fetchrow($res)) { 
	        	if (!$r[$name_language]) {
	        	    $name_category = $r[$name_default];
	        	} else {
	        	    $name_category = $r[$name_language];
	        	}
	        	echo "<option value = \"$r[cat_id]\">&nbsp;&nbsp;---&gt;&nbsp;$r[$name_language]</option>\n";
	        	$res1 = $db->sql_query("SELECT cat_id, $name_language, $name_default FROM ".$prefix."_categories_products WHERE parent_id=$r[cat_id] ORDER BY '" . $name_language . "'");
	        	while ($r1 = $db->sql_fetchrow($res1)) {
	        	    if (!$r1[$name_language]) {
	        	    	$name_category = $r1[$name_default];
	        	    } else {
	        	    	$name_category = $r1[$name_language];
	        	    }
	        	    echo "<option value = \"$r1[cat_id]\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;----&gt;&nbsp;$r1[$name_language]</option>\n";
	        	}
	        }
	    }
	    echo "</select>&nbsp;(" . _NOTE_MOTHER_CATEGORY . ")";
	    echo "<br><br><br><input type=\"submit\" name=\"add_vend\" value=\"" . _ADDCATEGORY . "\">\n";
	    echo "<input type=\"hidden\" name=\"op\" value=\"add_cat\">\n";
	    echo "</form>";
	    echo  "<br><br><center><font class=\"title\">Important</font>"
	    	."<br>" . _UPDATE_CATEGORIES_LIST ;
	    CloseTable();
	}
	
	function listcategories(){
	    global $prefix, $cookie, $currentlang, $multilingual, $db, $name_language, $name_default, $admin_file;
	    
	    $result = $db->sql_query("SELECT cat_id, $name_language, $name_default FROM ".$prefix."_categories_products WHERE parent_id='0' ORDER BY '" . $name_language . "'");
	    OpenTable();
	    echo  "<center><font class=\"title\">" . _ALL_CATEGORIES . "</font></center>";
	    while($row = $db->sql_fetchrow($result)) {
	    	if (!$row[$name_language]) {
	    	    $name_category = $row[$name_default];
		} else {
		    $name_category = $row[$name_language];
		}
	    	echo "<br><br><b>" . $name_category . "</b>\n";
	    	echo "&nbsp;[&nbsp;<a href=\"".$admin_file.".php?op=edit_cat&cat_id=$row[cat_id]\">". _EDIT."</a>&nbsp;-"
		    ."&nbsp;<a href=\"".$admin_file.".php?op=delete_cat&step=1&cat_id=$row[cat_id]\">". _DELETE."</a>&nbsp;-"
		    ."&nbsp;<a href=\"".$admin_file.".php?op=show_shops&cat_id=$row[cat_id]\">". _SHOW_SHOPS."&nbsp;(" . num_shops($row[cat_id]) . ")</a>&nbsp;]";
		$sql = "SELECT cat_id, $name_language, $name_default FROM ".$prefix."_categories_products WHERE parent_id=$row[cat_id] ORDER BY '" . $name_language . "'" ;
	        $res = $db->sql_query($sql);
	        while($r = $db->sql_fetchrow($res)) { 
		    if (!$r[$name_language]) {
		    	$name_category = $r[$name_default];
	            } else {
	            	$name_category = $r[$name_language];
	            }
	            echo "<br><br>";
	            for ($i=0; $i < 15; $i++) { echo "&nbsp;";}
	            echo "<b>$name_category</b>\n";
	            echo "&nbsp;[&nbsp;<a href=\"".$admin_file.".php?op=edit_cat&cat_id=$r[cat_id]\">". _EDIT."</a>&nbsp;-\n"
		    	."&nbsp;<a href=\"".$admin_file.".php?op=delete_cat&step=1&cat_id=$r[cat_id]\">". _DELETE."</a>&nbsp;-\n"
		    	."&nbsp;<a href=\"".$admin_file.".php?op=show_shops&cat_id=$r[cat_id]\">". _SHOW_SHOPS."&nbsp;(" . num_shops($r[cat_id]) . ")</a>&nbsp;]";
				$res1 = $db->sql_query("SELECT cat_id, $name_language, $name_default FROM ".$prefix."_categories_products WHERE parent_id=$r[cat_id] ORDER BY '" . $name_language . "'");
	            while($r1 = $db->sql_fetchrow($res1)) {
	        	if (!$r1[$name_language]) {
	        	    $name_category = $r1[$name_default];
	        	} else {
	        	    $name_category = $r1[$name_language];
	        	}
	        	echo "<br><br>";
	        	for ($i=0; $i < 30; $i++) { echo "&nbsp;";}
	        	echo "<b>$name_category</b>\n";
	        	echo "&nbsp;[&nbsp;<a href=\"".$admin_file.".php?op=edit_cat&cat_id=$r1[cat_id]\">". _EDIT."</a>&nbsp;-"
		    		."&nbsp;<a href=\"".$admin_file.".php?op=delete_cat&step=1&cat_id=$r1[cat_id]\">". _DELETE."</a>&nbsp;-"
		    		."&nbsp;<a href=\"".$admin_file.".php?op=show_shops&cat_id=$r1[cat_id]\">". _SHOW_SHOPS."&nbsp;(" . num_shops($r1[cat_id]) . ")</a>&nbsp;]";
		    	$res2 = $db->sql_query("SELECT cat_id, $name_language, $name_default FROM ".$prefix."_categories_products WHERE parent_id=$r1[cat_id] ORDER BY '" . $name_language . "'");
		    	while($r2 = $db->sql_fetchrow($res2)) {
		    		if (!$r2[$name_language]) {
		    			$name_category = $r2[$name_default];
		    		} else {
		    			$name_category = $r2[$name_language];
		    		}
		    		echo "<br><br>";
		    		for ($i=0; $i < 45; $i++) { echo "&nbsp;";}
		    		echo "<b>$name_category</b>\n";
		    		echo "&nbsp;[&nbsp;<a href=\"".$admin_file.".php?op=edit_cat&cat_id=$r2[cat_id]\">". _EDIT."</a>&nbsp;-"
		    			."&nbsp;<a href=\"".$admin_file.".php?op=delete_cat&step=1&cat_id=$r2[cat_id]\">". _DELETE."</a>&nbsp;-"
		    			."&nbsp;<a href=\"".$admin_file.".php?op=show_shops&cat_id=$r2[cat_id]\">". _SHOW_SHOPS."&nbsp;(" . num_shops($r2[cat_id]) . ")</a>&nbsp;]";
		    	}
		    }
	        }
	    }
	    echo  "<br><br><center><font class=\"title\">Important</font>"
	    	."<br>" . _UPDATE_CATEGORIES_LIST . ":<br><br>"
	    	."<form name=\"form1\" action=\"".$admin_file.".php\" method=\"get\">"
	    	."<input type=\"hidden\" name=\"op\" value=\"form_list\">"
	    	."<input type=\"submit\" value=\"" . _GENERATE_LIST . "\"></form></center>";
	    CloseTable();
	}
	
	function num_shops($cat_id){
	    global $db, $prefix;
	    $num = $db->sql_numrows($db->sql_query("SELECT c.cat_id FROM ".$prefix."_categories_to_vendors c, ".$prefix."_vendors v WHERE c.cat_id=$cat_id and c.vendor_id = v.vendors_id and v.vendors_type !='inactive'"));
	    if ($num != 0){
	    	return $num;
	    } else {
	    	return 0;
	    }
	}
	
	function showshops(){
	    global $cat_id, $prefix, $cookie, $currentlang, $multilingual, $db, $name_language, $name_default, $admin_file;
	    
	    if (isset($cat_id)){
	    	
	    	$row = $db->sql_fetchrow($db->sql_query("SELECT cat_id, $name_default, $name_language FROM ".$prefix."_categories_products WHERE cat_id='" . $cat_id . "'"));
	    	if (!$row[$name_language]) {
	    	    $name_category = $row[$name_default];
			} else {
		    	$name_category = $row[$name_language];
			}
	    	
	    	OpenTable();
	    	echo "<center><font class=\"title\">" . _CATEGORY . ": $name_category</font></center><br>\n";
	        $res1 = $db->sql_query("SELECT vendor_id FROM ".$prefix."_categories_to_vendors WHERE cat_id='" . $cat_id . "'");
	    	$vendors = array();
	    	if ($db->sql_numrows($res1)){
	    	    echo "<br><b>" . _SHOW_SHOPS . ":</b>";
	    	    while($row1 = $db->sql_fetchrow($res1)) {
	    	    	
	    	    	array_push($vendors, $row1[vendor_id]);
	    	    	$res2 = $db->sql_query("SELECT * FROM ".$prefix."_vendors WHERE vendors_id='" . $row1[vendor_id] . "'");
	    	    	$row2 = $db->sql_fetchrow($res2);
	    	    	echo "<br><br><b>$row2[vendors_name]</b>";
	    	    	echo "&nbsp;[&nbsp;<a href=\"".$admin_file.".php?op=cat_vend_del&step=1&cat_id=$row[cat_id]&vendors_id=$row1[vendor_id]&namevend=$row2[vendors_name]&namecat=$name_category\">". _DELETE."</a>&nbsp;]";
		    	}
			}
			echo "<form name=\"add_vendor\" method=\"post\" action=\"".$admin_file.".php\">";
			echo "<font class=\"content\"><b>". _ADDVENDOR . "</b><br>";
			$rest = $db->sql_query("SELECT vendors_id, vendors_name FROM ".$prefix."_vendors ");
			echo "<select name=\"vendors_id\">";
			echo "<option selected value =\"0\">&nbsp;&nbsp;--&nbsp;&nbsp;--&nbsp;&nbsp;--&nbsp;&nbsp;--&nbsp;&nbsp;</option>\n";
			while ($v = $db->sql_fetchrow($rest)) { 
				if (!in_array($v[vendors_id], $vendors)){
					echo "<option value = \"$v[vendors_id]\">$v[vendors_name]</option>\n";
				}
			}
			echo "</select>";
			echo "<br><br><input type=\"submit\" name=\"add_vend\" value=\"" . _ADDVENDOR . "\">\n";
			echo "<input type=\"hidden\" name=\"op\" value=\"assign_cat_vend\">\n";
			echo "<input type=\"hidden\" name=\"cat_id\" value=\"". $cat_id . "\">\n";
			echo "</form>";
			CloseTable();
	    } else {
			listcategories();
	    }
	}
	
	function addvendor() {
	    global $vendors_name, $vendors_prefix, $vendors_host, $vendors_type, $prefix,  $cookie, $currentlang, $multilingual, $db;
	    OpenTable();
	    $string = check_values();
	    if (!$string){
	    	echo "<br>" .$string;
	    }
	    if ($vendors_type != "active" && $vendors_type != "external") $vendors_type = "inactive";
	    $db->sql_query("INSERT INTO ".$prefix."_vendors values('','" . $vendors_prefix . "','" . $vendors_name . "','" . $vendors_host . "', '" . $vendors_type . "','','','','')");
	    $last_vendor_added = $db->sql_nextid();
	    $db->sql_query("INSERT INTO ".$prefix."_vendors_details set vendors_id = '" . $last_vendor_added . "'");
	    CloseTable();
	    echo "<br>";
	    echo "<center><font class=\"title\">" . _ADDED_VENDOR . ": $vendors_name</font></center>\n";
	}
	
	function form_addvendor() {
	    global $num_min, $vendors_name, $vendors_prefix, $vendors_host, $prefix, $cookie, $currentlang, $multilingual, $db, $admin_file;
	    OpenTable();
	    echo "<center><font class=\"title\">" . _ADDVENDOR . "</font></center><br>\n";
	    echo "<form name=\"vendor_add\" method=\"post\" action=\"".$admin_file.".php\">\n";
	    echo "<font class=\"content\"><b>". _VENDORS_PREFIX . "</b><br>";
	    echo "<input type=\"text\" size=\"32\" name=\"vendors_prefix\" value=\"$vendors_prefix\">&nbsp;[min. $num_min char]\n";
	    echo "<br><br><b>" . _VENDORS_NAME . "</b><br>\n";
	    echo "<input type=\"text\" size=\"32\" name=\"vendors_name\" value=\"$vendors_name\">&nbsp;[min. $num_min char]\n";
	    echo "<br><br><b>" . _VENDORS_HOST . "</b> (*)<br>\n";
	    echo "<input type=\"text\" size=\"72\" name=\"vendors_host\" value=\"$vendors_host\">&nbsp;[". _FORMAT_HOST . "]\n";
	    echo "<br><br><b>" . _SET_TYPE . "</b><br>\n";
	    echo "<select name=\"vendors_type\">"
	    		."<option value =\"\">&nbsp;&nbsp;--&nbsp;&nbsp;--&nbsp;&nbsp;</option>\n"
	    		."<option value =\"active\" ";
	    	if ($row['vendors_type'] == "active" ) echo "selected";
	    	echo ">" . _TYPE_ACTIVE . "</option>\n"
	    		."<option value =\"inactive\" ";
	    	if ($row['vendors_type'] == "inactive" ) echo "selected";
	    	echo ">" . _TYPE_INACTIVE . "</option>\n"
	    		."<option value =\"external\" ";
	    	if ($row['vendors_type'] == "external" ) echo "selected";
	    	echo ">" . _TYPE_EXTERNAL . "</option>\n"
	    		."</select>";
	    echo "<br><br><br><input type=\"submit\" name=\"add_vend\" value=\"" . _SUBMIT_ADD . "\">\n";
	    echo "<input type=\"hidden\" name=\"op\" value=\"addvendor\">\n";
	    echo "</form>";
	    echo "(*): ". _NOTE_URL;
	    CloseTable();
	    echo "<br>";
	}
	
	function form_config() {
	    global $Conf_Multishop, $prefix, $cookie, $currentlang, $multilingual, $db, $admin_file;
	    OpenTable();
	    //$row = $db->sql_fetchrow($db->sql_query("SELECT * FROM ".$prefix."_multishop_config"));
	    echo "<center><font class=\"title\">" . _CONFIG . "</font></center><br>\n"
	    	."<form name=\"config\" method=\"post\" action=\"".$admin_file.".php\">\n"
	    	."<br><hr align=\"left\" width=\"70%\">Add/Edit Stores and Categories"
	    	."<br><br><input type=\"text\" size=\"4\" name=\"new_num_min\" value=\"" . $Conf_Multishop['num_min'] ."\">\n"
	    	."<font class=\"content\"><b>". _NUM_MIN . "</b>&nbsp;"
	    	."<br><br><input type=\"text\" size=\"4\" name=\"new_num_min_cat\" value=\"" . $Conf_Multishop['num_min_cat'] ."\">\n"
	    	."<font class=\"content\"><b>". _NUM_MIN_CAT . "</b>&nbsp;"
	    	."<br><br><hr align=\"left\" width=\"70%\">Mode to display the categories in the Categories_Products block";
		echo "<br><br><input type=\"radio\" name=\"new_mode_cats_block\"";
		if ($Conf_Multishop['mode_cats_block'] == "1") echo " value=\"1\" checked=\"checked\">"; else echo " value=\"1\">";
		echo "<font class=\"content\"><b> mode as drop-down menu</b>";
		echo "<br><input type=\"radio\" name=\"new_mode_cats_block\"";
		if ($Conf_Multishop['mode_cats_block'] == "2") echo " value=\"1\" checked=\"checked\">"; else echo " value=\"2\">";
		echo "<font class=\"content\"><b> mode as tree</b>";
		echo "<br><input type=\"radio\" name=\"new_mode_cats_block\"";
		if ($Conf_Multishop['mode_cats_block'] != "1" && $Conf_Multishop['mode_cats_block'] != "2") echo " value=\"0\" checked=\"checked\">"; else echo " value=\"0\">";
		echo "<font class=\"content\"><b> random: as tree and drop-down menu</b>"
	    	."<br><br><hr align=\"left\" width=\"70%\">Mode to display the Shops in the Select_Vendors block";
		echo "<br><br><input type=\"radio\" name=\"new_mode_shops_block\"";
		if ($Conf_Multishop['mode_shops_block'] == "1") echo " value=\"1\" checked=\"checked\">"; else echo " value=\"1\">";
		echo "<font class=\"content\"><b> mode as drop-down menu</b>";
		echo "<br><input type=\"radio\" name=\"new_mode_shops_block\"";
		if ($Conf_Multishop['mode_shops_block'] == "2") echo " value=\"1\" checked=\"checked\">"; else echo " value=\"2\">";
		echo "<font class=\"content\"><b> mode as tree</b>";
		echo "<br><input type=\"radio\" name=\"new_mode_shops_block\"";
		if ($Conf_Multishop['mode_shops_block'] != "1" && $Conf_Multishop['mode_shops_block'] != "2") echo " value=\"0\" checked=\"checked\">"; else echo " value=\"0\">";
		echo "<font class=\"content\"><b> random: as tree and drop-down menu</b>";
		echo "<hr align=\"left\" width=\"70%\"><b>Random</b> Products displayed in Home Page and in the Categories_Products module"
	    	."<br><br><input type=\"text\" size=\"4\" maxlength=\"2\" name=\"new_num_prod_home\" value=\"" . $Conf_Multishop['num_prod_home'] ."\">\n"
	    	."<font class=\"content\"><b>". _NUM_PROD_HOME . "</b>&nbsp;"
	    	."<br><br><input type=\"text\" size=\"4\" maxlength=\"2\" name=\"new_num_prod_line\" value=\"" . $Conf_Multishop['num_prod_line'] ."\">\n"
	    	."<font class=\"content\"><b>". _NUM_PROD_FOR_LINE . "</b>&nbsp;"
	    	."<br><br><input type=\"text\" size=\"4\" maxlength=\"2\" name=\"new_num_prod_total\" value=\"" . $Conf_Multishop['num_prod_total'] ."\">\n"
	    	."<font class=\"content\"><b>". _NUM_PROD_TOTAL . "</b>&nbsp;"
			."<br><br><hr align=\"left\" width=\"70%\">Products displayed by a selected category in the Categories_Products module"
	    	."<br><br><input type=\"text\" size=\"4\" maxlength=\"2\" name=\"new_prod_for_shop\" value=\"" . $Conf_Multishop['prod_for_shop'] ."\">\n"
	    	."<font class=\"content\"><b>". _PRODS_FOR_SHOP . "</b>&nbsp;"
	    	."<br><br><input type=\"text\" size=\"4\" maxlength=\"2\" name=\"new_max_prod_page\" value=\"" . $Conf_Multishop['max_prod_page'] ."\">\n"
	    	."<font class=\"content\"><b>". _MAX_PROD_FOR_PAGE . "</b>&nbsp;"
	    	."<br><br><hr align=\"left\" width=\"70%\">Home Page (News) and RSS"
	    	."<br><br><input type=\"text\" size=\"4\" maxlength=\"2\" name=\"new_home_prods\" value=\"" . $Conf_Multishop['home_prods'] ."\">\n"
	    	."<font class=\"content\"><b>". _NUM_HOME_PRODS . "</b>&nbsp;"
	    	."<br><br><input type=\"text\" size=\"4\" maxlength=\"2\" name=\"new_home_news\" value=\"" . $Conf_Multishop['home_news'] ."\">\n"
	    	."<font class=\"content\"><b>". _NUM_HOME_NEWS . "</b>&nbsp;"
	    	."<br><br><input type=\"checkbox\" ";
	    if (intval($Conf_Multishop['show_shops']) == 1 ) echo "checked ";
	    echo "name=\"new_show_shops\">\n";
	    echo "<font class=\"content\"><b>". _SHOW_SHOPS_IN_HOME . "</b>&nbsp;";
	    echo "<br><br><input type=\"checkbox\" ";
	    if (intval($Conf_Multishop['show_rss']) == 1 ) echo "checked ";
	    echo "name=\"new_show_rss\">\n";
	    echo "<font class=\"content\"><b>". _SHOW_RSS . "</b>&nbsp;";
	    echo "<br><br><hr align=\"left\" width=\"70%\">Images Widht of every shop";
	    echo "<br><br><input type=\"text\" size=\"4\" maxlength=\"3\" name=\"new_widht_logo\" value=\"" . $Conf_Multishop['widht_logo'] ."\">\n";
	    echo "<font class=\"content\"><b>". _WIDHT_LOGO . "</b>&nbsp;";
	    echo "<br><br><input type=\"text\" size=\"4\" maxlength=\"3\" name=\"new_widht_shop\" value=\"" . $Conf_Multishop['widht_shop'] ."\">\n";
	    echo "<font class=\"content\"><b>". _WIDHT_IMAGE_SHOP . "</b>&nbsp;";
	    echo "<br><br><input type=\"text\" size=\"4\" maxlength=\"3\" name=\"new_widht_prod\" value=\"" . $Conf_Multishop['widht_prod'] ."\">\n";
	    echo "<font class=\"content\"><b>". _WIDHT_IMAGE_PRODUCTION . "</b>&nbsp;";
	    echo "<br><br><hr align=\"left\" width=\"70%\">Tax rate";
	    echo "<br><br>&nbsp;&nbsp;<input type=\"checkbox\" ";
	    if (intval($Conf_Multishop['include_taxrate']) == 1 ) echo "checked ";
	    echo "name=\"new_include_taxrate\">\n";
	    echo "<font class=\"content\">&nbsp;<b>". _INCLUDE_TAX_RATE . "</b>&nbsp;";
	    echo "<br><br>&nbsp;&nbsp;<input type=\"checkbox\" ";
	    if (intval($Conf_Multishop['show_taxrate']) == 1 ) echo "checked ";
	    echo "name=\"new_show_taxrate\">\n";
	    echo "<font class=\"content\">&nbsp;<b>". _SHOW_TAX_RATE . "</b>&nbsp;";
	    echo "<br><br><hr align=\"left\" width=\"70%\">";
	    echo "<br><br><input type=\"submit\" name=\"edit_config\" value=\"" . _SAVECHANGES . "\">\n";
	    echo "<input type=\"hidden\" name=\"op\" value=\"update_config\">\n";
	    echo "</form>";
	    CloseTable();
	    echo "<br>";
	}
	
	function check_values() {
	    global $num_min, $vendors_name, $vendors_prefix, $vendors_host;
	    $report_errors ;
	    if (strlen($vendors_name) < $num_min) {
	    	$report_errors .= " <b>"._VENDORS_NAME . "</b>";
	    }
	    if (strlen($vendors_prefix) < $num_min) {
	    	if ($report_errors){ $report_errors .= " - ";}
	    	$report_errors .= "<b>"._VENDORS_PREFIX . "</b>";
	    }
	    if ($report_errors) {
	    	$report_errors = _ERROR_LENGHT. ": [$num_min]<br>" . $report_errors . "<br>";
	    }
	    
	    if (!preg_match("/^([\w]+[\.$])?[\w-_]+\.[\w]+[\w]+/i",$vendors_host) || preg_match("/(:\/\/)/i",$vendors_host)) {
	        $report_errors .= _ERROR_HOST;
	    }
	    if ($report_errors) {
	    	return $report_errors;
	    } else {
	    	return false;
	    }
	}
	
	function menu() {
	    global $prefix, $cookie, $currentlang, $multilingual, $db, $admin_file;
	    OpenTable();
		?>
		<script type="text/javascript">
		function helpwindow(){
			window.open ("modules/Multishop/guide-multishop.php?currentlang=<? echo $currentlang; ?>","Copyright","toolbar=no,location=no,directories=no,status=no,scrollbars=yes,resizable=yes,copyhistory=no,width=550,height=450");
		}
		</script>
		<?
	    echo "<center><font class=\"title\">Multi-Shop Administration</font>"
	    	."&nbsp;&nbsp;<a href=\"javascript:helpwindow()\" title=\"guide Multi-Shop module\"><img src=\"modules/Multishop/guide.gif\" border=\"0\"></a><br><br>"
	    	."<table width=\"100%\"><tr>"
	    	."<td align=\"center\" width=\"100%\">"
	    	."<b><a href=\"".$admin_file.".php?op=shops\"><font class=\"title\">" . _VENDORS . "</font></a></b>\n"
	    	."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
	    	."<b><a href=\"".$admin_file.".php?op=list_cat\"><font class=\"title\">" . _CATEGORIES_PRODUCTS . "</font></a></b>"
	    	."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
	    	."<b><a href=\"".$admin_file.".php?op=config\"><font class=\"title\">" . _CONFIG . "</font></a></b>\n"
	    	."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
	    	."<b><a href=\"".$admin_file.".php?op=currencies\"><font class=\"title\">" . _CURRENCIES . "</font></a></b>\n"
	    	."</td></tr></table>";
	    CloseTable();
	    echo "<br>";
	}
	
	function listvendors() {
	    global $prefix, $cookie, $currentlang, $multilingual, $db, $admin_file;
	    $result = $db->sql_query("SELECT * FROM ".$prefix."_vendors ORDER BY vendors_prefix");
	    OpenTable();
	    if (!$db->sql_numrows($result)){
		echo "<center><font class=\"title\"><b>" . _NOTVENDORS . "</b></font></center>";
	    } else {
		echo "<center><font class=\"title\"><b>" . _LISTVENDORS	. "</b></font></center><br>";
		echo "<table border=\"0\"><tr><td>&nbsp;<b>"._VENDORS_PREFIX."</b>&nbsp;</td><td>&nbsp;</td><td>&nbsp;<b>"._VENDORS_NAME."</b>&nbsp;</td><td>&nbsp;<b>"._VENDORS_HOST."</b>&nbsp;</td><td>&nbsp;</td><td>&nbsp;<b>" . _PRODUCTS . "</b>&nbsp;</td><td>&nbsp;<b>" . _REVIEWS . "</b>&nbsp;</td><td>&nbsp;<b>" . _SPECIALS . "</b>&nbsp;</td><td>&nbsp;<b>" . _BEST . "</b>&nbsp;</td></tr>";
		while ($row = $db->sql_fetchrow($result)) {
		    echo "<tr><td>&nbsp;".$row['vendors_prefix']."&nbsp;</td><td>&nbsp;(<i>". $row['vendors_type'] . "</i>)&nbsp;</td>"
		    ."<td>&nbsp;".$row['vendors_name']."&nbsp;</td>"
		    ."<td>&nbsp;".$row['vendors_host']."&nbsp;</td>"
		    ."<td>[&nbsp;<a href=\"".$admin_file.".php?op=edit&vendor=$row[vendors_id]\">". _EDIT."</a>&nbsp;-"
		    ."&nbsp;<a href=\"".$admin_file.".php?op=delete&step=1&vendor=$row[vendors_id]\">". _DELETE."</a>&nbsp;]</td>"
		    ."<td align=center>&nbsp;";
		    if ($row['show_prods']== 1) echo "<u><b>X</b><u/>"; else echo "-";
		    echo "</td><td align=center>&nbsp;";
		    if ($row['show_reviews']== 1) echo "<u><b>X</b><u/>"; else echo "-";
		    echo "</td><td align=center>&nbsp;";
		    if ($row['show_specials']== 1) echo "<u><b>X</b><u/>"; else echo "-";
		    echo "</td><td align=center>&nbsp;";
		    if ($row['show_best']== 1) echo "<u><b>X</b><u/>"; else echo "-";
		    echo "</td></tr>";
		}
		echo "</table>";
	    }
	    CloseTable();
	}
	
	function editvendor(){
	    global $vendor, $prefix, $cookie, $currentlang, $multilingual, $db, $name_default, $name_language, $admin_file;
	    OpenTable();
	    if (!intval($vendor)){
	    	echo "<center><font class=\"title\">" . _NOT_VENDOR_SELECTED . "</font></center>";
	    } elseif ($db->sql_numrows($db->sql_query("SELECT vendors_prefix FROM ".$prefix."_vendors WHERE vendors_id=$vendor")) == 0) {
	    	echo "<center><font class=\"title\">" . _SHOP_NOT_FOUND . "</font></center>";
	    } else {
	        
	    	$categories = array();
	    	$array_cpath = array();
	    	$cats = $db->sql_query("SELECT * FROM ".$prefix."_categories_to_vendors WHERE vendor_id=$vendor");
			if ($db->sql_numrows($cats)){
				while($cat_row = $db->sql_fetchrow($cats)) {
					array_push($categories, $cat_row['cat_id']);
					$array_cpath[$cat_row[cat_id]] = $cat_row['cpath'];
				}
			}
			$result = $db->sql_query("SELECT * FROM ".$prefix."_vendors WHERE vendors_id='" . $vendor . "'");
			$row = $db->sql_fetchrow($result);
	        $namevend = $row['vendors_name'];
	    	echo "<center><font class=\"title\">" . _EDIT_VENDOR . "</font></center><br>\n";
	    	echo "<form name=\"vendor\" method=\"post\" action=\"".$admin_file.".php\">\n";
	    	echo "<font class=\"content\"><b>". _VENDORS_PREFIX . "</b><br>";
	    	echo "<input type=\"text\" size=\"32\" name=\"vendors_prefix\" value=\"" . $row['vendors_prefix'] ."\">\n";
	    	echo "<br><br><b>" . _VENDORS_NAME . "</b><br>\n";
	    	echo "<input type=\"text\" size=\"32\" name=\"vendors_name\" value=\"" . $row['vendors_name'] ."\">\n";
	    	echo "<br><br><b>" . _VENDORS_HOST . "</b> (*)<br>\n";
	    	echo "<input type=\"text\" size=\"72\" name=\"vendors_host\" value=\"" . $row['vendors_host'] ."\">\n";
	    	echo "<br><br><b>" . _SET_TYPE . "</b><br>\n";
	    	echo "<select name=\"vendors_type\">"
	    		."<option value =\"\">&nbsp;&nbsp;--&nbsp;&nbsp;--&nbsp;&nbsp;</option>\n"
	    		."<option value =\"active\" ";
	    	if ($row['vendors_type'] == "active" ) echo "selected";
	    	echo ">" . _TYPE_ACTIVE . "</option>\n"
	    		."<option value =\"inactive\" ";
	    	if ($row['vendors_type'] == "inactive" ) echo "selected";
	    	echo ">" . _TYPE_INACTIVE . "</option>\n"
	    		."<option value =\"external\" ";
	    	if ($row['vendors_type'] == "external" ) echo "selected";
	    	echo ">" . _TYPE_EXTERNAL . "</option>\n"
	    		."</select>";
	    	
	    	echo "<br><br><table border=\"0\"><tr><td align=\"right\">" . _ENABLE_TO_SHOW . "</td><td>&nbsp;&nbsp;</td><td valign=\"top\">&nbsp;<b>" . _PRODUCTS . "</b>&nbsp;</td><td valign=\"top\">&nbsp;<b>" . _REVIEWS . "</b>&nbsp;</td><td valign=\"top\">&nbsp;<b>" . _SPECIALS . "</b>&nbsp;</td><td valign=\"top\">&nbsp;<b>" . _BEST . "</b>&nbsp;</td></tr>\n";
	    	echo "<tr><td>" . _ENABLE_NOTICE . "</td><td>&nbsp;&nbsp;</td><td align=\"center\">&nbsp;<input type=\"checkbox\"";
	    	if ($row['show_prods'] == 1) echo " checked";
	    	echo " name=\"show_prods\">\n&nbsp;</td><td align=\"center\">&nbsp;<input type=\"checkbox\"";
	    	if ($row['show_reviews'] == 1) echo " checked";
	    	echo " name=\"show_reviews\">\n&nbsp;</td><td align=\"center\">&nbsp;<input type=\"checkbox\"";
	    	if ($row['show_specials'] == 1) echo " checked";
	    	echo " name=\"show_specials\">\n&nbsp;</td><td align=\"center\">&nbsp;<input type=\"checkbox\"";
	    	if ($row['show_best'] == 1) echo " checked";
	    	echo " name=\"show_best\">\n&nbsp;</td></tr></table>";
	    	
	    	echo "<br><b>" . _ASSIGN_CATEGORY . "</b><br>\n";
	    	echo "<select name=\"add_cat\">";
	    	echo "<option selected value =\"0\">&nbsp;&nbsp;--&nbsp;&nbsp;--&nbsp;&nbsp;--&nbsp;&nbsp;--&nbsp;&nbsp;</option>\n";
	    	$Result = $db->sql_query("SELECT cat_id, $name_language, $name_default FROM ".$prefix."_categories_products WHERE parent_id='0' ORDER BY '" . $name_language . "'");
	    	while($row = $db->sql_fetchrow($Result)) { 
	        	if (!$row[$name_language]) {
	        		$name_category = $row[$name_default];
	        	} else {
	        	    	$name_category = $row[$name_language];
	        	}
	        	if (in_array($row['cat_id'], $categories)){
	        		$value_cat = 0;
	        		$name_category = "$name_category&nbsp;(**)";
	        	} else {
	        		$value_cat = $row['cat_id'];
	        	}
	        	echo "<option value = \"$value_cat\">" . $name_category . "</option>\n";
	        	$res = $db->sql_query("SELECT cat_id, $name_language, $name_default FROM ".$prefix."_categories_products WHERE parent_id=$row[cat_id] ORDER BY '" . $name_language . "'");
	        	while ($r = $db->sql_fetchrow($res)) { 
	        		if (!$r[$name_language]) {
	        		    $name_category = $r[$name_default];
	        		} else {
	        		    $name_category = $r[$name_language];
	        		}
	        		if (in_array($r['cat_id'], $categories)){
	        			$value_cat = 0;
	        			$name_category = "<b>$name_category&nbsp;(**)</b>";
	        		} else {
	        			$value_cat = $r['cat_id'];
	        		}
	        		echo "<option value = \"$value_cat\">&nbsp;&nbsp;---&gt;&nbsp;$name_category</option>\n";
	        		$res1 = $db->sql_query("SELECT cat_id, $name_language, $name_default FROM ".$prefix."_categories_products WHERE parent_id=$r[cat_id] ORDER BY '" . $name_language . "'");
	        		while ($r1 = $db->sql_fetchrow($res1)) {
	        	 	   	if (!$r1[$name_language]) {
	        	   	 		$name_category = $r1[$name_default];
	        	    		} else {
	        	    			$name_category = $r1[$name_language];
	        	   	 	}
	        	    		if (in_array($r1['cat_id'], $categories)){
	        				$value_cat = 0;
	        				$name_category = "<b>$name_category&nbsp;(**)</b>";
	        			} else {
	        				$value_cat = $r1['cat_id'];
	        			}
	        			echo "<option value = \"$value_cat\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;----&gt;&nbsp;$name_category</option>\n";
	        		}
	     	   	}
	    	}
	    	echo "</select>&nbsp;&nbsp;&nbsp;";
	    	echo "<b>cPath:&nbsp;</b><input type=\"text\" name=\"cpath\" size=\"20\" maxlength=\"16\"> (***)\n";
	    	echo "<br><br><input type=\"submit\" name=\"edit_vend\" value=\"" . _SAVECHANGES . "\">\n";
	    	echo "<input type=\"hidden\" name=\"vendor\" value=\"" . $vendor . "\">\n";
	    	echo "<input type=\"hidden\" name=\"op\" value=\"update\">\n";
	    	
	    	if ($categories) echo "<br><b>" . _CATEGORIES . ":</b>" ;
	    	foreach ($categories as $cat_id){
	    		
	    		$result2 = $db->sql_query("SELECT $name_default, $name_language FROM ".$prefix."_categories_products WHERE cat_id=$cat_id");
		    	$cat = $db->sql_fetchrow($result2);
		    	if($cat[$name_language]){
		    		$cat_name = $cat[$name_language];
		    	} else {
		    		$cat_name = $cat[$name_default];
		    	}echo "<br><br><b>".$cat_name."</b>&nbsp;";
		    	if ($array_cpath[$cat_id]){
		    		echo "(cpath = " . $array_cpath[$cat_id] . ")&nbsp;";
		    	}
		    	echo "[&nbsp;<a href=\"".$admin_file.".php?op=cat_vend_del&step=1&cat_id=$cat_id&vendors_id=$vendor&namevend=$namevend&namecat=$cat_name\">". _DELETE."</a>&nbsp;]\n";
		} 
	    	
	    	$Result = $db->sql_query("select * from ".$prefix."_vendors_details where vendors_id = $vendor");
	    	$Row = $db->sql_fetchrow($Result);
	    	echo "<br><br><hr><br><b>" . _PATH_LOGO . "</b><br><input type=\"text\" size=\"50\" name=\"logo\" value=\"" . $Row['logo'] . "\">\n";
	    	echo "<br><br><b>" . _PATH_IMAGE_SHOP . "</b><br><input type=\"text\" size=\"50\" name=\"image_shop\" value=\"" . $Row['image_shop'] . "\">\n";
	    	echo "<br><br><b>" . _PATH_IMAGE_PRODUCT . "</b><br><input type=\"text\" size=\"50\" name=\"image_prod\" value=\"" . $Row['image_prod'] . "\">\n";
	    	echo "<br><br><b>" . _SHOP_ADDRESS . "</b><br><textarea name=\"address\" rows=\"3\" cols=\"70\" value=\"\">" . $Row['address'] . "</textarea>\n";
	
	    	$num_fields = $db->sql_numfields($Result);
	    	$shop_descr = "<br><br><hr><center><font class=\"title\">" . DESCRIPTION_SHOP . "</font></center>\n";
	    	$prod_descr = "<br><br><hr><center><font class=\"title\">" . DESCRIPTION_PRODUCTION . "</font></center>\n";
	    	for ($i = 5; $i < $num_fields; $i++) {
	    		
	    		$field = $db->sql_fieldname($i, $Result);
	    		if (ereg("shop_",$field)){
	    			$lang = ereg_replace("shop_","",$field);
	    			$shop_lang = "shop_" . $lang;
	    			$shop_descr .= "<br><br><b>$lang</b><br><textarea name=\"$shop_lang\" rows=\"6\" cols=\"70\">" . $Row[$shop_lang] . "</textarea>\n";
	    		} elseif (ereg("prod_",$field)){
	    			$lang = ereg_replace("prod_","",$field);
	    			$prod_lang = "prod_" . $lang;
	    			$prod_descr .= "<br><br><b>$lang</b><br><textarea name=\"$prod_lang\" rows=\"6\" cols=\"70\">\n" . $Row[$prod_lang] . "</textarea>";
	    		}
	    	}
	    	echo $shop_descr;
	    	echo $prod_descr;
	    	echo "<br><br><input type=\"submit\" name=\"edit_vend\" value=\"" . _SAVECHANGES . "\">\n";
	    	echo "</form>";
	    	echo "<br><br><br>(*): ". _NOTE_URL;
	    	echo "<br>(**): ". _ALREADY_ASSIGNED;
	    	echo "<br>(***): ". _NOTE_CPATH;
	    }
	    echo "<br><br>";
	    echo "</center>\n";
	    CloseTable();
	}
	
	function updatevendor(){
	    global $vendor, $vendors_name, $vendors_prefix, $vendors_host, $vendors_type, $show_prods, $show_reviews, $show_specials, $show_best, $add_cat, $cpath, $prefix, $cookie, $currentlang, $multilingual, $db;
	    
	    $Result = $db->sql_query("select * from ".$prefix."_vendors_details where vendors_id = $vendor");
	    $num_fields = $db->sql_numfields($Result);
	    $string_update = "UPDATE ".$prefix."_vendors_details set ";
	    for($i = 1; $i < $num_fields; $i++){
	    	$field = $db->sql_fieldname($i, $Result);
	    	global $$field;
	    	$value = $$field;
	    	$string_update .= $field . " = '". $value . "'";
	    	if ($i != ($num_fields - 1)){
	    		$string_update .= ", ";
	    	}
	    		
	    }
	    $string_update .= " WHERE vendors_id='" . $vendor . "'";
	    OpenTable();
	    if (!$vendor){
	    	echo "<center><font class=\"title\">" . _NOT_VENDOR_SELECTED . "</font></center>";
	    } else {
			$string = check_values();
	    	if (!$string){
				echo "<br>" .$string;
	    	}
			$result = $db->sql_query("UPDATE ".$prefix."_vendors set vendors_prefix='" . $vendors_prefix . "', vendors_name='" . $vendors_name . "',vendors_host='" . $vendors_host . "' WHERE vendors_id='" . $vendor . "'");
			if ($vendors_type != "") $db->sql_query("UPDATE ".$prefix."_vendors set vendors_type='" . $vendors_type . "' WHERE vendors_id='" . $vendor . "'");
			$result = $db->sql_query($string_update);
			if ($vendors_type == "inactive"){
				$db->sql_query("UPDATE ".$prefix."_vendors set show_prods ='0', show_reviews ='0', show_specials ='0', show_best = '0' WHERE vendors_id='" . $vendor . "'");
			} else {
				if ($show_prods == "on") $setpr = 1; else $setpr = 0;
				if ($show_reviews == "on") $setrew = 1; else $setrew = 0;
				if ($show_specials == "on") $setsp = 1; else $setsp = 0;
				if ($show_best == "on") $setbes = 1; else $setbes = 0;
				$db->sql_query("UPDATE ".$prefix."_vendors set show_prods =$setpr, show_reviews =$setrew, show_specials =$setsp, show_best = $setbes WHERE vendors_id='" . $vendor . "'");
			}
			
	        // check if the vendor is already assigned to this categegory
			if ($add_cat != 0){
				$result = $db->sql_query("SELECT * FROM ".$prefix."_categories_to_vendors WHERE cat_id=$add_cat AND vendor_id=$vendor");
				if (!$db->sql_numrows($result)){
					$result = $db->sql_query("INSERT INTO ".$prefix."_categories_to_vendors VALUES ('". $add_cat . "','" . $vendor . "','" . $cpath . "')");
				}// else { echo "$add_cat - $vendor"; }
			}
			echo "<center><font class=\"title\">" . _VENDOR_UPDATED . ": $vendors_name</font></center>";
	    }
	    CloseTable();
	    echo "<br>";
	}
	
	function deletevendor(){
	    global $step, $vendor, $prefix, $cookie, $currentlang, $multilingual, $db, $admin_file;
	    OpenTable();
	    if (!$vendor){
	    	echo "<center><font class=\"title\">" . _NOT_VENDOR_SELECTED . "</font></center>";
	    } else {
	    	$result = $db->sql_query("SELECT vendors_name FROM ".$prefix."_vendors WHERE vendors_id='" . $vendor . "'");
	        $row = $db->sql_fetchrow($result);
	        if($step == 1){
				echo "<center><font class=\"title\">" . _WARNING_DELETE . " '$row[vendors_name]' ?\n";
				echo "<br><br>[&nbsp;&nbsp;\n";
				echo "<a href=\"".$admin_file.".php?op=delete&step=2&vendor=$vendor\">" . _YES . "</a>&nbsp;&nbsp;-&nbsp;&nbsp;\n";
				echo "<a href=\"".$admin_file.".php?op=multishop\">"  . _NO ."</a>&nbsp;&nbsp;]</font></center>";
			} elseif ($step ==2) {
		    
				$db->sql_query("DELETE FROM ".$prefix."_vendors WHERE vendors_id='" . $vendor . "'");
				$db->sql_query("DELETE FROM ".$prefix."_vendors_details WHERE vendors_id='" . $vendor . "'");
				$db->sql_query("DELETE FROM ".$prefix."_categories_to_vendors WHERE vendor_id='" . $vendor . "'");
				$db->sql_query("DELETE FROM privacy WHERE allow_vendors_id='" . $vendor . "'");
				echo "<center><font class=\"title\">" . _VENDOR_DELETED . ": $row[vendors_name]</font></center>";
			}
	    }
	    CloseTable();
	    echo "<br>";
	}

	/*********************************************************/
	/* Multi-Shop switch options                             */
	/*********************************************************/
	
	switch ($op){
	
		case "generate_list":
	    	include ('header.php');
	    	GraphicAdmin();
	    	menu();
	    	generate_list();
	    	include ('footer.php');
	    	break;
			
		case "form_list":
	    	include ('header.php');
	    	GraphicAdmin();
	    	menu();
	    	form_generate_list();
	    	include ('footer.php');
	    	break;
			
	    case "default_curr":
	    	include ('header.php');
	    	GraphicAdmin();
	    	set_default();
	    	menu();
	    	include ('footer.php');
	    	break;
	    	
	    case "edit_curr":
	    	include ('header.php');
	    	GraphicAdmin();
	    	menu();
	    	edit_currency();
	    	include ('footer.php');
	    	break;
	    	
	    case "insert_curr":
	    	include ('header.php');
	    	GraphicAdmin();
	    	menu();
	    	insert_currency();
	    	include ('footer.php');
	    	break;
	    	
	    case "save_curr":
	    	include ('header.php');
	    	save_currency();
	    	GraphicAdmin();
	    	menu();
	    	include ('footer.php');
	    	break;
	    	
	    case "add_curr":
	    	include ('header.php');
	    	GraphicAdmin();
	    	menu();
	    	add_currency();
	    	include ('footer.php');
	    	break;
	    	
	    case "del_curr":
	    	include ('header.php');
	    	GraphicAdmin();
	    	deletecurrency();
			if ($step == 2){
			    menu();
			    listcurrencies();
			}
			include ('footer.php');
			break;
	    	
	    case "currencies":
	    	include ('header.php');
	    	GraphicAdmin();
	    	menu();
	    	listcurrencies();
	    	include ('footer.php');
	    	break;
	    	
	    case "multishop":
	    	include ('header.php');
	    	GraphicAdmin();
	    	menu();
	    	listvendors();
	    	echo "<br>";
	    	listcategories();
	    	include ('footer.php');
	    	break;
	
	    case "list_cat":
	    	include ('header.php');
	    	GraphicAdmin();
	    	menu();
	    	listcategories();
	    	form_addcategory();
	    	include ('footer.php');
	    	break;
	
	    case "show_shops":
	    	include ('header.php');
	    	GraphicAdmin();
	    	menu();
	    	showshops();
	    	include ('footer.php');
	    	break;
	
	    case "edit_cat":
	    	include ('header.php');
	    	GraphicAdmin();
	    	menu();
	    	listcategories();
	    	editcategory();
	    	include ('footer.php');
	    	break;
	
	    case "update_cat":
		include ('header.php');
	    	GraphicAdmin();
	    	if (strlen($$name_default) < $num_min_cat ){
	    		OpenTable();
	    		echo "<center><font class=\"title\">ERROR !<br></font> \n"
	    		     . _ERROR_LENGHT . ": <br><b>" . _CATEGORY . " - " . $$name_default . "</b></center>";
	    		CloseTable();
	    		echo "<br>";
	    		editcategory($cat_id);
	    	} else {
	    		updatecategory();
	    		menu();
			listcategories();
	    	}
	    	include ('footer.php');
		break;
	
	    case "delete_cat":
		include ('header.php');
		deletecategory();
		if ($step == 2){
		    menu();
		    listcategories();
		}
		include ('footer.php');
		break;
	
	    case "cat_vend_del":
	    	include ('header.php');
	    	GraphicAdmin();
	    	delete_catvend();
	    	if ($step == 2){
	    		menu();
	    		listcategories();
	    	}
	    	include ('footer.php');
	    	break;
	
	    case "assign_cat_vend":
	    	include ('header.php');
	    	GraphicAdmin();
	    	menu();
	    	if ($vendors_id != 0) assign_catvend();
	    	include ('footer.php');
	    	break;
	
	    case "add_cat":
	    	include ('header.php');
	    	GraphicAdmin();
	    	menu();
	    	addcategory();
	    	include ('footer.php');
	    	break;
	
	    case "shops":
	    	include ('header.php');
	    	GraphicAdmin();
	    	menu();
	    	listvendors();
	    	echo "<br>";
	    	form_addvendor();
	    	include ('footer.php');
	    	break;
	
	    case "config":
	    	include ('header.php');
	    	GraphicAdmin();
	    	menu();
	    	form_config();
	    	include ('footer.php');
	    	break;
	
	    case "update_config":
	    	include ('header.php');
	    	GraphicAdmin();
	    	updateconfig();
	    	menu();
	    	listvendors();
		include ('footer.php');
	    	break;
	
	    case "addvendor":
		include ('header.php');
	    	GraphicAdmin();
	    	$string = check_values();
	    	if ($string){
	    		OpenTable();
	    		echo "<center><font class=\"title\">ERROR:<br></font> \n"
	    		     ."$string</center>";
	    		CloseTable();
	    		echo "<br>";
	    		form_addvendor();
	    	} else {
	    		addvendor();
	    		menu();
			listvendors();
		}
		include ('footer.php');
		break;
	
	    case "edit":
		include ('header.php');
	    	GraphicAdmin();
	    	menu();
	    	editvendor();
	    	include ('footer.php');
		break;
	
	    case "update":
		include ('header.php');
	    	GraphicAdmin();
	    	$string = check_values();
	    	if ($string){
	    		OpenTable();
	    		echo "<center><font class=\"title\">ERROR:<br></font> \n"
	    		     ."$string</center>";
	    		CloseTable();
	    		echo "<br>";
	    		editvendor();
	    	} else {
	    		updatevendor();
	    		menu();
			listvendors();
		
	    	}
	    	include ('footer.php');
		break;
	
	    case "delete":
			include ('header.php');
			GraphicAdmin();
		    deletevendor();
			if ($step == 2){
			    menu();
			    listvendors();
			}
			include ('footer.php');
		break;
	}

} else {
	include("header.php");
	GraphicAdmin();
	OpenTable();
	echo "<center><b>"._ERROR."</b><br><br>You do not have administration permission for module \"$module_name\"</center>";
	CloseTable();
	include("footer.php");
}

?>