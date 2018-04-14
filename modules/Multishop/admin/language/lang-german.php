<?php

/**************************************************************************/
/* Php-MultiShop                                                          */
/* Copyright (c) 2003 by Piero Trono	http://php-multishop.com          */
/* based on works: Php-Nuke and osCommerce                                */
/*                                                                        */
/* Translation in German by Hietzker Christian http://www.hietzker.at	  */
/* ==================================================================     */
/*                                                                        */
/* This is the language module with all the system messages               */
/*                                                                        */
/* If you made a translation, please go to the site and send to me        */
/* the translated file. Please keep the original text order by modules,   */
/* and just one message per line, also double check your translation!     */
/*                                                                        */
/* You need to change the second quoted phrase, not the capital one!      */
/*                                                                        */
/* If you need to use double quotes (") remember to add a backslash (\),  */
/* so your entry will look like: This is \"double quoted\" text.          */
/* And, if you use HTML code, please double check it.                     */
/**************************************************************************/
/* $Id: lang-german.php,v 1.1.1.1 2005/11/21 13:48:10 tropic Exp $ */

define("STORES","Shops");
define('SELECT_LANGUAGES', 'Please, select just the used languages in the categories name');
define('GENERATION_OF_CATEGORIES_LIST', 'Generation of Categories List');
define('_UPDATE_CATEGORIES_LIST', 'After any change on the Categories, remember to regenerate the categories list');
define('_GENERATE_LIST', 'Generate List');
define('TEXT_INFO_EDIT_INTRO', 'Bitte f&uuml;hren Sie alle notwendigen &Auml;nderungen durch');
define('TEXT_INFO_CURRENCY_TITLE', 'Name:');
define('TEXT_INFO_CURRENCY_CODE', 'K&uuml;rzel:');
define('TEXT_INFO_CURRENCY_SYMBOL_LEFT', 'Symbol Links:');
define('TEXT_INFO_CURRENCY_SYMBOL_RIGHT', 'Symbol Rechts:');
define('TEXT_INFO_CURRENCY_DECIMAL_POINT', 'Dezimalkomma:');
define('TEXT_INFO_CURRENCY_THOUSANDS_POINT', 'Tausenderpunkt:');
define('TEXT_INFO_CURRENCY_DECIMAL_PLACES', 'Dezimalstellen:');
define('TEXT_INFO_CURRENCY_VALUE', 'Wert:');
define('TEXT_INFO_INSERT_INTRO', 'Bitte geben Sie die neue W&auml;hrung mit allen relevanten Daten ein');
define("_ADD_CURRENCY","neue W&auml;hrung");
define("_ACTIONS","Aktion");
define("_VALUE","Wert");
define("_CODE","K&uuml;rzel");
define("_CURRENCY","W&auml;hrung");
define("_CURRENCIES","Währung");
define("_PRODS_FOR_SHOP","Num Prods from each shop");
define("_MAX_PROD_FOR_PAGE","Num max of Prods for page");
define("_SHOW_RSS", "Include RSS MetaTag for the browsers");
define("_SET_TYPE", "Type of Shop");
define("_TYPE_ACTIVE", "ACTIVE");
define("_TYPE_INACTIVE", "INACTIVE");
define("_TYPE_EXTERNAL", "EXTERNAL");
define("_REVIEWS","Reviews");
define("_ENABLE_TO_SHOW", "<b>Enable this Shop to show:</b>");
define("_ENABLE_NOTICE", "Note: if " . _SET_TYPE . " is set as <i>" . _TYPE_INACTIVE . "</i><br>all the options will be disabled");
define("_SPECIALS", "Specials");
define("_BEST", "Best Products");
define("_SHOW_SHOPS_IN_HOME","Show the shops in news page");
define("_NUM_HOME_PRODS","num products displayed in news page");
define("_NUM_HOME_NEWS","num news in news page with products");
define("_INCLUDE_TAX_RATE","include the tax rate in the products price");
define("_SHOW_TAX_RATE","show the value of tax rate in %");
define("_DELETE_ORDERS_SHOP","<font color=\"red\"><b>Warning</b></font>: this function will delete anythink for every shop, as orders, address book, customers basket, ...");
define("DESCRIPTION_SHOP","Beschreibung Geschäft");
define("DESCRIPTION_PRODUCTION","Detail Produktion");
define("_INFORMATION_FOR_SHOPPING","Informationen über die Shops");
define("_LAST_NAME","Nachnahem");
define("_TELEPHONE","Telefon");
define("_MULTISHOP","Multi-Shop");
define("_CONFIG","Konfiguration");
define("_NUM_MIN","Minimum für das Prefix und den Namen des Shops");
define("_NUM_MIN_CAT","Minimum an Buchstaben für die Kategorien");
define("_NUM_PROD_HOME","Anzahl der Produkte für den Shop");
define("_NUM_PROD_FOR_LINE","Anzahl der Produkte in einer Reihe");
define("_NUM_PROD_TOTAL","Anzahl der Produkte total");
define("_CONFIG_UPDATED","Konfiguartion geändert");
define("_LISTVENDORS","Aktive Shops");
define("_NOTVENDORS","Inaktive Shops");
define("_NOT_VENDOR_SELECTED","Keinen Shop ausgewählt");
define("_VENDORS_PREFIX","Prefix");
define("_VENDORS_NAME","Name");
define("_VENDORS_HOST","Url-Catalog");
define("_NOTE_URL","default file of Catalog, e.g.: www.myshop.com/index.php, www.myshop.com/catalog/default.php");
define("_EDIT_VENDOR","Shop bearbeiten");
define("_VENDOR_UPDATED","Shop bearbeitet");
define("_WARNING_DELETE","Sind sie sicher das sie abbrechen wollen?");
define("_WARNING_HAVE_CHILD","Error: Diese Kategorie hat Unterkategorien");
define("_ADDED_CATEGORY","Kategorie eingefügt:");
define("_CATEGORY_DELETED","Kategorie gelöscht:");
define("_ALL_CATEGORIES","Kategorien");
define("_NOT_CATEGORY_SELECTED","Keine Kategorie ausgewählt");
define("_MOTHER_CATEGORY","Hauptkategorie");
define("_NOTE_MOTHER_CATEGORY","Nicht auswählen wenn es eine Hauptkategorie ist");
define("_CATEGORY_UPDATED","Kategorie geändert");
define("_VENDOR_DELETED","Shop gelöscht");
define("_SHOW_SHOPS","Shops");
define("_ASSIGN_CATEGORY","Kategorie zuweisen");
define("_CATEGORY_ASSIGNED","Kategorie zugewiesen");
define("_ALREADY_ASSIGNED","Kategorei ist bereits diesem Shop zugewiesen");
define("_ADDVENDOR","Einen Shop hinzufügen");
define("_SUBMIT_ADD","Shop hinzufügen");
define("_ADDED_VENDOR","Shop hinzugefügt");
define("_ERROR_LENGHT","Die folgenden Felder haben nicht die entsprechende Länge");
define("_ERROR_HOST","Die Url hat nicht das vorgschriebene Format");
define("_FORMAT_HOST","ohne <b>http://</b>");
define("_CATEGORIES_PRODUCTS","Kategorien");
define("_NOTE_CPATH","Hier können sie eine spezille Kategorie eines Shops verlinken");
define("_PATH_LOGO","Logo");
define("_SHOP_ADDRESS","Address, Tel. ...");
define("_PATH_IMAGE_SHOP","Firmenlogo");
define("_DESCR_SHOP_ENGLISH","Beschreibung in Englisch");
define("_DESCR_SHOP_ITALIAN","Beschreibung in Intalienisch");
define("_DESCR_SHOP_SPANISH","Beschreibung in Spanisch ");
define("_DESCR_SHOP_GERMAN","Beschreibung in German ");
define("_PATH_IMAGE_PRODUCT","Image production");
define("_DESCR_PRODUCTION_ENGLISH","Hersteller in Englisch");
define("_DESCR_PRODUCTION_ITALIAN","Hersteller in Italienisch");
define("_DESCR_PRODUCTION_SPANISH","Hersteller in Spanisch");
define("_DESCR_PRODUCTION_GERMAN","Hersteller in German");
define("_WIDHT_LOGO","Breite des Logos");
define("_WIDHT_IMAGE_SHOP","Breite des Shop Logos");
define("_WIDHT_IMAGE_PRODUCTION","Breite Hersteller Bild");


?>
