<?php
/*
  $Id: database_tables.php,v 1.4 2005/11/23 10:41:00 tropic Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Changed by Piero Trono (c) 2005 for http://php-multishop.com

  Released under the GNU General Public License
*/

  define('PREFIX_DB_NUKE', 'nuke');

//Admin begin
  define('TABLE_ADMIN', STORE_PREFIX .'_admin');
  define('TABLE_ADMIN_FILES', STORE_PREFIX .'_admin_files');
  define('TABLE_ADMIN_GROUPS', STORE_PREFIX .'_admin_groups');
//Admin end

// define the database table names used in the project
  define('TABLE_ADDRESS_BOOK', 'address_book');
  define('TABLE_ADDRESS_FORMAT', STORE_PREFIX .'_address_format');
  define('TABLE_BANNERS', STORE_PREFIX .'_banners');
  define('TABLE_BANNERS_HISTORY', STORE_PREFIX .'_banners_history');
  define('TABLE_CATEGORIES', STORE_PREFIX .'_categories');
  define('TABLE_CATEGORIES_DESCRIPTION', STORE_PREFIX .'_categories_description');
  define('TABLE_CONFIGURATION', STORE_PREFIX .'_configuration');
  define('TABLE_CONFIGURATION_GROUP', STORE_PREFIX .'_configuration_group');
  define('TABLE_COUNTRIES', 'countries');
  define('TABLE_CURRENCIES', 'currencies');
  define('TABLE_CUSTOMERS', 'customers');
  define('TABLE_CUSTOMERS_BASKET', STORE_PREFIX .'_customers_basket');
  define('TABLE_CUSTOMERS_BASKET_ATTRIBUTES', STORE_PREFIX .'_customers_basket_attributes');
  define('TABLE_CUSTOMERS_INFO', 'customers_info');
  define('TABLE_LANGUAGES', STORE_PREFIX .'_languages');
  define('TABLE_MANUFACTURERS', STORE_PREFIX .'_manufacturers');
  define('TABLE_MANUFACTURERS_INFO', STORE_PREFIX .'_manufacturers_info');
  define('TABLE_NEWSLETTERS', STORE_PREFIX .'_newsletters');
  define('TABLE_ORDERS', STORE_PREFIX .'_orders');
  define('TABLE_ORDERS_PRODUCTS', STORE_PREFIX .'_orders_products');
  define('TABLE_ORDERS_PRODUCTS_ATTRIBUTES', STORE_PREFIX .'_orders_products_attributes');
  define('TABLE_ORDERS_PRODUCTS_DOWNLOAD', STORE_PREFIX .'_orders_products_download');
  define('TABLE_ORDERS_STATUS', STORE_PREFIX .'_orders_status');
  define('TABLE_ORDERS_STATUS_HISTORY', STORE_PREFIX .'_orders_status_history');
  define('TABLE_ORDERS_TOTAL', STORE_PREFIX .'_orders_total');
  define('TABLE_PRODUCTS', STORE_PREFIX .'_products');
  define('TABLE_PRODUCTS_ATTRIBUTES', STORE_PREFIX .'_products_attributes');
  define('TABLE_PRODUCTS_ATTRIBUTES_DOWNLOAD', STORE_PREFIX .'_products_attributes_download');
  define('TABLE_PRODUCTS_DESCRIPTION', STORE_PREFIX .'_products_description');
  define('TABLE_PRODUCTS_NOTIFICATIONS', STORE_PREFIX .'_products_notifications');
  define('TABLE_PRODUCTS_OPTIONS', STORE_PREFIX .'_products_options');
  define('TABLE_PRODUCTS_OPTIONS_VALUES', STORE_PREFIX .'_products_options_values');
  define('TABLE_PRODUCTS_OPTIONS_VALUES_TO_PRODUCTS_OPTIONS', STORE_PREFIX .'_products_options_values_to_products_options');
  define('TABLE_PRODUCTS_TO_CATEGORIES', STORE_PREFIX .'_products_to_categories');
  define('TABLE_REVIEWS', STORE_PREFIX .'_reviews');
  define('TABLE_REVIEWS_DESCRIPTION', STORE_PREFIX .'_reviews_description');
  define('TABLE_SESSIONS', STORE_PREFIX .'_sessions');
  define('TABLE_SPECIALS', STORE_PREFIX .'_specials');
  define('TABLE_TAX_CLASS', STORE_PREFIX .'_tax_class');
  define('TABLE_TAX_RATES', STORE_PREFIX .'_tax_rates');
  define('TABLE_GEO_ZONES', STORE_PREFIX .'_geo_zones');
  define('TABLE_ZONES_TO_GEO_ZONES', STORE_PREFIX .'_zones_to_geo_zones');
  define('TABLE_WHOS_ONLINE', STORE_PREFIX .'_whos_online');
  define('TABLE_ZONES', 'zones');
?>
