<?php

/**************************************************************************/
/* Php-MultiShop                                                          */
/* Copyright (c) 2003 by Piero Trono	http://php-multishop.com          */
/* based on works: Php-Nuke and osCommerce                                */
/* ============================================                           */
/*                                                                        */
/* Translation by Roberto Del Pino · fexcel (http://www.pescoland.com)    */
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
/* $Id: lang-spanish.php,v 1.1.1.1 2005/11/21 13:48:10 tropic Exp $ */

define("STORES","Tiendas");
define('SELECT_LANGUAGES', 'Selecciona solo los idiomas utilizados en los nombres de las categorias');
define('GENERATION_OF_CATEGORIES_LIST', 'Generación de la Lista de Categorias');
define('_UPDATE_CATEGORIES_LIST', 'Despues de cada cambio, hay que actualizar/generar la Lista de Categorias');
define('_GENERATE_LIST', 'Genera Lista');
define('TEXT_INFO_EDIT_INTRO', 'Haga los cambios necesarios');
define('TEXT_INFO_CURRENCY_TITLE', 'T&iacute;tulo:');
define('TEXT_INFO_CURRENCY_CODE', 'C&oacute;digo:');
define('TEXT_INFO_CURRENCY_SYMBOL_LEFT', 'S&iacute;mbolo a la izquierda:');
define('TEXT_INFO_CURRENCY_SYMBOL_RIGHT', 'S&iacute;mbolo a la derecha:');
define('TEXT_INFO_CURRENCY_DECIMAL_POINT', 'Punto decimal:');
define('TEXT_INFO_CURRENCY_THOUSANDS_POINT', 'Separador de miles:');
define('TEXT_INFO_CURRENCY_DECIMAL_PLACES', 'Lugares decimales:');
define('TEXT_INFO_CURRENCY_VALUE', 'Valor:');
define('TEXT_INFO_INSERT_INTRO', 'Introduzca los datos de la nueva moneda');
define("_ADD_CURRENCY","Nueva Moneda");
define("_ACTIONS","Acción");
define("_VALUE","Valor");
define("_CODE","Codigo");
define("_CURRENCY","Moneda");
define("_CURRENCIES","Moneda");
define("_PRODS_FOR_SHOP","Numero de Productos por cada tienda");
define("_MAX_PROD_FOR_PAGE","Numero maximo de productos por pagina");
define("_SHOW_RSS", "Incluye los 'MetaTag RSS' para los browsers");
define("_SET_TYPE", "Tipo de Tienda");
define("_TYPE_ACTIVE", "ACTIVO");
define("_TYPE_INACTIVE", "INACTIVO");
define("_TYPE_EXTERNAL", "EXTERIOR");
define("_REVIEWS","Reviews");
define("_ENABLE_TO_SHOW", "<b>Por esta tienda muestra:</b>");
define("_ENABLE_NOTICE", "Nota: si el " . _SET_TYPE . " esta puesto come <i>" . _TYPE_INACTIVE . "</i><br>todas las opciones seran borradas");
define("_SPECIALS", "Ofertas");
define("_BEST", "Mas Vendidos");
define("_VENDORS", "Tiendas");
define("_SHOW_SHOPS_IN_HOME","muestra las tiendas in news page");
define("_NUM_HOME_PRODS","numero maximo de productos en la pagina Home");
define("_NUM_HOME_NEWS","numero de noticias en la pagina Home (de noticias)");
define("_INCLUDE_TAX_RATE","incluye la tasa en los precios de los roductos");
define("_SHOW_TAX_RATE","muestra la tasa en %");
define("_DELETE_ORDERS_SHOP","<font color=\"red\"><b>Warning</b></font>: con esta operacion vas a borrar todo sobre este usiario, incluso direcciones, pedidos en cada tienda, etc... ");
define("DESCRIPTION_SHOP","Descripción de la Tienda");
define("DESCRIPTION_PRODUCTION","Detalles sobre Nuestra Producción");
define("_INFORMATION_FOR_SHOPPING","Informaciones para las Tiendas");
define("_LAST_NAME","Apellido");
define("_TELEPHONE","Telefono");
define("_MULTISHOP","Multi-Shop");
define("_CONFIG","Configura");
define("_NUM_MIN","numero minimo de caracteres para Prefix y Tiendas");
define("_NUM_MIN_CAT","numero minimo de caracteres para el default del nombre de las Categoria");
define("_NUM_PROD_HOME","numero productos por cada tienda");
define("_NUM_PROD_FOR_LINE","numero productos por cada linea");
define("_NUM_PROD_TOTAL","numero productos totales");
define("_CONFIG_UPDATED","Configuración Modificada");
define("_LISTVENDORS","Tiendas");
define("_NOTVENDORS","No hay Tiendas");
define("_NOT_VENDOR_SELECTED","No has seleccionado una Tienda");
define("_VENDORS_PREFIX","Prefix");
define("_VENDORS_NAME","Nombre");
define("_VENDORS_HOST","Url-Catalog");
define("_NOTE_URL","archivo de default del Catalogo, ej.: www.myshop.com/index.php, www.myshop.com/catalog/default.php");
define("_EDIT_VENDOR","Modifica Tienda");
define("_VENDOR_UPDATED","Tienda Modificada");
define("_WARNING_DELETE","Estas seguro de eliminar");
define("_WARNING_HAVE_CHILD","Error: esta categoria tiene sub-categorias");
define("_ALL_CATEGORIES","Categorias");
define("_ADDED_CATEGORY","Categoria agregada:");
define("_CATEGORY_DELETED","Categoria Eliminada:");
define("_NOT_CATEGORY_SELECTED","No has seleccionado una Categoria");
define("_MOTHER_CATEGORY","Categoria Superiore");
define("_NOTE_MOTHER_CATEGORY","Si es un Categoria Principal no seleccionar nada");
define("_CATEGORY_UPDATED","Categoria Modificada");
define("_VENDOR_DELETED","Tienda Eliminada");
define("_SHOW_SHOPS","Tiendas");
define("_ASSIGN_CATEGORY","Asiña Categoria");
define("_CATEGORY_ASSIGNED","Categoria Asiñada");
define("_ALREADY_ASSIGNED","Categoria ya asiñada a esta Tienda");
define("_NOTE_MOTHER_CATEGORY","Si es un Categoria Superior no seleccionar nada");
define("_ADDVENDOR","Agregar una Tienda");
define("_SUBMIT_ADD","Agrega la Tienda");
define("_ADDED_VENDOR","Tienda añadida");
define("_ERROR_LENGHT","Los seguientes campos no tienen la longitud necesaria");
define("_ERROR_HOST","El Url non tiene el formado demandado");
define("_FORMAT_HOST","sin incluír <b>http://</b>");
define("_CATEGORIES_PRODUCTS","Categorias de Productos");
define("_NOTE_CPATH","Esta variabile opcional permite el link a una especifica categoria de la tienda");
define("_PATH_LOGO","Logo");
define("_SHOP_ADDRESS","Direccion, Tel ...");
define("_PATH_IMAGE_SHOP","Imagine Empresa");
define("_DESCR_SHOP_ENGLISH","Descripción en ingles");
define("_DESCR_SHOP_ITALIAN","Descripción en italiano");
define("_DESCR_SHOP_SPANISH","Descripción en español");
define("_PATH_IMAGE_PRODUCT","Imagine producción");
define("_DESCR_PRODUCTION_ENGLISH","Producción en ingles");
define("_DESCR_PRODUCTION_ITALIAN","Producción en italiano");
define("_DESCR_PRODUCTION_SPANISH","Producción en español");
define("_WIDHT_LOGO","Largura Logo");
define("_WIDHT_IMAGE_SHOP","Largura Imagine Sede Tienda");
define("_WIDHT_IMAGE_PRODUCTION","Largura Imagine Produción");

?>
