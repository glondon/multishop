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
/* $Id: block-Categories_Products.php,v 1.1.1.1 2005/11/21 13:47:35 tropic Exp $ */

if ( !defined('BLOCK_FILE') ) {
    Header("Location: ../index.php");
    die();
}

global $prefix, $db, $currentlang, $Conf_Multishop;

// if $display_as_tree is 1, the categories structure will be
if ($Conf_Multishop['mode_cats_block'] == "1") {
	$display_as_tree = 0;
	$where = "block_categories_tree";
} elseif ($Conf_Multishop['mode_cats_block'] == "2") {
	$display_as_tree = 1;
	$where = "block_categories_tree";
} else {
	$display_as_tree = rand(0,1);
	($display_as_tree == 1)? $where = "block_categories_tree" : $where = "block_categories_menu";
}

$content_language = "content_" . $currentlang;
$content_default = "content_" . DEFAULT_LANGUAGE;
$content_static = $db->sql_fetchrow($result = $db->sql_query("SELECT $content_language, $content_default FROM ".$prefix."_content_static WHERE content = '".$where."'"));

if ($content_static[$content_language]) {
	$content = $content_static[$content_language];
} elseif ($content_static[$content_default]) {
	$content = $content_static[$content_default];
} else {
	$name_language = "name_" . $currentlang;
	$name_default = "name_" . DEFAULT_LANGUAGE;
	$res['0'] = $db->sql_query("SELECT cat_id, $name_language, $name_default FROM ".$prefix."_categories_products WHERE parent_id='0' ORDER BY '" . $name_language . "'");
	$content1 = "";
	$content0 = "";
	if ($db->sql_numrows($res['0'])){
		$content0 .= "<div align=\"center\"><br><form action=\"index.php\" method=\"get\">\n";
		$content0 .= "<select name=\"sel_vendor\" onChange=\"top.location.href=this.options[this.selectedIndex].value\">\n";
		$content0 .= "<option selected value =\"\"> " . _SELECT_CATEGORY . " </option>\n";
		while($r['0'] = $db->sql_fetchrow($res['0'])) { 
		    if (!$r['0'][$name_language]) {
		    	$name_category = $r['0'][$name_default];
		    } else {
		        $name_category = $r['0'][$name_language];
		    }
		    $content1 .= "<strong><big>&middot;</big></strong>&nbsp;<a href=\"modules.php?name=Categories_Products&amp;op=show_prods&amp;cat_id=" . $r['0'][cat_id]. "\">" . $name_category . "</a><br>\n";
		    $content0 .= "<option value = \"modules.php?name=Categories_Products&amp;op=show_prods&amp;cat_id=" . $r['0'][cat_id]. "\">" . $name_category . "</option>\n";
		    $sql = "SELECT cat_id, $name_language, $name_default FROM ".$prefix."_categories_products WHERE parent_id=" . $r['0']['cat_id'] . " ORDER BY '" . $name_language . "'" ;
		    $res['1'] = $db->sql_query($sql);
		    while($r['1'] = $db->sql_fetchrow($res['1'])) { 
		    	if (!$r['1'][$name_language]) {
		    	    $name_category = $r['1'][$name_default];
		    	} else {
		    	    $name_category = $r['1'][$name_language];
		    	}
		    	$content1 .= "&nbsp;&nbsp;--&gt;&nbsp;<a href=\"modules.php?name=Categories_Products&amp;op=show_prods&amp;cat_id=" . $r['1']['cat_id']. "\">" . $name_category . "</a><br>\n";
		    	$content0 .= "<option value = \"modules.php?name=Categories_Products&amp;op=show_prods&amp;cat_id=" . $r['1']['cat_id']. "\">&nbsp;--&gt;&nbsp;$name_category</option>\n";
		    	$sql = "SELECT cat_id, $name_language, $name_default FROM ".$prefix."_categories_products WHERE parent_id=" . $r['1']['cat_id'] . " ORDER BY '" . $name_language . "'" ;
		    	$res['2'] = $db->sql_query($sql);
		    	while($r['2'] = $db->sql_fetchrow($res['2'])) {
		    	    if (!$r['2'][$name_language]) {
		    	    	$name_category = $r['2'][$name_default];
		    	    } else {
		    	    	$name_category = $r['2'][$name_language];
		    	    }
		    	    $content1 .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--&gt;&nbsp;<a href=\"modules.php?name=Categories_Products&amp;op=show_prods&amp;cat_id=" . $r['2']['cat_id']. "\">" . $name_category . "</a><br>\n";
		    	    $content0 .="<option value = \"modules.php?name=Categories_Products&amp;op=show_prods&amp;cat_id=" . $r['2']['cat_id'] . "\">&nbsp;&nbsp;&nbsp;&nbsp;--&gt;&nbsp;$name_category</option>\n";
		    	    $sql = "SELECT cat_id, $name_language, $name_default FROM ".$prefix."_categories_products WHERE parent_id=" . $r['2']['cat_id'] . " ORDER BY '" . $name_language . "'" ;
		    	    $res['3'] = $db->sql_query($sql);
		    	    while($r['3'] = $db->sql_fetchrow($res['3'])) {
		    	    	if (!$r['3'][$name_language]) {
		    	    		$name_category = $r['3'][$name_default];
		    	    	} else {
		    	    		$name_category = $r['3'][$name_language];
		    	    	}
		    	    	$content1 .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--&gt;&nbsp;<a href=\"modules.php?name=Categories_Products&amp;op=show_prods&amp;cat_id=" . $r['3']['cat_id']. "\">" . $name_category . "</a><br>\n";
		    	    	$content0 .="<option value = \"modules.php?name=Categories_Products&amp;op=show_prods&amp;cat_id=" . $r['3']['cat_id'] . "\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--&gt;&nbsp;$name_category</option>\n";
		    	    }
		    	}
		    }
		}
		$content0 .= "</select></form></div>";
		if ($display_as_tree == 1 ){
			$content = $content1;
		} else {
			$content = $content0;
		}
	} else {
		$content = "<div align=\"center\"><br><font class=\"content\">"._CATEGORIES_NOT_FOUND."<br><br></font></div>";
	}
}

?>
