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
/* $Id: case.php,v 1.1.1.1 2005/11/21 13:48:07 tropic Exp $ */

if ( !defined('ADMIN_FILE') )
{
	die("Illegal File Access");
}
$module_name = "Multishop";
include_once("modules/$module_name/admin/language/lang-".$currentlang.".php");

switch($op) {

    case "generate_list":
    case "form_list":
    case "default_curr":
    case "add_curr":
    case "del_curr":
    case "insert_curr":
    case "save_curr":
    case "edit_curr":
    case "currencies":
    case "multishop":
    case "list_cat":
    case "show_shops":
    case "edit_cat":
    case "cat_vend_del":
    case "assign_cat_vend":
    case "update_cat":
    case "add_cat":
    case "delete_cat":
    case "shops":
    case "addvendor":
    case "config":
    case "update_config":
    case "edit":
    case "delete":
    case "update":
    include("modules/$module_name/admin/index.php");
    break;

}

?>