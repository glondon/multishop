<?php
/*
  $Id: italian.php,v 1.1.1.1 2005/11/21 13:47:39 tropic Exp $
  
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com
  Copyright (c) 2002 osCommerce

  [changed for Php-MultiShop (c) 2003-2005 by Piero Trono]

  Released under the GNU General Public License
*/

// look in your $PATH_LOCALE/locale directory for available locales
// or type locale -a on the server.
// Examples:
// on RedHat try 'en_US'
// on FreeBSD try 'en_US.ISO_8859-1'
// on Windows try 'en', or 'English'
@setlocale(LC_TIME, 'it_IT.ISO8859-1');

define('DATE_FORMAT_SHORT', '%d/%m/%Y');  // this is used for strftime()
define('DATE_FORMAT_LONG', '%A %d %B, %Y'); // this is used for strftime()
define('DATE_FORMAT', 'd/m/Y'); // this is used for date()
define('DATE_TIME_FORMAT', DATE_FORMAT_SHORT . ' %H:%M:%S');

////
// Return date in raw format
// $date should be in format mm/dd/yyyy
// raw date is in format YYYYMMDD, or DDMMYYYY
function tep_date_raw($date, $reverse = false) {
  if ($reverse) {
    return substr($date, 0, 2) . substr($date, 3, 2) . substr($date, 6, 4);
  } else {
    return substr($date, 6, 4) . substr($date, 3, 2) . substr($date, 0, 2);
  }
}

// Global entries for the <html> tag
define('HTML_PARAMS','dir="LTR" lang="it"');

// text for gender
define('MALE', 'Uomo');
define('FEMALE', 'Donna');
define('MALE_ADDRESS', 'Sig.');
define('FEMALE_ADDRESS', 'Sig.ra');

// text for date of birth example
define('DOB_FORMAT_STRING', 'dd/mm/yyyy');

define('ENTRY_COMPANY_TEXT', '');
define('ENTRY_GENDER', 'Sesso:');
define('ENTRY_GENDER_ERROR', 'Campo "Sesso" Richiesto.');
define('ENTRY_GENDER_TEXT', '&nbsp;<small>richiesto</small>');
define('ENTRY_FIRST_NAME', 'Nome:');
define('ENTRY_FIRST_NAME_ERROR', 'Il campo "Nome" deve contentere minimo ' . ENTRY_FIRST_NAME_MIN_LENGTH . ' caratteri.');
define('ENTRY_FIRST_NAME_TEXT', '&nbsp;<small>richiesto</small>');
define('ENTRY_LAST_NAME', 'Cognome:');
define('ENTRY_LAST_NAME_ERROR', 'Il campo "Cognome" deve contenere minimo ' . ENTRY_LAST_NAME_MIN_LENGTH . ' caratteri.');
define('ENTRY_LAST_NAME_TEXT', '&nbsp;<small>richiesto</small>');
define('ENTRY_DATE_OF_BIRTH', 'Data di nascita:');
define('ENTRY_DATE_OF_BIRTH_ERROR', 'La "Data di nascita" deve essere inserita seguendo il formato MM/DD/YYYY (eg. 05/21/1970).');
define('ENTRY_DATE_OF_BIRTH_TEXT', '* (eg. 05/21/1970)');
define('ENTRY_EMAIL_ADDRESS', 'Indirizzo E-Mail:');
define('ENTRY_EMAIL_ADDRESS_ERROR', 'Il campo "Indirizzo E-Mail" deve contentere minimo ' . ENTRY_EMAIL_ADDRESS_MIN_LENGTH . ' caratteri.');
define('ENTRY_EMAIL_ADDRESS_CHECK_ERROR', 'Indirizzo email non valido - accertarsi e correggere.');
define('ENTRY_EMAIL_ADDRESS_ERROR_EXISTS', 'Indirizzo email già contenuto nel nostro database - accedere con questo indirizzo oppure creare un account con un indirizzo differente.');
define('ENTRY_EMAIL_ADDRESS_TEXT', '&nbsp;<small>richiesto</small>');
define('ENTRY_STREET_ADDRESS', 'Indirizzo:');
define('ENTRY_STREET_ADDRESS_ERROR', 'Il campo "Indirizzo" deve contentere minimo ' . ENTRY_STREET_ADDRESS_MIN_LENGTH . ' caratteri.');
define('ENTRY_STREET_ADDRESS_TEXT', '&nbsp;<small>richiesto</small>');
define('ENTRY_SUBURB', 'Frazione:');
define('ENTRY_SUBURB_ERROR', '');
define('ENTRY_SUBURB_TEXT', '');
define('ENTRY_POST_CODE', 'CAP:');
define('ENTRY_POST_CODE_ERROR', 'Il campo "CAP" deve contentere minimo ' . ENTRY_POSTCODE_MIN_LENGTH . ' caratteri.');
define('ENTRY_POST_CODE_TEXT', '&nbsp;<small>richiesto</small>');
define('ENTRY_CITY', 'Città:');
define('ENTRY_CITY_ERROR', 'Il campo "Città" deve contentere minimo ' . ENTRY_CITY_MIN_LENGTH . ' caratteri.');
define('ENTRY_CITY_TEXT', '&nbsp;<small>richiesto</small>');
define('ENTRY_STATE', 'Stato/Provincia:');
define('ENTRY_STATE_ERROR', 'Il campo "Stato/Provincia" deve contentere minimo ' . ENTRY_STATE_MIN_LENGTH . ' caratteri.');
define('ENTRY_STATE_ERROR_SELECT', 'Seleziona uno Stato/Provincia del menù a scorrimento.');
define('ENTRY_STATE_TEXT', '&nbsp;<small>richiesto</small>');
define('ENTRY_COUNTRY', 'Nazione:');
define('ENTRY_COUNTRY_ERROR', 'Seleziona una Nazione del menù a scorrimento.');
define('ENTRY_COUNTRY_TEXT', '&nbsp;<small>richiesto</small>');
define('ENTRY_TELEPHONE_NUMBER', 'Numero di telefono:');
define('ENTRY_TELEPHONE_NUMBER_ERROR', 'Il campo "Numero di telefono" deve contentere minimo ' . ENTRY_TELEPHONE_MIN_LENGTH . ' caratteri.');
define('ENTRY_TELEPHONE_NUMBER_TEXT', '&nbsp;<small>richiesto</small>');
define('ENTRY_FAX_NUMBER', 'Fax:');
define('ENTRY_FAX_NUMBER_ERROR', '');
define('ENTRY_FAX_NUMBER_TEXT', '');
define('ENTRY_NEWSLETTER', 'Newsletter:');
define('ENTRY_NEWSLETTER_TEXT', '');
define('ENTRY_NEWSLETTER_YES', 'Mi iscrivo');
define('ENTRY_NEWSLETTER_NO', 'Non mi iscrivo');
define('ENTRY_NEWSLETTER_ERROR', '');
define('ENTRY_PASSWORD', 'Password:');
define('ENTRY_PASSWORD_ERROR', 'Il campo "Password" deve contentere minimo ' . ENTRY_PASSWORD_MIN_LENGTH . ' caratteri.');
define('ENTRY_PASSWORD_ERROR_NOT_MATCHING', 'Le Password "Password" e "Conferma password" inserite non corrispondono.');
define('ENTRY_PASSWORD_TEXT', '&nbsp;<small>richiesto</small>');
define('ENTRY_PASSWORD_CONFIRMATION', 'Conferma Password:');
define('ENTRY_PASSWORD_CONFIRMATION_TEXT', '&nbsp;<small>richiesto</small>');
define('ENTRY_PASSWORD_CURRENT', 'Password Attuale:');
define('ENTRY_PASSWORD_CURRENT_TEXT', '&nbsp;<small>richiesto</small>');
define('ENTRY_PASSWORD_CURRENT_ERROR', 'Il campo "Password Attuale" deve contentere minimo ' . ENTRY_PASSWORD_MIN_LENGTH . ' caratteri.');
define('ENTRY_PASSWORD_NEW', 'Nuova Password:');
define('ENTRY_PASSWORD_NEW_TEXT', '&nbsp;<small>richiesto</small>');
define('ENTRY_PASSWORD_NEW_ERROR', 'Il campo "Nuova Password" deve contentere minimo ' . ENTRY_PASSWORD_MIN_LENGTH . ' caratteri.');
define('ENTRY_PASSWORD_NEW_ERROR_NOT_MATCHING', 'Le Password "Password Attuale" e "Nuova Password" inserite non corrispondono .');
define('PASSWORD_HIDDEN', '--NASCOSTA--');
?>