<?php

/*
  $Id: turkish.php,v 1.1 2005/11/21 13:58:31 tropic Exp $
  
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com
  Copyright (c) 2002 osCommerce

  [changed for Php-MultiShop (c) 2003-2005 by Piero Trono]

  Released under the GNU General Public License
*/

@setlocale(LC_TIME, 'tr_TR.ISO_8859-9');
define('DATE_FORMAT_SHORT', '%d/%m/%Y');  // this is used for strftime()
define('DATE_FORMAT_LONG', '%d %B %Y, %A'); // this is used for strftime()
define('DATE_FORMAT', 'd/m/Y'); // this is used for date()
define('DATE_TIME_FORMAT', DATE_FORMAT_SHORT . ' %H:%M:%S');

////
// Return date in raw format
// $date should be in format dd/mm/yyyy
// raw date is in format YYYYMMDD, or DDMMYYYY
function tep_date_raw($date, $reverse = false) {
  if ($reverse) {
    return substr($date, 0, 2) . substr($date, 3, 2) . substr($date, 6, 4);
  } else {
    return substr($date, 6, 4) . substr($date, 3, 2) . substr($date, 0, 2);
  }
}
// Global entries for the <html> tag
define('HTML_PARAMS','dir="LTR" lang="tr"');

// text for gender
define('MALE', 'Bay');
define('FEMALE', 'Bayan');
define('MALE_ADDRESS', 'Sayýn');
define('FEMALE_ADDRESS', 'Sayýn');

// text for date of birth example
define('DOB_FORMAT_STRING', 'gün/ay/yýl');

define('ENTRY_COMPANY', 'Firma Adý:');
define('ENTRY_COMPANY_ERROR', '');
define('ENTRY_COMPANY_TEXT', '');
define('ENTRY_GENDER', 'Cinsiyet:');
define('ENTRY_GENDER_ERROR', 'Lütfen cinsiyet seçiniz.');
define('ENTRY_GENDER_TEXT', '*');
define('ENTRY_FIRST_NAME', 'Ýsim:');
define('ENTRY_FIRST_NAME_ERROR', 'Ýsim alaný en az ' . ENTRY_FIRST_NAME_MIN_LENGTH . ' karakter içermelidir.');
define('ENTRY_FIRST_NAME_TEXT', '*');
define('ENTRY_LAST_NAME', 'Soyad:');
define('ENTRY_LAST_NAME_ERROR', 'Soyad alaný en az ' . ENTRY_LAST_NAME_MIN_LENGTH . ' karakter içermelidir.');
define('ENTRY_LAST_NAME_TEXT', '*');
define('ENTRY_DATE_OF_BIRTH', 'Doðum Tarihi:');
define('ENTRY_DATE_OF_BIRTH_ERROR', 'Doðum tarihiniz þu biçimde olmalýdýr: GG/AA/YYYY (örn. 21/05/1970)');
define('ENTRY_DATE_OF_BIRTH_TEXT', '* (örn. 21/05/1970)');
define('ENTRY_EMAIL_ADDRESS', 'E-Posta Adresi:');
define('ENTRY_EMAIL_ADDRESS_ERROR', 'E-Posta adresiniz en az ' . ENTRY_EMAIL_ADDRESS_MIN_LENGTH . ' karakter içermelidir.');
define('ENTRY_EMAIL_ADDRESS_CHECK_ERROR', 'E-Posta adresininizde bir hata var - Lütfen kontrol edip gerekli deðiþikliði yapýnýz.</font></small>');
define('ENTRY_EMAIL_ADDRESS_ERROR_EXISTS', 'E-Posta adresiniz kayýtlarýmýzda var - Lütfen e-posta adresinizle giriþ yapmayý deneyiniz yada farklý bir adres ile bir hesap açýnýz.');
define('ENTRY_EMAIL_ADDRESS_TEXT', '*');
define('ENTRY_STREET_ADDRESS', 'Adres:');
define('ENTRY_STREET_ADDRESS_ERROR', 'Adres alaný en az ' . ENTRY_STREET_ADDRESS_MIN_LENGTH . ' karakter içermelidir.');
define('ENTRY_STREET_ADDRESS_TEXT', '*');
define('ENTRY_SUBURB', 'Ýlçe:');
define('ENTRY_SUBURB_ERROR', '');
define('ENTRY_SUBURB_TEXT', '');
define('ENTRY_POST_CODE', 'Posta Kodu:');
define('ENTRY_POST_CODE_ERROR', 'Posta Kodu alaný en az ' . ENTRY_POSTCODE_MIN_LENGTH . ' karakter içermelidir.');
define('ENTRY_POST_CODE_TEXT', '*');
define('ENTRY_CITY', 'Þehir:');
define('ENTRY_CITY_ERROR', 'Þehir alaný en az ' . ENTRY_CITY_MIN_LENGTH . ' karakter içermelidir.');
define('ENTRY_CITY_TEXT', '*');
define('ENTRY_STATE', 'Bölge / Eyalet:');
define('ENTRY_STATE_ERROR', 'Eyalet alaný en az ' . ENTRY_STATE_MIN_LENGTH . ' karakter içermelidir.');
define('ENTRY_STATE_ERROR_SELECT', 'Lütfen þehirler kutusundan bir þehir seçiniz.');
define('ENTRY_STATE_TEXT', '*');
define('ENTRY_COUNTRY', 'Ülke:');
define('ENTRY_COUNTRY_ERROR', 'Lütfen ülkeler kutusundan bir ülke seçiniz.');
define('ENTRY_COUNTRY_TEXT', '*');
define('ENTRY_TELEPHONE_NUMBER', 'Telefon numarasý:');
define('ENTRY_TELEPHONE_NUMBER_ERROR', 'Telefon numarasý alaný en az ' . ENTRY_TELEPHONE_MIN_LENGTH . ' rakam içermelidir.');
define('ENTRY_TELEPHONE_NUMBER_TEXT', '*');
define('ENTRY_FAX_NUMBER', 'Faks Numarasý:');
define('ENTRY_FAX_NUMBER_ERROR', '');
define('ENTRY_FAX_NUMBER_TEXT', '');
define('ENTRY_NEWSLETTER', 'Haber listesi:');
define('ENTRY_NEWSLETTER_TEXT', '');
define('ENTRY_NEWSLETTER_YES', 'Abone ol');
define('ENTRY_NEWSLETTER_NO', 'Abone olma');
define('ENTRY_NEWSLETTER_ERROR', '');
define('ENTRY_PASSWORD', 'Parola:');
define('ENTRY_PASSWORD_ERROR', 'Parola alaný en az ' . ENTRY_PASSWORD_MIN_LENGTH . ' karakter içermelidir.');
define('ENTRY_PASSWORD_ERROR_NOT_MATCHING', 'Parola onayý alaný parola alaný ile ayný olmalýdýr.');
define('ENTRY_PASSWORD_TEXT', '*');
define('ENTRY_PASSWORD_CONFIRMATION', 'Parola Onayý:');
define('ENTRY_PASSWORD_CONFIRMATION_TEXT', '*');
define('ENTRY_PASSWORD_CURRENT', 'Eski Parola:');
define('ENTRY_PASSWORD_CURRENT_TEXT', '*');
define('ENTRY_PASSWORD_CURRENT_ERROR', 'Parola alaný en az ' . ENTRY_PASSWORD_MIN_LENGTH . ' karakter içermelidir.');
define('ENTRY_PASSWORD_NEW', 'Yeni Parola:');
define('ENTRY_PASSWORD_NEW_TEXT', '*');
define('ENTRY_PASSWORD_NEW_ERROR', 'Yeni Parola alaný en az ' . ENTRY_PASSWORD_MIN_LENGTH . ' karakter içermelidir.');
define('ENTRY_PASSWORD_NEW_ERROR_NOT_MATCHING', 'Parola onayý alaný parola alaný ile ayný olmalýdýr.');
define('PASSWORD_HIDDEN', '--GIZLI--');

?>