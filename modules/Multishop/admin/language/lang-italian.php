<?php

/**************************************************************************/
/* Php-MultiShop                                                          */
/* Copyright (c) 2003 by Piero Trono	http://php-multishop.com          */
/* based on works: Php-Nuke and osCommerce                                */
/* ========================================                               */
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
/* $Id: lang-italian.php,v 1.1.1.1 2005/11/21 13:48:10 tropic Exp $ */

define("STORES","Negozi");
define('SELECT_LANGUAGES', 'Seleziona solo le lingue utilizzate nei nomi delle categorie');
define('GENERATION_OF_CATEGORIES_LIST', 'Generazione della Lista delle Categorie');
define('_UPDATE_CATEGORIES_LIST', 'Dopo ogni modifica delle Categorie, occorre rigenerare la Lista');
define('_GENERATE_LIST', 'Genera la Lista');
define('TEXT_INFO_EDIT_INTRO', 'Effettua i cambiamenti necessari');
define('TEXT_INFO_CURRENCY_TITLE', 'Titolo:');
define('TEXT_INFO_CURRENCY_CODE', 'Codice:');
define('TEXT_INFO_CURRENCY_SYMBOL_LEFT', 'Simbolo a sinistra:');
define('TEXT_INFO_CURRENCY_SYMBOL_RIGHT', 'Simbolo a destra:');
define('TEXT_INFO_CURRENCY_DECIMAL_POINT', 'Punto dei Decimi:');
define('TEXT_INFO_CURRENCY_THOUSANDS_POINT', 'Punto delle migliaia:');
define('TEXT_INFO_CURRENCY_DECIMAL_PLACES', 'Posizioni Decimali:');
define('TEXT_INFO_CURRENCY_VALUE', 'Valore:');
define('TEXT_INFO_INSERT_INTRO', 'Immetti la nuova Valuta con i dati necessari');
define("_ADD_CURRENCY","Aggiungi Valuta");
define("_ACTIONS","Azione");
define("_VALUE","Valore");
define("_CODE","Codice");
define("_CURRENCY","Valuta");
define("_CURRENCIES","Valute");
define("_PRODS_FOR_SHOP","Numero di Prodotti da ogni tienda");
define("_MAX_PROD_FOR_PAGE","Numero max di Prodotti per pagina");
define("_SHOW_RSS", "Include RSS MetaTag per i browsers");
define("_SET_TYPE", "Tipo di Negozio");
define("_TYPE_ACTIVE", "ATTIVO");
define("_TYPE_INACTIVE", "INATTIVO");
define("_TYPE_EXTERNAL", "ESTERNO");
define("_REVIEWS","Recensioni");
define("_ENABLE_TO_SHOW", "<b>Abilita il negozio a mostrare:</b>");
define("_ENABLE_NOTICE", "Nota: se il " . _SET_TYPE . " è impostato come <i>" . _TYPE_INACTIVE . "</i><br>tutte le opzioni saranno disattivate");
define("_SPECIALS", "Offerte");
define("_BEST", "Più Venduti");
define("_SHOW_SHOPS_IN_HOME","Mostra i negozi nell'home page delle News");
define("_NUM_HOME_PRODS","numero prodotti in home page con le notizie");
define("_NUM_HOME_NEWS","numero notizie insieme ai prodotti");
define("_INCLUDE_TAX_RATE","include l'iva nel prezzo dei prodotti");
define("_SHOW_TAX_RATE","mostra il valore della tassa in %");
define("_DELETE_ORDERS_SHOP","<font color=\"red\"><b>Warning</b></font>: con questa operazione cancellerai tutte le informazioni su questo utente, come gli indirizzi, gli ordini effetuati in ogni negozio, ecc... ");
define("DESCRIPTION_SHOP","Descrizione del Negozio");
define("DESCRIPTION_PRODUCTION","Dettagli sulla Nostra Produzione");
define("_INFORMATION_FOR_SHOPPING","Informazioni per i Negozi");
define("_LAST_NAME","Cognome");
define("_TELEPHONE","Telefono");
define("_MULTISHOP","Multi-Shop");
define("_CONFIG","Configura");
define("_NUM_MIN","numero minimo di caratteri per Prefix e Nome dei Negozi");
define("_NUM_MIN_CAT","numero minimo di caratteri per il nome di default delle Categorie");
define("_NUM_PROD_HOME","numero prodotti per ogni negozio");
define("_NUM_PROD_FOR_LINE","numero prodotti visualizzati per ogni riga");
define("_NUM_PROD_TOTAL","numero prodotti totali");
define("_CONFIG_UPDATED","Configurazione Aggiornata");
define("_LISTVENDORS","Negozi Presenti");
define("_NOTVENDORS","Non ci sono Negozi presenti");
define("_NOT_VENDOR_SELECTED","Non hai selezionato un Negozio");
define("_VENDORS_PREFIX","Prefix");
define("_VENDORS_NAME","Nome");
define("_VENDORS_HOST","Url-Catalog");
define("_NOTE_URL","file di default del Catalogo, es.: www.myshop.com/index.php, www.myshop.com/catalog/default.php");
define("_EDIT_VENDOR","Modifica Negozio");
define("_VENDOR_UPDATED","Negozio Aggiornato");
define("_WARNING_DELETE","Sei sicuro di voler cancellare");
define("_WARNING_HAVE_CHILD","Errore: questa categoria ha delle sottocategorie");
define("_ALL_CATEGORIES","Tutte le Categorie");
define("_ADDED_CATEGORY","Categoria inserita:");
define("_CATEGORY_DELETED","Categoria eliminata:");
define("_NOT_CATEGORY_SELECTED","Non hai selezionato una Categoria");
define("_MOTHER_CATEGORY","Categoria Superiore");
define("_NOTE_MOTHER_CATEGORY","Se  è una Categoria Principale non selezionare nulla");
define("_CATEGORY_UPDATED","Categoria Modificata");
define("_VENDOR_DELETED","Negozio Eliminato");
define("_SHOW_SHOPS","Negozi");
define("_ASSIGN_CATEGORY","Assegna Categoria");
define("_CATEGORY_ASSIGNED","Categoria Assegnata");
define("_ALREADY_ASSIGNED","Categoria già assegnata a questo Negozio");
define("_ADDVENDOR","Aggiungi un Negozio");
define("_SUBMIT_ADD","Aggiungi Negozio");
define("_ADDED_VENDOR","Negozio Aggiunto");
define("_ERROR_LENGHT","I seguenti campi non hanno la lunghezze richiesta");
define("_ERROR_HOST","L'Url non ha il formato richiesto");
define("_FORMAT_HOST","non includere <b>http://</b>");
define("_CATEGORIES_PRODUCTS","Categorie dei Prodotti");
define("_NOTE_CPATH","Questa variabile opzionale permette di linkare ad una categoria specifica del negozio");
define("_PATH_LOGO","Logo");
define("_SHOP_ADDRESS","Indirizzo, Tel ...");
define("_PATH_IMAGE_SHOP","Immagine Azienda");
define("_DESCR_SHOP_ENGLISH","Descrizione in inglese");
define("_DESCR_SHOP_ITALIAN","Descrizione in italiano");
define("_DESCR_SHOP_SPANISH","Descrizione in spagnolo");
define("_PATH_IMAGE_PRODUCT","Immagine produzione");
define("_DESCR_PRODUCTION_ENGLISH","Produzione in inglese");
define("_DESCR_PRODUCTION_ITALIAN","Produzione in italiano");
define("_DESCR_PRODUCTION_SPANISH","Produzione in spagnolo");
define("_WIDHT_LOGO","Larghezza Logo");
define("_WIDHT_IMAGE_SHOP","Larghezza Immagine Sede Negozio");
define("_WIDHT_IMAGE_PRODUCTION","Larghezza Immagine  Produzione");

?>
