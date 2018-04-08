<?php
/*
  $Id: create_account.php,v 1.11 2003/07/05 13:58:31 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE', 'Cr&eacute;ation de compte');

define('HEADING_TITLE', 'Information sur mon compte');

define('TEXT_ORIGIN_LOGIN', '<font color="#FF0000"><small><b>NOTE&nbsp;:</b></font></small> si vous avez d&eacute;j&agrave; un compte, veuillez vous identifier &agrave; la <a href="%s"><u>page d\'identification</u></a>.');

define('EMAIL_SUBJECT', 'Bienvenue chez ' . STORE_NAME);
define('EMAIL_GREET_MR', 'Cher M. %s,' . "\n\n");
define('EMAIL_GREET_MS', 'Ch&egrave;re Mme %s,' . "\n\n");
define('EMAIL_GREET_NONE', 'Cher %s' . "\n\n");
define('EMAIL_WELCOME', 'Nous vous souhaitons la bienvenue chez <b>' . STORE_NAME . '</b>.' . "\n\n");
define('EMAIL_TEXT', 'Vous pouvez &agrave; pr&eacute;sent acc&eacute;der aux <b>nombreux services</b> que nous vous offrons. Parmis ceux-ci&nbsp;:' . "\n\n" . '<li><b>Panier permanent</b> - Chaque produit ajout&eacute; &agrave; votre panier en ligne y demeure jusqu\'&agrave; ce que vous l\'enleviez ou le commandez.' . "\n" . '<li><b>Carnet d\'adresses</b> - Nous pouvons maintenant exp&eacute;dier votre commande &agrave; une autre adresse que la votre&nbsp;! C\'est l\'id&eacute;al pour envoyer un cadeau d\'anniversaire directement &agrave; la personne concern&eacute;e.' . "\n" . '<li><b>Historique des commandes</b> - Consultez l\'historique des achats effectu&eacute;s aupr&egrave;s de nous.' . "\n" . '<li><b>Critiques de produits</b> - Partagez votre opinion sur les produits avec nos autres clients.' . "\n\n");
define('EMAIL_CONTACT', 'Pour une aide sur les services en ligne, veuillez envoyer un email au responsable en ligne&nbsp;: ' . STORE_OWNER_EMAIL_ADDRESS . '.' . "\n\n");
define('EMAIL_WARNING', '<b>Note&nbsp;:</b> Cette adresse email nous a &eacute;t&eacute; communiqu&eacute;e par un de nos clients. Si vous ne vous &ecirc;tes pas inscrit comme membre du site, veuillez envoyer un email &agrave; ' . STORE_OWNER_EMAIL_ADDRESS . '.' . "\n");
?>
