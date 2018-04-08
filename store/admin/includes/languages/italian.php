<?php
/*
  $Id: italian.php,v 1.5 2005/11/22 22:53:52 tropic Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Changed by Piero Trono (c) 2005 for http://php-multishop.com

  Released under the GNU General Public License

*/
/*
	Traduzione Italiana ripresa rielaborata
	e corretta da Tarantino Agostino agotar@tin.it 
	Tricase Lecce Italy 31/05/2002 00.03.14
	Rilasciata sotto GNU General Public License
	
	Traduzione rivista e corretta da Angelo Gagliani per MS2
	capra at openitalia dot net 07/08/2003
*/

//Admin begin (by Piero Trono)
// header text in includes/header.php
define('HEADER_TITLE_ACCOUNT', 'Il mio Account');
define('HEADER_TITLE_LOGOFF', 'Logoff');

// Admin Account
define('BOX_HEADING_MY_ACCOUNT', 'Il mio Account');

// configuration box text in includes/boxes/administrator.php
define('BOX_HEADING_ADMINISTRATOR', 'Administrator');
define('BOX_ADMINISTRATOR_MEMBERS', 'Member Groups');
define('BOX_ADMINISTRATOR_MEMBER', 'Members');
define('BOX_ADMINISTRATOR_BOXES', 'File Access');

// images
define('IMAGE_FILE_PERMISSION', 'Permessi File');
define('IMAGE_GROUPS', 'Elenco Gruppi');
define('IMAGE_INSERT_FILE', 'Inserisci File');
define('IMAGE_MEMBERS', 'Elenco Membri');
define('IMAGE_NEW_GROUP', 'Nuovo Gruppo');
define('IMAGE_NEW_MEMBER', 'Nouvo Membro');
define('IMAGE_NEXT', 'Next');

// constants for use in tep_prev_next_display function
define('TEXT_DISPLAY_NUMBER_OF_FILENAMES', 'Displaying <b>%d</b> to <b>%d</b> (of <b>%d</b> filenames)');
define('TEXT_DISPLAY_NUMBER_OF_MEMBERS', 'Displaying <b>%d</b> to <b>%d</b> (of <b>%d</b> members)');
//Admin end

// look in your $PATH_LOCALE/locale directory for available locales..
// on RedHat6.0 I used 'en_US'
// on FreeBSD 4.0 I use 'en_US.ISO_8859-1'
// this may not work under win32 environments..
setlocale(LC_TIME, 'it_IT.ISO_8859-1');
define('DATE_FORMAT_SHORT', '%d/%m/%Y');  // this is used for strftime()
define('DATE_FORMAT_LONG', '%A %d %B, %Y'); // esempio: venerdi 31 dicembre 2002(this is used for strftime) ()
define('DATE_FORMAT', 'd/m/Y'); // this is used for date()
define('PHP_DATE_TIME_FORMAT', 'd/m/Y H:i:s'); // this is used for date()
define('DATE_TIME_FORMAT', DATE_FORMAT_SHORT . ' %H:%M:%S');

////
// Return date in raw format
// $date should be in format mm/dd/yyyy
// raw date is in format YYYYMMDD, or DDMMYYYY
function tep_date_raw($date, $reverse = false) {
  if ($reverse) {
    return substr($date, 3, 2) . substr($date, 0, 2) . substr($date, 6, 4);
  } else {
    return substr($date, 6, 4) . substr($date, 0, 2) . substr($date, 3, 2);
  }
}

// Global entries for the <html> tag
define('HTML_PARAMS','dir="ltr" lang="it"');

// charset for web pages and emails
define('CHARSET', 'iso-8859-1');

// page title
define('TITLE', 'store-side Php-MultiShop');

// header text in includes/header.php
define('HEADER_TITLE_TOP', 'Amministrazione');
define('HEADER_TITLE_SUPPORT_SITE', 'Sito di supporto');
define('HEADER_TITLE_ONLINE_CATALOG', 'Catalogo Online');
define('HEADER_TITLE_ADMINISTRATION', 'Amministrazione');

// text for gender
define('MALE', 'Uomo');
define('FEMALE', 'Donna');

// text for date of birth example
define('DOB_FORMAT_STRING', 'dd/mm/yyyy');

// configuration box text in includes/boxes/configuration.php
define('BOX_HEADING_CONFIGURATION', 'Configurazione');
define('BOX_CONFIGURATION_MYSTORE', 'Il Mio Negozio');
define('BOX_CONFIGURATION_LOGGING', 'File Log');
define('BOX_CONFIGURATION_CACHE', 'Cache');

// modules box text in includes/boxes/modules.php
define('BOX_HEADING_MODULES', 'Moduli');
define('BOX_MODULES_PAYMENT', 'Pagamenti');
define('BOX_MODULES_SHIPPING', 'Spedizioni');
define('BOX_MODULES_ORDER_TOTAL', 'Totale Ordine');

// categories box text in includes/boxes/catalog.php
define('BOX_HEADING_CATALOG', 'Catalogo');
define('BOX_CATALOG_CATEGORIES_PRODUCTS', 'Categorie/Prodotti');
define('BOX_CATALOG_CATEGORIES_PRODUCTS_ATTRIBUTES', 'Attributi Prodotti');
define('BOX_CATALOG_MANUFACTURERS', 'Produttori');
define('BOX_CATALOG_REVIEWS', 'Commenti');
define('BOX_CATALOG_SPECIALS', 'Offerte Speciali');
define('BOX_CATALOG_PRODUCTS_EXPECTED', 'Prodotti in attesa');

// customers box text in includes/boxes/customers.php
define('BOX_HEADING_CUSTOMERS', 'Clienti');
define('BOX_CUSTOMERS_CUSTOMERS', 'Clienti');
define('BOX_CUSTOMERS_ORDERS', 'Ordini');

// taxes box text in includes/boxes/taxes.php
define('BOX_HEADING_LOCATION_AND_TAXES', 'Localizzazione/Tasse');
define('BOX_TAXES_COUNTRIES', 'Nazioni');
define('BOX_TAXES_ZONES', 'Zone');
define('BOX_TAXES_GEO_ZONES', 'Zone di Tassa');
define('BOX_TAXES_TAX_CLASSES', 'Classe di Tassa');
define('BOX_TAXES_TAX_RATES', 'Percentuale di Tassa');

// reports box text in includes/boxes/reports.php
define('BOX_HEADING_REPORTS', 'Reports');
define('BOX_REPORTS_PRODUCTS_VIEWED', 'Prodotti visti');
define('BOX_REPORTS_PRODUCTS_PURCHASED', 'Prodotti acquistati');
define('BOX_REPORTS_ORDERS_TOTAL', 'Totale Ordini Cliente');

// tools text in includes/boxes/tools.php
define('BOX_HEADING_TOOLS', 'Strumenti');
define('BOX_TOOLS_BACKUP', 'Backup Database');
define('BOX_TOOLS_BANNER_MANAGER', 'Gestione Banner');
define('BOX_TOOLS_CACHE', 'Controllo Cache');
define('BOX_TOOLS_DEFINE_LANGUAGE', 'Definizione Languaggi');
define('BOX_TOOLS_FILE_MANAGER', 'Gestione File');
define('BOX_TOOLS_MAIL', 'Invio Email');
define('BOX_TOOLS_NEWSLETTER_MANAGER', 'Gestione Newsletter');
define('BOX_TOOLS_SERVER_INFO', 'Server Info');
define('BOX_TOOLS_WHOS_ONLINE', 'Chi è on line');

// localizaion box text in includes/boxes/localization.php
define('BOX_HEADING_LOCALIZATION', 'Localizzazione');
define('BOX_LOCALIZATION_CURRENCIES', 'Valuta');
define('BOX_LOCALIZATION_LANGUAGES', 'Lingue');
define('BOX_LOCALIZATION_ORDERS_STATUS', 'Stato Ordini');

// javascript messages
define('JS_ERROR', 'Errori durante la compilazione del modulo!!\nEseguire le seguenti correzioni:\n\n');

define('JS_OPTIONS_VALUE_PRICE', '* Il nuovo attributo del Prodotto necessita di un prezzo\n');
define('JS_OPTIONS_VALUE_PRICE_PREFIX', '* Il nuovo attributo del Prodotto necessita di un prefisso di prezzo\n');

define('JS_PRODUCTS_NAME', '* Il nuovo Prodotto necessita di un nome\n');
define('JS_PRODUCTS_DESCRIPTION', '* Il nuovo Prodotto necessita di una descrizione\n');
define('JS_PRODUCTS_PRICE', '* Il nuovo Prodotto necessita di un prezzo\n');
define('JS_PRODUCTS_WEIGHT', '* Il nuovo Prodotto necessita di un peso\n');
define('JS_PRODUCTS_QUANTITY', '* Il nuovo Prodotto necessita di una quantità\n');
define('JS_PRODUCTS_MODEL', '* Il nuovo Prodotto necessita di un modello\n');
define('JS_PRODUCTS_IMAGE', '* Il nuovo Prodotto necessita di un\'immagine\'\n');

define('JS_SPECIALS_PRODUCTS_PRICE', '* Un nuovo prezzo necessita di essere settato per questo prodotto.\n');

define('JS_GENDER', '* Il sesso deve essere specificato.\n');
define('JS_FIRST_NAME', '* Nome deve contenere almeno ' . ENTRY_FIRST_NAME_MIN_LENGTH . ' caratteri.\n');
define('JS_LAST_NAME', '* Cognome deve contenere almeno ' . ENTRY_LAST_NAME_MIN_LENGTH . ' caratteri.\n');
define('JS_DOB', '* La Data di Nascita deve essere nel formato: xx/xx/xxxx (mese/giorno/anno).\n');// da rivedere :)
define('JS_EMAIL_ADDRESS', '* L\'indirizzo di E-mail deve contenere almeno\' ' . ENTRY_EMAIL_ADDRESS_MIN_LENGTH . ' caratteri.\n');
define('JS_ADDRESS', '* L\'indirizzo deve contenere almeno\' ' . ENTRY_STREET_ADDRESS_MIN_LENGTH . ' caratteri.\n');
define('JS_POST_CODE', '* Il CAP deve contenere almeno ' . ENTRY_POSTCODE_MIN_LENGTH . ' caratteri.\n');
define('JS_CITY', '* Il nome della Città deve contenere almeno ' . ENTRY_CITY_MIN_LENGTH . ' caratteri.\n');
define('JS_STATE', '* Lo Stato deve essere selezionato.\n');
define('JS_STATE_SELECT', '-- Selezione Sotto --');
define('JS_ZONE', '* Lo Stato deve essere scelto dalla lista.');
define('JS_COUNTRY', '* Lo Stato deve essere scelto.\n');
define('JS_TELEPHONE', '* Il Numero di Telefono deve contenere almeno ' . ENTRY_TELEPHONE_MIN_LENGTH . ' caratteri.\n');
define('JS_PASSWORD', '* La Password e la Conferma devono contenere almeno ' . ENTRY_PASSWORD_MIN_LENGTH . ' caratteri.\n');

define('JS_ORDER_DOES_NOT_EXIST', 'Il Numero d\'Ordine\' %s non esiste!');

define('CATEGORY_PERSONAL', 'Personale');
define('CATEGORY_ADDRESS', 'Indirizzo');
define('CATEGORY_CONTACT', 'Contatti');
define('CATEGORY_COMPANY', 'Azienda');
define('CATEGORY_PASSWORD', 'Password');
define('CATEGORY_OPTIONS', 'Opzioni');
define('ENTRY_GENDER', 'Sesso:');
define('ENTRY_GENDER_ERROR', '&nbsp;<span class="errorText">richiesto</span>');
define('ENTRY_FIRST_NAME', 'Nome:');
define('ENTRY_FIRST_NAME_ERROR', '&nbsp;<span class="errorText">min ' . ENTRY_FIRST_NAME_MIN_LENGTH . ' caratteri</span>');
define('ENTRY_LAST_NAME', 'Cognome:');
define('ENTRY_LAST_NAME_ERROR', '&nbsp;<span class="errorText">min ' . ENTRY_LAST_NAME_MIN_LENGTH . ' caratteri</span>');
define('ENTRY_DATE_OF_BIRTH', 'Data di Nascita:');
define('ENTRY_DATE_OF_BIRTH_ERROR', '&nbsp;<span class="errorText">(es. 21/05/1970)</span>');
define('ENTRY_EMAIL_ADDRESS', 'Indirizzo e-mail:');
define('ENTRY_EMAIL_ADDRESS_ERROR', '&nbsp;<span class="errorText">min ' . ENTRY_EMAIL_ADDRESS_MIN_LENGTH . ' caratteri</span>');
define('ENTRY_EMAIL_ADDRESS_CHECK_ERROR', '&nbsp;<span class="errorText">L\'indirizzo email inserito non è valido!</span>');
define('ENTRY_EMAIL_ADDRESS_ERROR_EXISTS', '&nbsp;<span class="errorText">Questo indirizzo email è già usato!</span>');
define('ENTRY_COMPANY', 'Nome Azienda:');
define('ENTRY_STREET_ADDRESS', 'Indirizzo:');
define('ENTRY_SUBURB', 'Frazione:');
define('ENTRY_POST_CODE', 'CAP:');
define('ENTRY_CITY', 'Città:');
define('ENTRY_STATE', 'Stato:');
define('ENTRY_COUNTRY', 'Nazione:');
define('ENTRY_TELEPHONE_NUMBER', 'Numero di telefono:');
define('ENTRY_FAX_NUMBER', 'Numero di Fax:');
define('ENTRY_NEWSLETTER', 'Newsletter:');
define('ENTRY_NEWSLETTER_YES', 'iscrivi');
define('ENTRY_NEWSLETTER_NO', 'non iscrivi');
define('ENTRY_PASSWORD', 'Password:');
define('ENTRY_PASSWORD_CONFIRMATION', 'Conferma Password:');
define('PASSWORD_HIDDEN', '--NASCOSTO--');

// images
define('IMAGE_ANI_SEND_EMAIL', 'Spedisci E-Mail');
define('IMAGE_BACK', 'Indietro');
define('IMAGE_BACKUP', 'Backup');
define('IMAGE_CANCEL', 'Cancella');
define('IMAGE_CONFIRM', 'Conferma');
define('IMAGE_COPY', 'Copia');
define('IMAGE_COPY_TO', 'Copia In');
define('IMAGE_DEFINE', 'Definisci');
define('IMAGE_DELETE', 'Cancella');
define('IMAGE_EDIT', 'Modifica');
define('IMAGE_EMAIL', 'Email');
define('IMAGE_FILE_MANAGER', 'Gestione File');
define('IMAGE_ICON_STATUS_GREEN', 'Attiva');
define('IMAGE_ICON_STATUS_GREEN_LIGHT', 'Imposta Attivo');
define('IMAGE_ICON_STATUS_RED', 'Inattiva');
define('IMAGE_ICON_STATUS_RED_LIGHT', 'Imposta Inattivo');
define('IMAGE_ICON_INFO', 'Info');
define('IMAGE_INSERT', 'Inserisci');
define('IMAGE_LOCK', 'Blocca');
define('IMAGE_MOVE', 'Sposta');
define('IMAGE_NEW_BANNER', 'Nuovo Banner');
define('IMAGE_NEW_CATEGORY', 'Nuova Categoria');
define('IMAGE_NEW_COUNTRY', 'Nuova Nazione');
define('IMAGE_NEW_CURRENCY', 'Nuova Valuta');
define('IMAGE_NEW_FILE', 'Nuovo File');
define('IMAGE_NEW_FOLDER', 'Nuova Cartella');
define('IMAGE_NEW_LANGUAGE', 'Nuova Lingua');
define('IMAGE_NEW_NEWSLETTER', 'Nuova Newsletter');
define('IMAGE_NEW_PRODUCT', 'Nuovo Prodotto');
define('IMAGE_NEW_TAX_CLASS', 'Nuovo di Tassa');
define('IMAGE_NEW_TAX_RATE', 'Nuova Percentuale di Tassa');
define('IMAGE_NEW_TAX_ZONE', 'Nuova Zona di Tassa');
define('IMAGE_NEW_ZONE', 'Nuova Zona');
define('IMAGE_ORDERS', 'Ordini');
define('IMAGE_ORDERS_INVOICE', 'Fattura');
define('IMAGE_ORDERS_PACKINGSLIP', 'Scontrino/Fattura');
define('IMAGE_PREVIEW', 'Anteprima');
define('IMAGE_RESTORE', 'Ripristina');
define('IMAGE_RESET', 'Resetta');
define('IMAGE_SAVE', 'Salva');
define('IMAGE_SEARCH', 'Cerca');
define('IMAGE_SELECT', 'Seleziona');
define('IMAGE_SEND', 'Spedisci');
define('IMAGE_UNLOCK', 'Sblocca');
define('IMAGE_UPDATE', 'Aggiorna');
define('IMAGE_UPDATE_CURRENCIES', 'Aggiorna Tasso di Cambio');
define('IMAGE_UPLOAD', 'Sfoglia');

define('ICON_CROSS', 'Falso');
define('ICON_CURRENT_FOLDER', 'Cartella Corrente');
define('ICON_DELETE', 'Cancella');
define('ICON_ERROR', 'Errore');
define('ICON_FILE', 'File');
define('ICON_FILE_DOWNLOAD', 'Download');
define('ICON_FOLDER', 'Cartella');
define('ICON_LOCKED', 'Bloccato');
define('ICON_PREVIOUS_LEVEL', 'Livello Precedente');
define('ICON_PREVIEW', 'Anteprima');
define('ICON_STATISTICS', 'Statistiche');
define('ICON_SUCCESS', 'Riuscito');
define('ICON_TICK', 'Vero');
define('ICON_UNLOCKED', 'Sbloccato');
define('ICON_WARNING', 'Attenzione');

// constants for use in tep_prev_next_display function
define('TEXT_RESULT_PAGE', 'Pagina %s di %d');
define('TEXT_DISPLAY_NUMBER_OF_BANNERS', 'Mostrando <b>%d</b> su <b>%d</b> (di <b>%d</b> banners)');
define('TEXT_DISPLAY_NUMBER_OF_COUNTRIES', 'Mostrando <b>%d</b> su <b>%d</b> (di <b>%d</b> nazioni)');
define('TEXT_DISPLAY_NUMBER_OF_CUSTOMERS', 'Mostrando <b>%d</b> su <b>%d</b> (di <b>%d</b> clienti)');
define('TEXT_DISPLAY_NUMBER_OF_CURRENCIES', 'Mostrando <b>%d</b> su <b>%d</b> (di <b>%d</b> valute)');
define('TEXT_DISPLAY_NUMBER_OF_LANGUAGES', 'Mostrando <b>%d</b> su <b>%d</b> (di <b>%d</b> lingue)');
define('TEXT_DISPLAY_NUMBER_OF_MANUFACTURERS', 'Mostrando <b>%d</b> su <b>%d</b> (di <b>%d</b> produttori)');
define('TEXT_DISPLAY_NUMBER_OF_NEWSLETTERS', 'Mostrando <b>%d</b> su <b>%d</b> (di <b>%d</b> newsletters)');
define('TEXT_DISPLAY_NUMBER_OF_ORDERS', 'Mostrando <b>%d</b> su <b>%d</b> (di <b>%d</b> ordini)');
define('TEXT_DISPLAY_NUMBER_OF_ORDERS_STATUS', 'Mostrando <b>%d</b> su <b>%d</b> (di <b>%d</b> stato ordini)');
define('TEXT_DISPLAY_NUMBER_OF_PRODUCTS', 'Mostrando <b>%d</b> su <b>%d</b> (di <b>%d</b> prodotti)');
define('TEXT_DISPLAY_NUMBER_OF_PRODUCTS_EXPECTED', 'Mostrando <b>%d</b> su <b>%d</b> (di <b>%d</b> prodotti in attesa)');
define('TEXT_DISPLAY_NUMBER_OF_REVIEWS', 'Mostrando <b>%d</b> su <b>%d</b> (di <b>%d</b> commenti prodotto)');
define('TEXT_DISPLAY_NUMBER_OF_SPECIALS', 'Mostrando <b>%d</b> su <b>%d</b> (di <b>%d</b> prodotti in offerta)');
define('TEXT_DISPLAY_NUMBER_OF_TAX_CLASSES', 'Mostrando <b>%d</b> su <b>%d</b> (di <b>%d</b> tipi di tassa)');
define('TEXT_DISPLAY_NUMBER_OF_TAX_ZONES', 'Mostrando <b>%d</b> su <b>%d</b> (di <b>%d</b> zone di tassa)');
define('TEXT_DISPLAY_NUMBER_OF_TAX_RATES', 'Mostrando <b>%d</b> su <b>%d</b> (di <b>%d</b> percentuale di tassa)');
define('TEXT_DISPLAY_NUMBER_OF_ZONES', 'Mostrando <b>%d</b> su <b>%d</b> (di <b>%d</b> zone)');
define('TEXT_INFO_EDIT_GROUP_INTRO','Introduzione Modifica Gruppi');

define('PREVNEXT_BUTTON_PREV', '&lt;&lt;');
define('PREVNEXT_BUTTON_NEXT', '&gt;&gt;');

define('TEXT_DEFAULT', 'default');
define('TEXT_SET_DEFAULT', 'Imposta come Default');
define('TEXT_FIELD_REQUIRED', '&nbsp;<span class="fieldRequired">* Richiesto</span>');

define('ERROR_NO_DEFAULT_CURRENCY_DEFINED', 'Errore: Non è stato impostato un valore di default. Impostarlo da: Amministrazione->Localizzazione->Valute');

define('TEXT_CACHE_CATEGORIES', 'Box Categorie');
define('TEXT_CACHE_MANUFACTURERS', 'Box Produttori');
define('TEXT_CACHE_ALSO_PURCHASED', 'Modulo fornito');

define('ERROR_DESTINATION_DOES_NOT_EXIST', 'Errore: La destinazione non esiste.');
define('ERROR_DESTINATION_NOT_WRITEABLE', 'Errore: La destinazione non e\' scrivibile.');
define('ERROR_FILE_NOT_SAVED', 'Errore: Il file caricato non e\' stato salvato.');
define('ERROR_FILETYPE_NOT_ALLOWED', 'Errore: Tip odi file caricato non permesso.');
define('SUCCESS_FILE_SAVED_SUCCESSFULLY', 'Successo: Il file caricato e\' stato salvato.');
define('WARNING_NO_FILE_UPLOADED', 'Attenzione: Nessun file caricato.');
define('WARNING_FILE_UPLOADS_DISABLED', 'Attenzione: Il caricamento dei file risulta disabilitato nel file php.ini.');
?>