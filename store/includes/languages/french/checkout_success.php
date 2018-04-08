<?php
/*
  $Id: checkout_success.php,v 1.12 2003/04/15 17:47:42 dgw_ Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE_1', 'Commande');
define('NAVBAR_TITLE_2', 'Succ&egrave;s');

define('HEADING_TITLE', 'Votre commande a &eacute;t&eacute; valid&eacute;e&nbsp;!');

define('TEXT_SUCCESS', 'Votre commande a &eacute;t&eacute; enregistr&eacute;e avec succ&egrave;s&nbsp;! Vos produits arriveront &agrave; destination d\'ici 2 &agrave; 5 jours ouvrables.');
define('TEXT_NOTIFY_PRODUCTS', 'Veuillez m\'avertir des mises &agrave; jour des produits que j\'ai s&eacute;lectionn&eacute;s ci-dessous&nbsp;:');
define('TEXT_SEE_ORDERS', 'Vous pouvez consulter l\'historique de vos commandes en allant &agrave; la page <a href="' . tep_href_link(FILENAME_ACCOUNT, '', 'SSL') . '">\'Mon compte\'</a> et en cliquant sur <a href="' . tep_href_link(FILENAME_ACCOUNT_HISTORY, '', 'SSL') . '">\'Historique\'</a>.');
define('TEXT_CONTACT_STORE_OWNER', 'Pour toutes questions, veuillez vous adresser au <a href="' . tep_href_link(FILENAME_CONTACT_US) . '">responsable de la boutique en ligne</a>.');
define('TEXT_THANKS_FOR_SHOPPING', 'Merci d\'avoir effectu&eacute; vos achats en ligne chez nous&nbsp;!');

define('TABLE_HEADING_COMMENTS', 'Ajouter un commentaire &agrave; propos de la commande trait&eacute;e');

define('TABLE_HEADING_DOWNLOAD_DATE', 'Date d\'expiration&nbsp;: ');
define('TABLE_HEADING_DOWNLOAD_COUNT', ' t&eacute;l&eacute;chargements restant.');
define('HEADING_DOWNLOAD', 'T&eacute;l&eacute;charger vos produits ici&nbsp;:');
define('FOOTER_DOWNLOAD', 'Vous pouvez aussi t&eacute;l&eacute;charger vos produits ult&eacute;rieurement &agrave; \'%s\'');
?>