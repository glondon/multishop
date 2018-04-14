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
define('MALE_ADDRESS', 'Say�n');
define('FEMALE_ADDRESS', 'Say�n');

// text for date of birth example
define('DOB_FORMAT_STRING', 'g�n/ay/y�l');

define('ENTRY_COMPANY', 'Firma Ad�:');
define('ENTRY_COMPANY_ERROR', '');
define('ENTRY_COMPANY_TEXT', '');
define('ENTRY_GENDER', 'Cinsiyet:');
define('ENTRY_GENDER_ERROR', 'L�tfen cinsiyet se�iniz.');
define('ENTRY_GENDER_TEXT', '*');
define('ENTRY_FIRST_NAME', '�sim:');
define('ENTRY_FIRST_NAME_ERROR', '�sim alan� en az ' . ENTRY_FIRST_NAME_MIN_LENGTH . ' karakter i�ermelidir.');
define('ENTRY_FIRST_NAME_TEXT', '*');
define('ENTRY_LAST_NAME', 'Soyad:');
define('ENTRY_LAST_NAME_ERROR', 'Soyad alan� en az ' . ENTRY_LAST_NAME_MIN_LENGTH . ' karakter i�ermelidir.');
define('ENTRY_LAST_NAME_TEXT', '*');
define('ENTRY_DATE_OF_BIRTH', 'Do�um Tarihi:');
define('ENTRY_DATE_OF_BIRTH_ERROR', 'Do�um tarihiniz �u bi�imde olmal�d�r: GG/AA/YYYY (�rn. 21/05/1970)');
define('ENTRY_DATE_OF_BIRTH_TEXT', '* (�rn. 21/05/1970)');
define('ENTRY_EMAIL_ADDRESS', 'E-Posta Adresi:');
define('ENTRY_EMAIL_ADDRESS_ERROR', 'E-Posta adresiniz en az ' . ENTRY_EMAIL_ADDRESS_MIN_LENGTH . ' karakter i�ermelidir.');
define('ENTRY_EMAIL_ADDRESS_CHECK_ERROR', 'E-Posta adresininizde bir hata var - L�tfen kontrol edip gerekli de�i�ikli�i yap�n�z.</font></small>');
define('ENTRY_EMAIL_ADDRESS_ERROR_EXISTS', 'E-Posta adresiniz kay�tlar�m�zda var - L�tfen e-posta adresinizle giri� yapmay� deneyiniz yada farkl� bir adres ile bir hesap a��n�z.');
define('ENTRY_EMAIL_ADDRESS_TEXT', '*');
define('ENTRY_STREET_ADDRESS', 'Adres:');
define('ENTRY_STREET_ADDRESS_ERROR', 'Adres alan� en az ' . ENTRY_STREET_ADDRESS_MIN_LENGTH . ' karakter i�ermelidir.');
define('ENTRY_STREET_ADDRESS_TEXT', '*');
define('ENTRY_SUBURB', '�l�e:');
define('ENTRY_SUBURB_ERROR', '');
define('ENTRY_SUBURB_TEXT', '');
define('ENTRY_POST_CODE', 'Posta Kodu:');
define('ENTRY_POST_CODE_ERROR', 'Posta Kodu alan� en az ' . ENTRY_POSTCODE_MIN_LENGTH . ' karakter i�ermelidir.');
define('ENTRY_POST_CODE_TEXT', '*');
define('ENTRY_CITY', '�ehir:');
define('ENTRY_CITY_ERROR', '�ehir alan� en az ' . ENTRY_CITY_MIN_LENGTH . ' karakter i�ermelidir.');
define('ENTRY_CITY_TEXT', '*');
define('ENTRY_STATE', 'B�lge / Eyalet:');
define('ENTRY_STATE_ERROR', 'Eyalet alan� en az ' . ENTRY_STATE_MIN_LENGTH . ' karakter i�ermelidir.');
define('ENTRY_STATE_ERROR_SELECT', 'L�tfen �ehirler kutusundan bir �ehir se�iniz.');
define('ENTRY_STATE_TEXT', '*');
define('ENTRY_COUNTRY', '�lke:');
define('ENTRY_COUNTRY_ERROR', 'L�tfen �lkeler kutusundan bir �lke se�iniz.');
define('ENTRY_COUNTRY_TEXT', '*');
define('ENTRY_TELEPHONE_NUMBER', 'Telefon numaras�:');
define('ENTRY_TELEPHONE_NUMBER_ERROR', 'Telefon numaras� alan� en az ' . ENTRY_TELEPHONE_MIN_LENGTH . ' rakam i�ermelidir.');
define('ENTRY_TELEPHONE_NUMBER_TEXT', '*');
define('ENTRY_FAX_NUMBER', 'Faks Numaras�:');
define('ENTRY_FAX_NUMBER_ERROR', '');
define('ENTRY_FAX_NUMBER_TEXT', '');
define('ENTRY_NEWSLETTER', 'Haber listesi:');
define('ENTRY_NEWSLETTER_TEXT', '');
define('ENTRY_NEWSLETTER_YES', 'Abone ol');
define('ENTRY_NEWSLETTER_NO', 'Abone olma');
define('ENTRY_NEWSLETTER_ERROR', '');
define('ENTRY_PASSWORD', 'Parola:');
define('ENTRY_PASSWORD_ERROR', 'Parola alan� en az ' . ENTRY_PASSWORD_MIN_LENGTH . ' karakter i�ermelidir.');
define('ENTRY_PASSWORD_ERROR_NOT_MATCHING', 'Parola onay� alan� parola alan� ile ayn� olmal�d�r.');
define('ENTRY_PASSWORD_TEXT', '*');
define('ENTRY_PASSWORD_CONFIRMATION', 'Parola Onay�:');
define('ENTRY_PASSWORD_CONFIRMATION_TEXT', '*');
define('ENTRY_PASSWORD_CURRENT', 'Eski Parola:');
define('ENTRY_PASSWORD_CURRENT_TEXT', '*');
define('ENTRY_PASSWORD_CURRENT_ERROR', 'Parola alan� en az ' . ENTRY_PASSWORD_MIN_LENGTH . ' karakter i�ermelidir.');
define('ENTRY_PASSWORD_NEW', 'Yeni Parola:');
define('ENTRY_PASSWORD_NEW_TEXT', '*');
define('ENTRY_PASSWORD_NEW_ERROR', 'Yeni Parola alan� en az ' . ENTRY_PASSWORD_MIN_LENGTH . ' karakter i�ermelidir.');
define('ENTRY_PASSWORD_NEW_ERROR_NOT_MATCHING', 'Parola onay� alan� parola alan� ile ayn� olmal�d�r.');
define('PASSWORD_HIDDEN', '--GIZLI--');

?>