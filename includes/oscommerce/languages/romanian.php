<?php
/*
  $Id: romanian.php,v 1.1.1.2 2005/11/21 13:51:18 tropic Exp $
  
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
@setlocale(LC_TIME, 'ro.ISO_8859-1');

define('DATE_FORMAT_SHORT', '%d/%m/%Y');  // this is used for strftime()
define('DATE_FORMAT_LONG', '%A %d %B, %Y'); // this is used for strftime()
define('DATE_FORMAT', 'd/m/Y'); // this is used for date()
define('DATE_TIME_FORMAT', DATE_FORMAT_SHORT . ' %H:%M:%S');

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
define('HTML_PARAMS','dir="LTR" lang="ro"');

// text for gender
define('MALE', 'Barbat');
define('FEMALE', 'Femeie');
define('MALE_ADDRESS', 'Dl.');
define('FEMALE_ADDRESS', 'Dna.');

// text for date of birth example
define('DOB_FORMAT_STRING', 'dd/mm/yyyy');

define('ENTRY_COMPANY', 'Nume Companie:');
define('ENTRY_COMPANY_ERROR', '');
define('ENTRY_COMPANY_TEXT', '');
define('ENTRY_GENDER', 'Sex:');
define('ENTRY_GENDER_ERROR', 'Sex.');
define('ENTRY_GENDER_TEXT', '*');
define('ENTRY_FIRST_NAME', 'Prenume:');
define('ENTRY_FIRST_NAME_ERROR', 'Prenumele dvs trebuie sa contina minim ' . ENTRY_FIRST_NAME_MIN_LENGTH . ' caractere.');
define('ENTRY_FIRST_NAME_TEXT', '*');
define('ENTRY_LAST_NAME', 'Nume:');
define('ENTRY_LAST_NAME_ERROR', 'Numele dvs trebuie sa contina minim ' . ENTRY_LAST_NAME_MIN_LENGTH . ' caractere.');
define('ENTRY_LAST_NAME_TEXT', '*');
define('ENTRY_DATE_OF_BIRTH', 'Data Nasterii:');
define('ENTRY_DATE_OF_BIRTH_ERROR', 'Data Nasterii trebuie sa aiba formatul: ZI/LUNA/AN (ex. 29/02/1980)');
define('ENTRY_DATE_OF_BIRTH_TEXT', '* (ex. 29/02/1980)');
define('ENTRY_EMAIL_ADDRESS', 'Adresa E-Mail:');
define('ENTRY_EMAIL_ADDRESS_ERROR', 'Adresa E-Mail must trebuie sa contina minim ' . ENTRY_EMAIL_ADDRESS_MIN_LENGTH . ' caractere.');
define('ENTRY_EMAIL_ADDRESS_CHECK_ERROR', 'Adresa dvs de E-Mail nu pare a fi valida - faceti, va rog, corectiile necesare.');
define('ENTRY_EMAIL_ADDRESS_ERROR_EXISTS', 'Adresa dvs de E-Mail exista deja inregistrata la noi - Incercati sa va LOG-ati cu adresa E-mail sau creati un cont aici cu alta adresa E-mail.');
define('ENTRY_EMAIL_ADDRESS_TEXT', '*');
define('ENTRY_STREET_ADDRESS', 'Adresa:');
define('ENTRY_STREET_ADDRESS_ERROR', 'Adresa trebuie sa contina minim ' . ENTRY_STREET_ADDRESS_MIN_LENGTH . ' caractere.');
define('ENTRY_STREET_ADDRESS_TEXT', '*');
define('ENTRY_SUBURB', 'Cartier:');
define('ENTRY_SUBURB_ERROR', '');
define('ENTRY_SUBURB_TEXT', '');
define('ENTRY_POST_CODE', 'Cod Postal:');
define('ENTRY_POST_CODE_ERROR', 'Codul Postal trebuie sa contina minim ' . ENTRY_POSTCODE_MIN_LENGTH . ' caractere.');
define('ENTRY_POST_CODE_TEXT', '*');
define('ENTRY_CITY', 'Oras:');
define('ENTRY_CITY_ERROR', 'Orasul trebuie sa contina minim ' . ENTRY_CITY_MIN_LENGTH . ' caractere.');
define('ENTRY_CITY_TEXT', '*');
define('ENTRY_STATE', 'Localitatea:');
define('ENTRY_STATE_ERROR', 'Localitatea trebuie sa contina minim ' . ENTRY_STATE_MIN_LENGTH . ' caractere.');
define('ENTRY_STATE_ERROR_SELECT', 'Selectati un Stat din aceasta lista.');
define('ENTRY_STATE_TEXT', '*');
define('ENTRY_COUNTRY', 'Tara:');
define('ENTRY_COUNTRY_ERROR', 'Selectati Tara din aceasta lista.');
define('ENTRY_COUNTRY_TEXT', '*');
define('ENTRY_TELEPHONE_NUMBER', 'Numar Telefon:');
define('ENTRY_TELEPHONE_NUMBER_ERROR', 'Numarul de telefon trebuie sa contina minim ' . ENTRY_TELEPHONE_MIN_LENGTH . ' caractere.');
define('ENTRY_TELEPHONE_NUMBER_TEXT', '*');
define('ENTRY_FAX_NUMBER', 'Fax Number:');
define('ENTRY_FAX_NUMBER_ERROR', '');
define('ENTRY_FAX_NUMBER_TEXT', '');
define('ENTRY_NEWSLETTER', 'Newsletter:');
define('ENTRY_NEWSLETTER_TEXT', '');
define('ENTRY_NEWSLETTER_YES', 'Inscris');
define('ENTRY_NEWSLETTER_NO', 'Nu sunt inscris');
define('ENTRY_NEWSLETTER_ERROR', '');
define('ENTRY_PASSWORD', 'Parola:');
define('ENTRY_PASSWORD_ERROR', 'Parola trebuie sa contina minim ' . ENTRY_PASSWORD_MIN_LENGTH . ' caractere.');
define('ENTRY_PASSWORD_ERROR_NOT_MATCHING', 'Parola existenta trebuie sa coincida cu Parola introdusa.');
define('ENTRY_PASSWORD_TEXT', '*');
define('ENTRY_PASSWORD_CONFIRMATION', 'Confirmare Parola:');
define('ENTRY_PASSWORD_CONFIRMATION_TEXT', '*');
define('ENTRY_PASSWORD_CURRENT', 'Parola Curenta:');
define('ENTRY_PASSWORD_CURRENT_TEXT', '*');
define('ENTRY_PASSWORD_CURRENT_ERROR', 'Parola trebuie sa contina minim ' . ENTRY_PASSWORD_MIN_LENGTH . ' caractere.');
define('ENTRY_PASSWORD_NEW', 'Parola Noua:');
define('ENTRY_PASSWORD_NEW_TEXT', '*');
define('ENTRY_PASSWORD_NEW_ERROR', 'Noua Parola trebuie sa contina minim ' . ENTRY_PASSWORD_MIN_LENGTH . ' caractere.');
define('ENTRY_PASSWORD_NEW_ERROR_NOT_MATCHING', 'Parola existenta trebuie sa coincida cu Parola introdusa.');
define('PASSWORD_HIDDEN', '--HIDDEN--');

?>
