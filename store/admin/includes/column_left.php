<?php
/*
  $Id: column_left.php,v 1.1 2005/11/23 11:09:05 tropic Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

//Admin begin
//  require(DIR_WS_BOXES . 'configuration.php');
//  require(DIR_WS_BOXES . 'catalog.php');
//  require(DIR_WS_BOXES . 'modules.php');
//  require(DIR_WS_BOXES . 'customers.php');
//  require(DIR_WS_BOXES . 'taxes.php');
//  require(DIR_WS_BOXES . 'localization.php');
//  require(DIR_WS_BOXES . 'reports.php');
//  require(DIR_WS_BOXES . 'tools.php');

  if (tep_admin_check_boxes('administrator.php') == true) {
    require(DIR_WS_BOXES . 'administrator.php');
  } 
  if (tep_admin_check_boxes('configuration.php') == true) {
    require(DIR_WS_BOXES . 'configuration.php');
  } 
  if (tep_admin_check_boxes('catalog.php') == true) {
    require(DIR_WS_BOXES . 'catalog.php');
  } 
  if (tep_admin_check_boxes('modules.php') == true) {
    require(DIR_WS_BOXES . 'modules.php');
  } 
  if (tep_admin_check_boxes('customers.php') == true) {
    require(DIR_WS_BOXES . 'customers.php');
  } 
  if (tep_admin_check_boxes('taxes.php') == true) {
    require(DIR_WS_BOXES . 'taxes.php');
  } 
  if (tep_admin_check_boxes('localization.php') == true) {
    require(DIR_WS_BOXES . 'localization.php');
  } 
  if (tep_admin_check_boxes('reports.php') == true) {
    require(DIR_WS_BOXES . 'reports.php');
  } 
  if (tep_admin_check_boxes('tools.php') == true) {
    require(DIR_WS_BOXES . 'tools.php');
  }
//Admin end
?>
