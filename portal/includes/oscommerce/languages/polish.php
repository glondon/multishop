<?php
/*
  $Id: polish.php,v 1.1.1.2 2005/11/21 13:51:17 tropic Exp $
  
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com
  Copyright (c) 2002 osCommerce

  [changed for Php-MultiShop (c) 2003-2005 by Piero Trono]

  Released under the GNU General Public License
*/

// zobacz w katalogu $PATH_LOCALE/locale dost�pne lokalizacje..
// w RedHacie powinno by� 'pl_PL'
// we FreeBSD sprawd� 'pl_PL.ISO_8859-2'
// w Windows spr�buj 'pl', lub 'Polski'
@setlocale(LC_TIME, 'pl_PL.ISO_8859-2');

define('DATE_FORMAT_SHORT', '%d-%m-%Y');  // this is used for strftime() // zmienione na PN
define('DATE_FORMAT_LONG', '%d %B %Y'); // this is used for strftime()  //  zmienione na PN
define('DATE_FORMAT', 'd-m-Y'); // this is used for date()  // zmienione na PN
define('DATE_TIME_FORMAT', DATE_FORMAT_SHORT . ' %H:%M:%S');

////
// Zwraca sformatowan� dat� jako raw format
// $date powinna mie� format dd/mm/yyyy
// format raw date ma posta� YYYYMMDD, lub DDMMYYYY
function tep_date_raw($date, $reverse = false) {
  if ($reverse) {
    return substr($date, 0, 2) . substr($date, 3, 2) . substr($date, 6, 4);
  } else {
    return substr($date, 6, 4) . substr($date, 3, 2) . substr($date, 0, 2);
  }
}

// Global entries for the <html> tag
define('HTML_PARAMS','dir="LTR" lang="pl"');

// text for gender
define('MALE', 'M�czyzna');
define('FEMALE', 'Kobieta');
define('MALE_ADDRESS', 'Pan');
define('FEMALE_ADDRESS', 'Pani');

// text for date of birth example
define('DOB_FORMAT_STRING', 'dd-mm-yyyy');

define('ENTRY_COMPANY', 'Nazwa firmy:');
define('ENTRY_COMPANY_ERROR', '');
define('ENTRY_COMPANY_TEXT', '');
define('ENTRY_GENDER', 'P�e�:');
define('ENTRY_GENDER_ERROR', 'Prosz� wybra� p�e�.');
define('ENTRY_GENDER_TEXT', '*');
define('ENTRY_FIRST_NAME', 'Imi�:');
define('ENTRY_FIRST_NAME_ERROR', 'Pole Imi� musi si� sk�ada� z minimum ' . ENTRY_FIRST_NAME_MIN_LENGTH . ' zn');
define('ENTRY_FIRST_NAME_TEXT', '*');
define('ENTRY_LAST_NAME', 'Nazwisko:');
define('ENTRY_LAST_NAME_ERROR', 'Pole Nazwisko musi si� sk�ada� z minimum ' . ENTRY_LAST_NAME_MIN_LENGTH . ' zn');
define('ENTRY_LAST_NAME_TEXT', '*');
define('ENTRY_DATE_OF_BIRTH', 'Data urodzenia:');
define('ENTRY_DATE_OF_BIRTH_ERROR', 'Data urodzenia musi by� w formiacie: DD/MM/YYYY (np. 21/12/1972)');
define('ENTRY_DATE_OF_BIRTH_TEXT', '* (np. 21/12/1972)');
define('ENTRY_EMAIL_ADDRESS', 'Adres e-mail:');
define('ENTRY_EMAIL_ADDRESS_ERROR', 'Tw�j adres e-mail musi si� sk�ada� z minimum ' . ENTRY_EMAIL_ADDRESS_MIN_LENGTH . ' zn');
define('ENTRY_EMAIL_ADDRESS_CHECK_ERROR', 'Tw�j adres e-mail ma niepoprawny format!');
define('ENTRY_EMAIL_ADDRESS_ERROR_EXISTS', 'Taki adres e-mail ju� istnieje w naszym sklepie!');
define('ENTRY_EMAIL_ADDRESS_TEXT', '*');
define('ENTRY_STREET_ADDRESS', 'Ulica:');
define('ENTRY_STREET_ADDRESS_ERROR', 'Pole Ulica musi si� sk�ada� z minimum ' . ENTRY_STREET_ADDRESS_MIN_LENGTH . ' zn');
define('ENTRY_STREET_ADDRESS_TEXT', '*');
define('ENTRY_SUBURB', 'Dzielnica:');
define('ENTRY_SUBURB_ERROR', '');
define('ENTRY_SUBURB_TEXT', '');
define('ENTRY_POST_CODE', 'Kod pocztowy:');
define('ENTRY_POST_CODE_ERROR', 'Pole Kod pocztowy musi si� sk�ada� z minimum ' . ENTRY_POSTCODE_MIN_LENGTH . ' zn');
define('ENTRY_POST_CODE_TEXT', '*');
define('ENTRY_CITY', 'Miasto:');
define('ENTRY_CITY_ERROR', 'Pole Miasto musi si� sk�ada� z minimum ' . ENTRY_CITY_MIN_LENGTH . ' zn');
define('ENTRY_CITY_TEXT', '*');
define('ENTRY_STATE', 'Wojew�dztwo:');
define('ENTRY_STATE_ERROR', 'Pole Wojew�dztwo musi si� sk�ada� z minimum ' . ENTRY_STATE_MIN_LENGTH . ' zn');
define('ENTRY_STATE_ERROR_SELECT', 'Prosz� wybra� wojew�dztwo z menu');
define('ENTRY_STATE_TEXT', '*');
define('ENTRY_COUNTRY', 'Kraj:');
define('ENTRY_COUNTRY_ERROR', 'Prosz� wybra� kraj z menu');
define('ENTRY_COUNTRY_TEXT', '*');
define('ENTRY_TELEPHONE_NUMBER', 'Telefon:');
define('ENTRY_TELEPHONE_NUMBER_ERROR', 'Pole Telefon musi si� sk�ada� z minimum ' . ENTRY_TELEPHONE_MIN_LENGTH . ' zn');
define('ENTRY_TELEPHONE_NUMBER_TEXT', '*');
define('ENTRY_FAX_NUMBER', 'Faks:');
define('ENTRY_FAX_NUMBER_ERROR', '');
define('ENTRY_FAX_NUMBER_TEXT', '');
define('ENTRY_NEWSLETTER', 'Biuletyn:');
define('ENTRY_NEWSLETTER_TEXT', '');
define('ENTRY_NEWSLETTER_YES', 'Zapisany');
define('ENTRY_NEWSLETTER_NO', 'Wypisany');
define('ENTRY_NEWSLETTER_ERROR', '');
define('ENTRY_PASSWORD', 'Has�o:');
define('ENTRY_PASSWORD_ERROR', 'Pole Has�o musi si� sk�ada� z minimum ' . ENTRY_PASSWORD_MIN_LENGTH . ' zn');
define('ENTRY_PASSWORD_ERROR_NOT_MATCHING', 'The Password Confirmation must match your Password.');
define('ENTRY_PASSWORD_TEXT', '*');
define('ENTRY_PASSWORD_CONFIRMATION', 'Potwierdzenie has�a:');
define('ENTRY_PASSWORD_CONFIRMATION_TEXT', '*');
define('ENTRY_PASSWORD_CURRENT', 'Obecne has�o:');
define('ENTRY_PASSWORD_CURRENT_TEXT', '*');
define('ENTRY_PASSWORD_CURRENT_ERROR', 'Twoje has�o musi si� sk�ada� z minimum ' . ENTRY_PASSWORD_MIN_LENGTH . ' zn');
define('ENTRY_PASSWORD_NEW', 'Nowe has�o:');
define('ENTRY_PASSWORD_NEW_TEXT', '*');
define('ENTRY_PASSWORD_NEW_ERROR', 'Twoje nowe has�o musi si� sk�ada� z minimum ' . ENTRY_PASSWORD_MIN_LENGTH . ' zn');
define('ENTRY_PASSWORD_NEW_ERROR_NOT_MATCHING', 'Potwierdzenie has�a musi by� identyczne z nowym has�em.');
define('PASSWORD_HIDDEN', '--NIEWIDOCZNE--');

?>
