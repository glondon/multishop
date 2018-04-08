<?php
/*
  $Id: application_top.php,v 1.2 2005/11/22 15:19:51 tropic Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com
  Copyright (c) 2003 osCommerce
  
  [changed for Php-MultiShop (c) 2003-2005 by Piero Trono]

  Released under the GNU General Public License
*/
/**************************************************************************/
/* Multi-Shop: Content Management e-Commerce                              */
/* Copyright (c) 2003-2005 by Piero Trono                                 */
/* based on works: Php-Nuke and osCommerce                                */
/**************************************************************************/

// Start the clock for the page parse time log
  define('PAGE_PARSE_START_TIME', microtime());

// define the database tables names used in the portal-side
  define('TABLE_ADDRESS_BOOK', 'address_book');
  define('TABLE_ADDRESS_FORMAT', 'address_format');
  define('TABLE_COUNTRIES', 'countries');
  define('TABLE_CURRENCIES', 'currencies');
  define('TABLE_CUSTOMERS', 'customers');
  define('TABLE_PRODUCTS', 'products');
  define('TABLE_PRODUCTS_TO_CATEGORIES', 'products_to_categories');
  define('TABLE_PRODUCTS_DESCRIPTION', 'products_description');
  define('TABLE_REVIEWS', 'reviews');
  define('TABLE_REVIEWS_DESCRIPTION', 'reviews_description');
  define('TABLE_SPECIALS', 'specials');
  define('TABLE_TAX_CLASS', 'tax_class');
  define('TABLE_TAX_RATES', 'tax_rates');
  define('TABLE_GEO_ZONES', 'geo_zones');
  define('TABLE_ZONES_TO_GEO_ZONES', 'zones_to_geo_zones');
  define('TABLE_ZONES', 'zones');

// customization for the design layout
  define('TAX_DECIMAL_PLACES', 0); // Pad the tax value this amount of decimal places
  define('DISPLAY_PRICE_WITH_TAX', true); // Display prices with tax (true) or without tax (false)
  define('BOX_WIDTH', 125); // how wide the boxes should be in pixels (default: 125)

// Control what fields of the customer table are used
  define('ACCOUNT_GENDER', 'true');
  define('ACCOUNT_DOB', 'true');
  define('ACCOUNT_COMPANY', 'true');
  define('ACCOUNT_SUBURB', 'true');
  define('ACCOUNT_STATE', 'true');

// include de functions for multishop
  require(DIR_WS_INCLUDES . 'multishop_functions.php');

// include the database functions
  require(DIR_WS_INCLUDES . 'database.php');

// include currencies class and create an instance
  require(DIR_WS_INCLUDES . 'currencies.php');
  $currencies = new currencies();

if (isset($newlang) AND !eregi("\.","$newlang")) {
	$language = $newlang;
}elseif (isset($lang)) {
	$language = $lang;
} else {
	$language = DEFAULT_LANGUAGE;
}

// include the language translations
if (file_exists(DIR_WS_LANGUAGES . "$language.php")) {
	require(DIR_WS_INCLUDES . 'languages/' . "$language.php");
} else {
	require(DIR_WS_INCLUDES . 'languages/' . DEFAULT_LANGUAGE .'.php');
}

// define our general functions used application-wide
  require(DIR_WS_INCLUDES . 'general.php');
  require(DIR_WS_INCLUDES . 'html_output.php');

// Include validation functions (right now only email address)
  require(DIR_WS_INCLUDES . 'validations.php');

?>