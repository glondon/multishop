<?php
/*
  $Id: tell_a_friend.php,v 1.7 2003/06/10 18:20:39 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE', 'Avertir un ami');

define('HEADING_TITLE', 'Informer une connaissance sur \'%s\'');

define('FORM_TITLE_CUSTOMER_DETAILS', 'Vos d&eacute;tails');
define('FORM_TITLE_FRIEND_DETAILS', 'Les d&eacute;tails de votre ami');
define('FORM_TITLE_FRIEND_MESSAGE', 'Votre message');

define('FORM_FIELD_CUSTOMER_NAME', 'Votre nom&nbsp;:');
define('FORM_FIELD_CUSTOMER_EMAIL', 'Votre adresse email&nbsp;:');
define('FORM_FIELD_FRIEND_NAME', 'Le nom de votre ami&nbsp;:');
define('FORM_FIELD_FRIEND_EMAIL', 'L\'adresse email de votre ami&nbsp;:');

define('TEXT_EMAIL_SUCCESSFUL_SENT', 'Votre message sur <b>%s</b> a &eacute;t&eacute; envoy&eacute; avec succ&egrave;s &agrave; <b>%s</b>.');

define('TEXT_EMAIL_SUBJECT', 'Votre ami %s vous recommande ce produit g&eacute;nial de %s');
define('TEXT_EMAIL_INTRO', 'Bonjour %s&nbsp;!' . "\n\n" . 'Votre ami, %s, pense que vous pourriez &ecirc;tre int&eacute;ress&eacute; par  %s de %s.');
define('TEXT_EMAIL_LINK', 'Pour voir le produit, cliquez sur le lien ci-dessous ou copier/coller le lien dans votre navigateur&nbsp;:' . "\n\n" . '%s');
define('TEXT_EMAIL_SIGNATURE', 'Cordialement,' . "\n\n" . '%s');

define('ERROR_TO_NAME', 'Erreur&nbsp;: Le nom de votre ami ne peut pas &ecirc;tre vide.');
define('ERROR_TO_ADDRESS', 'Erreur&nbsp;r: L\'adresse email de votre ami doit &ecirc;tre une adresse email valide.');
define('ERROR_FROM_NAME', 'Erreur&nbsp;: Votre nom ne peut pas &ecirc;tre vide.');
define('ERROR_FROM_ADDRESS', 'Erreur&nbsp;: Votre adresse email doit &ecirc;tre une adresse email valide.');
?>
