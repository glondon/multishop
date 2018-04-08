<?php
/*
  $Id: greek.php,v 1.1.1.2 2005/11/21 13:51:17 tropic Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/
/* Greek Language Translation - Version 1.0 by panvagil                   */

// look in your $PATH_LOCALE/locale directory for available locales
// or type locale -a on the server.
@setlocale(LC_TIME, 'el_GR');

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
define('HTML_PARAMS','dir="LTR" lang="el"');

// text for gender
define('MALE', '¶νδρας');
define('FEMALE', 'Γυναίκα');
define('MALE_ADDRESS', 'Κος');
define('FEMALE_ADDRESS', 'Κα');

// text for date of birth example
define('DOB_FORMAT_STRING', 'dd/mm/yyyy');

define('ENTRY_COMPANY', 'Όνομα Εταιρείας:');
define('ENTRY_COMPANY_ERROR', '');
define('ENTRY_COMPANY_TEXT', '');
define('ENTRY_GENDER', 'Φύλο:');
define('ENTRY_GENDER_ERROR', 'Επιλεξτε το φύλο σας.');
define('ENTRY_GENDER_TEXT', '*');
define('ENTRY_FIRST_NAME', 'Όνομα:');
define('ENTRY_FIRST_NAME_ERROR', 'Το όνομα πρέπει να περιέχει τουλάχιστον ' . ENTRY_FIRST_NAME_MIN_LENGTH . ' χαρακτήρες.');
define('ENTRY_FIRST_NAME_TEXT', '*');
define('ENTRY_LAST_NAME', 'Επώνυμο:');
define('ENTRY_LAST_NAME_ERROR', 'Το επώνυμο πρέπει να περιέχει τουλάχιστον ' . ENTRY_LAST_NAME_MIN_LENGTH . ' χαρακτήρες.');
define('ENTRY_LAST_NAME_TEXT', '*');
define('ENTRY_DATE_OF_BIRTH', 'Ημ/νία Γέννησης:');
define('ENTRY_DATE_OF_BIRTH_ERROR', 'Η ημ/νία γέννησης θα πρέπει να είναι της μορφής: DD/MM/YYYY (π.χ. 21/05/1970)');
define('ENTRY_DATE_OF_BIRTH_TEXT', '* (π.χ. 21/05/1970)');
define('ENTRY_EMAIL_ADDRESS', 'Διεύθυνση E-Mail:');
define('ENTRY_EMAIL_ADDRESS_ERROR', 'Η διεύθυνση E-Mail πρέπει να περιέχει τουλάχιστον ' . ENTRY_EMAIL_ADDRESS_MIN_LENGTH . ' χαρακτήρες.');
define('ENTRY_EMAIL_ADDRESS_CHECK_ERROR', 'Η διεύθυνση E-Mail δεν έχει τη σωστή μορφή.');
define('ENTRY_EMAIL_ADDRESS_ERROR_EXISTS', 'Η διεύθυνση E-Mail είναι ήδη καταχωρημένη στη βάση - παρακαλούμε συνδεθείτε χρησιμοποιώντας αυτή τη διεύθυνση E-Mail ή δημιουργήστε ένα νέο λογαριασμό με διαφορετική διεύθυνση.');
define('ENTRY_EMAIL_ADDRESS_TEXT', '*');
define('ENTRY_STREET_ADDRESS', 'Διεύθυνση:');
define('ENTRY_STREET_ADDRESS_ERROR', 'Η διεύθυνσή σας ' . ENTRY_STREET_ADDRESS_MIN_LENGTH . ' χαρακτήρες.');
define('ENTRY_STREET_ADDRESS_TEXT', '*');
define('ENTRY_SUBURB', 'Περιοχή:');
define('ENTRY_SUBURB_ERROR', '');
define('ENTRY_SUBURB_TEXT', '');
define('ENTRY_POST_CODE', 'Τ.Κ.:');
define('ENTRY_POST_CODE_ERROR', 'Ο Τ.Κ. πρέπει να περιέχει τουλάχιστον ' . ENTRY_POSTCODE_MIN_LENGTH . ' χαρακτήρες.');
define('ENTRY_POST_CODE_TEXT', '*');
define('ENTRY_CITY', 'Πόλη:');
define('ENTRY_CITY_ERROR', 'Το όνομα της πόλης πρέπει να περιέχει τουλάχιστον ' . ENTRY_CITY_MIN_LENGTH . ' χαρακτήρες.');
define('ENTRY_CITY_TEXT', '*');
define('ENTRY_STATE', 'Νομός:');
define('ENTRY_STATE_ERROR', 'Το όνομα του νομού θα πρέπει να περιέχει τουλάχιστον ' . ENTRY_STATE_MIN_LENGTH . ' χαρακτήρες.');
define('ENTRY_STATE_ERROR_SELECT', 'Παρακαλώ επιλέξτε το νομό από το μενού.');
define('ENTRY_STATE_TEXT', '*');
define('ENTRY_COUNTRY', 'Χώρα:');
define('ENTRY_COUNTRY_ERROR', 'Πρέπει να επιλέξετε τη χώρα από το μενού.');
define('ENTRY_COUNTRY_TEXT', '*');
define('ENTRY_TELEPHONE_NUMBER', 'Τηλέφωνο:');
define('ENTRY_TELEPHONE_NUMBER_ERROR', 'Ο αριθμός τηλεφώνου πρέπει να περιέχει τουλάχιστον ' . ENTRY_TELEPHONE_MIN_LENGTH . ' χαρακτήρες.');
define('ENTRY_TELEPHONE_NUMBER_TEXT', '*');
define('ENTRY_FAX_NUMBER', 'Fax:');
define('ENTRY_FAX_NUMBER_ERROR', '');
define('ENTRY_FAX_NUMBER_TEXT', '');
define('ENTRY_NEWSLETTER', 'Newsletter:');
define('ENTRY_NEWSLETTER_TEXT', '');
define('ENTRY_NEWSLETTER_YES', 'Subscribed');
define('ENTRY_NEWSLETTER_NO', 'Unsubscribed');
define('ENTRY_NEWSLETTER_ERROR', '');
define('ENTRY_PASSWORD', 'Κωδικός:');
define('ENTRY_PASSWORD_ERROR', 'Ο κωδικός πρόσβασης πρέπει να περιέχει τουλάχιστον ' . ENTRY_PASSWORD_MIN_LENGTH . ' χαρακτήρες.');
define('ENTRY_PASSWORD_ERROR_NOT_MATCHING', 'Θα πρέπει να δώσετε τον ίδιο κωδικό στο πεδίο \'Επαλήθευση Κωδικού\'.');
define('ENTRY_PASSWORD_TEXT', '*');
define('ENTRY_PASSWORD_CONFIRMATION', 'Επαλήθευση Κωδικού:');
define('ENTRY_PASSWORD_CONFIRMATION_TEXT', '*');
define('ENTRY_PASSWORD_CURRENT', 'Τρέχων Κωδικός:');
define('ENTRY_PASSWORD_CURRENT_TEXT', '*');
define('ENTRY_PASSWORD_CURRENT_ERROR', 'Ο κωδικός πρόσβασης θα πρέπει να περιέχει τουλάχιστον ' . ENTRY_PASSWORD_MIN_LENGTH . ' χαρακτήρες.');
define('ENTRY_PASSWORD_NEW', 'Νέος Κωδικός:');
define('ENTRY_PASSWORD_NEW_TEXT', '*');
define('ENTRY_PASSWORD_NEW_ERROR', 'Ο νέος κωδικός πρόσβασης θα πρέπει να περιέχει τουλάχιστον ' . ENTRY_PASSWORD_MIN_LENGTH . ' χαρακτήρες.');
define('ENTRY_PASSWORD_NEW_ERROR_NOT_MATCHING', 'Θα πρέπει να δώσετε τον ίδιο κωδικό στο πεδίο \'Επαλήθευση Κωδικού\'.');
define('PASSWORD_HIDDEN', '--HIDDEN--');

?>