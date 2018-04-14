<?php
/*
  $Id: french.php,v 1.1.1.1 2005/11/21 13:47:39 tropic Exp $
  
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com
  Copyright (c) 2002 osCommerce

  [changed for Php-MultiShop (c) 2003-2005 by Piero Trono]

  Released under the GNU General Public License
*/

// look in your $PATH_LOCALE/locale directory for available locales..
// on RedHat6.0 I used 'en_US'
// on FreeBSD 4.0 I use 'en_US.ISO_8859-1'
// this may not work under win32 environments..
setlocale(LC_TIME, 'fr_FR.ISO_8859-1');
define('DATE_FORMAT_SHORT', '%d/%m/%Y');  // this is used for strftime()
define('DATE_FORMAT_LONG', '%A %d %B, %Y'); // this is used for strftime()
define('DATE_FORMAT', 'm/d/Y'); // this is used for date()
define('PHP_DATE_TIME_FORMAT', 'd/m/Y H:i:s'); // this is used for date()
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
define('HTML_PARAMS','dir="LTR" lang="fr"');

// text for gender
define('MALE', 'Homme');
define('FEMALE', 'Femme');
define('MALE_ADDRESS', 'M.');
define('FEMALE_ADDRESS', 'Mme');

// text for date of birth example
define('DOB_FORMAT_STRING', 'jj/mm/aaaa');

define('ENTRY_COMPANY_TEXT', '');
define('ENTRY_GENDER', 'Genre&nbsp;:');
define('ENTRY_GENDER_ERROR', 'Veuillez s&eacute;lectionner votre genre.');
define('ENTRY_GENDER_TEXT', '*');
define('ENTRY_FIRST_NAME', 'Pr&eacute;nom&nbsp;:');
define('ENTRY_FIRST_NAME_ERROR', 'Votre pr&eacute;nom doit avoir un minimum de ' . ENTRY_FIRST_NAME_MIN_LENGTH . ' caract&egrave;res.');
define('ENTRY_FIRST_NAME_TEXT', '*');
define('ENTRY_LAST_NAME', 'Nom&nbsp;:');
define('ENTRY_LAST_NAME_ERROR', 'Votre nom doit avoir un minimum de ' . ENTRY_LAST_NAME_MIN_LENGTH . ' caract&egrave;res.');
define('ENTRY_LAST_NAME_TEXT', '*');
define('ENTRY_DATE_OF_BIRTH', 'Date de naissance&nbsp;:');
define('ENTRY_DATE_OF_BIRTH_ERROR', 'Votre date de naissance doit &ecirc;tre au format&nbsp;: DD/MM/YYYY (ex. 21/05/1970)');
define('ENTRY_DATE_OF_BIRTH_TEXT', '* (ex. 21/05/1970)');
define('ENTRY_EMAIL_ADDRESS', 'Adresse email&nbsp;:');
define('ENTRY_EMAIL_ADDRESS_ERROR', 'Votre adresse email doit avoir un minimum de ' . ENTRY_EMAIL_ADDRESS_MIN_LENGTH . ' caract&egrave;res.');
define('ENTRY_EMAIL_ADDRESS_CHECK_ERROR', 'Votre adresse email ne semble pas valide - veuillez faire les corrections n&eacute;cessaires.');
define('ENTRY_EMAIL_ADDRESS_ERROR_EXISTS', 'Votre adresse email existe d&eacute;j&agrave; dans nos enregistrements - veuillez vous identifiez avec cette adresse ou cr&eacute;er un nouveau compte avec une autre adresse email.');
define('ENTRY_EMAIL_ADDRESS_TEXT', '*');
define('ENTRY_STREET_ADDRESS', 'Adresse&nbsp;:');
define('ENTRY_STREET_ADDRESS_ERROR', 'Votre adresse doit avoir un minimum de ' . ENTRY_STREET_ADDRESS_MIN_LENGTH . ' caract&egrave;res.');
define('ENTRY_STREET_ADDRESS_TEXT', '*');
define('ENTRY_SUBURB', 'Comp. adresse&nbsp;:');
define('ENTRY_SUBURB_ERROR', '');
define('ENTRY_SUBURB_TEXT', '');
define('ENTRY_POST_CODE', 'Code postal&nbsp;:');
define('ENTRY_POST_CODE_ERROR', 'Votre code postal doit avoir un minimum de ' . ENTRY_POSTCODE_MIN_LENGTH . ' caract&egrave;res.');
define('ENTRY_POST_CODE_TEXT', '*');
define('ENTRY_CITY', 'Ville&nbsp;:');
define('ENTRY_CITY_ERROR', 'Votre ville doit avoir un minimum de ' . ENTRY_CITY_MIN_LENGTH . ' caract&egrave;res.');
define('ENTRY_CITY_TEXT', '*');
define('ENTRY_STATE', 'R&eacute;gion&nbsp;:');
define('ENTRY_STATE_ERROR', 'Votre r&eacute;gion doit avoir un minimum de ' . ENTRY_STATE_MIN_LENGTH . ' caract&egrave;res.');
define('ENTRY_STATE_ERROR_SELECT', 'Veuillez s&eacute;lectionner une r&eacute;gion dans la liste d&eacute;roulante des r&eacute;gions.');
define('ENTRY_STATE_TEXT', '*');
define('ENTRY_COUNTRY', 'Pays&nbsp;:');
define('ENTRY_COUNTRY_ERROR', 'Vous devez s&eacute;lectionner un pays dans la liste d&eacute;roulante des pays.');
define('ENTRY_COUNTRY_TEXT', '*');
define('ENTRY_TELEPHONE_NUMBER', 'T&eacute;l&eacute;phone&nbsp;:');
define('ENTRY_TELEPHONE_NUMBER_ERROR', 'Votre t&eacute;l&eacute;phone doit avoir un minimum de ' . ENTRY_TELEPHONE_MIN_LENGTH . ' caract&egrave;res.');
define('ENTRY_TELEPHONE_NUMBER_TEXT', '*');
define('ENTRY_FAX_NUMBER', 'Fax&nbsp;:');
define('ENTRY_FAX_NUMBER_ERROR', '');
define('ENTRY_FAX_NUMBER_TEXT', '');
define('ENTRY_NEWSLETTER', 'Newsletter&nbsp;:');
define('ENTRY_NEWSLETTER_TEXT', '');
define('ENTRY_NEWSLETTER_YES', 'S\'inscrire');
define('ENTRY_NEWSLETTER_NO', 'Se d&eacute;sinscrire');
define('ENTRY_NEWSLETTER_ERROR', '');
define('ENTRY_PASSWORD', 'Mot de passe&nbsp;:');
define('ENTRY_PASSWORD_ERROR', 'Votre mot de passe doit avoir un minimum de ' . ENTRY_PASSWORD_MIN_LENGTH . ' caract&egrave;res.');
define('ENTRY_PASSWORD_ERROR_NOT_MATCHING', 'La confirmation du mot de passe doit correspondre &agrave; votre mot de passe.');
define('ENTRY_PASSWORD_TEXT', '*');
define('ENTRY_PASSWORD_CONFIRMATION', 'Confirmation&nbsp;:');
define('ENTRY_PASSWORD_CONFIRMATION_TEXT', '*');
define('ENTRY_PASSWORD_CURRENT', 'Mot de passe actuel&nbsp;:');
define('ENTRY_PASSWORD_CURRENT_TEXT', '*');
define('ENTRY_PASSWORD_CURRENT_ERROR', 'Votre mot de passe doit avoir un minimum de ' . ENTRY_PASSWORD_MIN_LENGTH . ' caract&egrave;res.');
define('ENTRY_PASSWORD_NEW', 'Nouveau mot de passe&nbsp;:');
define('ENTRY_PASSWORD_NEW_TEXT', '*');
define('ENTRY_PASSWORD_NEW_ERROR', 'Votre nouveau mot de passe doit avoir un minimum de ' . ENTRY_PASSWORD_MIN_LENGTH . ' caract&egrave;res.');
define('ENTRY_PASSWORD_NEW_ERROR_NOT_MATCHING', 'La confirmtion du mot de passe doit correspondre &agrave; votre nouveau mot de passe.');
define('PASSWORD_HIDDEN', '--MASQUER--');
?>
