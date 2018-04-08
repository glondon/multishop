<?php
/*
  $Id: password_forgotten.php,v 1.8 2003/06/09 22:46:46 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE_1', 'Identification');
define('NAVBAR_TITLE_2', 'Mot de passe oubli&eacute;');

define('HEADING_TITLE', 'J\'ai oubli&eacute; mon mot de passe&nbsp;!');

define('TEXT_MAIN', 'Si vous avez oubli&eacute; votre mot de passe, saisissez ci-dessous votre adresse email et nous vous enverrons un message avec votre nouveau mot de passe.');

define('TEXT_NO_EMAIL_ADDRESS_FOUND', 'Erreur&nbsp;: L\'adresse email n\'est pas r&eacute;pertori&eacute;e chez nous, veuillez essayer &agrave; nouveau.');

define('EMAIL_PASSWORD_REMINDER_SUBJECT', STORE_NAME . ' - Nouveau mot de passe');
define('EMAIL_PASSWORD_REMINDER_BODY', 'Un nouveau mot de passe a &eacute;t&eacute; demand&eacute; depuis ' . $REMOTE_ADDR . '.' . "\n\n" . 'Votre nouveau mot de passe pour \'' . STORE_NAME . '\' est&nbsp;:' . "\n\n" . '   %s' . "\n\n");

define('SUCCESS_PASSWORD_SENT', 'Succ&egrave;s&nbsp;: Un nouveau mot de passe a &eacute;t&eacute; envoy&eacute; &agrave; votre adresse email.');
?>