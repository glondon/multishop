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
define('MALE', '������');
define('FEMALE', '�������');
define('MALE_ADDRESS', '���');
define('FEMALE_ADDRESS', '��');

// text for date of birth example
define('DOB_FORMAT_STRING', 'dd/mm/yyyy');

define('ENTRY_COMPANY', '����� ���������:');
define('ENTRY_COMPANY_ERROR', '');
define('ENTRY_COMPANY_TEXT', '');
define('ENTRY_GENDER', '����:');
define('ENTRY_GENDER_ERROR', '�������� �� ���� ���.');
define('ENTRY_GENDER_TEXT', '*');
define('ENTRY_FIRST_NAME', '�����:');
define('ENTRY_FIRST_NAME_ERROR', '�� ����� ������ �� �������� ����������� ' . ENTRY_FIRST_NAME_MIN_LENGTH . ' ����������.');
define('ENTRY_FIRST_NAME_TEXT', '*');
define('ENTRY_LAST_NAME', '�������:');
define('ENTRY_LAST_NAME_ERROR', '�� ������� ������ �� �������� ����������� ' . ENTRY_LAST_NAME_MIN_LENGTH . ' ����������.');
define('ENTRY_LAST_NAME_TEXT', '*');
define('ENTRY_DATE_OF_BIRTH', '��/��� ��������:');
define('ENTRY_DATE_OF_BIRTH_ERROR', '� ��/��� �������� �� ������ �� ����� ��� ������: DD/MM/YYYY (�.�. 21/05/1970)');
define('ENTRY_DATE_OF_BIRTH_TEXT', '* (�.�. 21/05/1970)');
define('ENTRY_EMAIL_ADDRESS', '��������� E-Mail:');
define('ENTRY_EMAIL_ADDRESS_ERROR', '� ��������� E-Mail ������ �� �������� ����������� ' . ENTRY_EMAIL_ADDRESS_MIN_LENGTH . ' ����������.');
define('ENTRY_EMAIL_ADDRESS_CHECK_ERROR', '� ��������� E-Mail ��� ���� �� ����� �����.');
define('ENTRY_EMAIL_ADDRESS_ERROR_EXISTS', '� ��������� E-Mail ����� ��� ������������ ��� ���� - ����������� ���������� ��������������� ���� �� ��������� E-Mail � ������������ ��� ��� ���������� �� ����������� ���������.');
define('ENTRY_EMAIL_ADDRESS_TEXT', '*');
define('ENTRY_STREET_ADDRESS', '���������:');
define('ENTRY_STREET_ADDRESS_ERROR', '� ��������� ��� ' . ENTRY_STREET_ADDRESS_MIN_LENGTH . ' ����������.');
define('ENTRY_STREET_ADDRESS_TEXT', '*');
define('ENTRY_SUBURB', '�������:');
define('ENTRY_SUBURB_ERROR', '');
define('ENTRY_SUBURB_TEXT', '');
define('ENTRY_POST_CODE', '�.�.:');
define('ENTRY_POST_CODE_ERROR', '� �.�. ������ �� �������� ����������� ' . ENTRY_POSTCODE_MIN_LENGTH . ' ����������.');
define('ENTRY_POST_CODE_TEXT', '*');
define('ENTRY_CITY', '����:');
define('ENTRY_CITY_ERROR', '�� ����� ��� ����� ������ �� �������� ����������� ' . ENTRY_CITY_MIN_LENGTH . ' ����������.');
define('ENTRY_CITY_TEXT', '*');
define('ENTRY_STATE', '�����:');
define('ENTRY_STATE_ERROR', '�� ����� ��� ����� �� ������ �� �������� ����������� ' . ENTRY_STATE_MIN_LENGTH . ' ����������.');
define('ENTRY_STATE_ERROR_SELECT', '�������� �������� �� ���� ��� �� �����.');
define('ENTRY_STATE_TEXT', '*');
define('ENTRY_COUNTRY', '����:');
define('ENTRY_COUNTRY_ERROR', '������ �� ��������� �� ���� ��� �� �����.');
define('ENTRY_COUNTRY_TEXT', '*');
define('ENTRY_TELEPHONE_NUMBER', '��������:');
define('ENTRY_TELEPHONE_NUMBER_ERROR', '� ������� ��������� ������ �� �������� ����������� ' . ENTRY_TELEPHONE_MIN_LENGTH . ' ����������.');
define('ENTRY_TELEPHONE_NUMBER_TEXT', '*');
define('ENTRY_FAX_NUMBER', 'Fax:');
define('ENTRY_FAX_NUMBER_ERROR', '');
define('ENTRY_FAX_NUMBER_TEXT', '');
define('ENTRY_NEWSLETTER', 'Newsletter:');
define('ENTRY_NEWSLETTER_TEXT', '');
define('ENTRY_NEWSLETTER_YES', 'Subscribed');
define('ENTRY_NEWSLETTER_NO', 'Unsubscribed');
define('ENTRY_NEWSLETTER_ERROR', '');
define('ENTRY_PASSWORD', '�������:');
define('ENTRY_PASSWORD_ERROR', '� ������� ��������� ������ �� �������� ����������� ' . ENTRY_PASSWORD_MIN_LENGTH . ' ����������.');
define('ENTRY_PASSWORD_ERROR_NOT_MATCHING', '�� ������ �� ������ ��� ���� ������ ��� ����� \'���������� �������\'.');
define('ENTRY_PASSWORD_TEXT', '*');
define('ENTRY_PASSWORD_CONFIRMATION', '���������� �������:');
define('ENTRY_PASSWORD_CONFIRMATION_TEXT', '*');
define('ENTRY_PASSWORD_CURRENT', '������ �������:');
define('ENTRY_PASSWORD_CURRENT_TEXT', '*');
define('ENTRY_PASSWORD_CURRENT_ERROR', '� ������� ��������� �� ������ �� �������� ����������� ' . ENTRY_PASSWORD_MIN_LENGTH . ' ����������.');
define('ENTRY_PASSWORD_NEW', '���� �������:');
define('ENTRY_PASSWORD_NEW_TEXT', '*');
define('ENTRY_PASSWORD_NEW_ERROR', '� ���� ������� ��������� �� ������ �� �������� ����������� ' . ENTRY_PASSWORD_MIN_LENGTH . ' ����������.');
define('ENTRY_PASSWORD_NEW_ERROR_NOT_MATCHING', '�� ������ �� ������ ��� ���� ������ ��� ����� \'���������� �������\'.');
define('PASSWORD_HIDDEN', '--HIDDEN--');

?>