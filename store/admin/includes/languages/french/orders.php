<?php
/*
  $Id: orders.php,v 1.25 2003/06/20 00:28:44 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Commande');
define('HEADING_TITLE_SEARCH', 'Num&eacute;ro de commande&nbsp;:');
define('HEADING_TITLE_STATUS', 'Etat&nbsp;:');

define('TABLE_HEADING_COMMENTS', 'Commentaires');
define('TABLE_HEADING_CUSTOMERS', 'Clients');
define('TABLE_HEADING_ORDER_TOTAL', 'Total de la commande');
define('TABLE_HEADING_DATE_PURCHASED', 'Date d\'achat');
define('TABLE_HEADING_STATUS', 'Etat');
define('TABLE_HEADING_ACTION', 'Action');
define('TABLE_HEADING_QUANTITY', 'Qt&eacute;.');
define('TABLE_HEADING_PRODUCTS_MODEL', 'Mod&egrave;le');
define('TABLE_HEADING_PRODUCTS', 'Produits');
define('TABLE_HEADING_TAX', 'Taxe');
define('TABLE_HEADING_TOTAL', 'Total');
define('TABLE_HEADING_PRICE_EXCLUDING_TAX', 'Prix (HT)');
define('TABLE_HEADING_PRICE_INCLUDING_TAX', 'Prix (TTC)');
define('TABLE_HEADING_TOTAL_EXCLUDING_TAX', 'Total (HT)');
define('TABLE_HEADING_TOTAL_INCLUDING_TAX', 'Total (TTC)');

define('TABLE_HEADING_CUSTOMER_NOTIFIED', 'Client inform&eacute;');
define('TABLE_HEADING_DATE_ADDED', 'Date d\'insertion');

define('ENTRY_CUSTOMER', 'Client&nbsp;:');
define('ENTRY_SOLD_TO', 'VENDU A&nbsp;:');
define('ENTRY_DELIVERY_TO', 'Livraison &agrave;&nbsp;:');
define('ENTRY_SHIP_TO', 'ENVOYE A&nbsp;:');
define('ENTRY_SHIPPING_ADDRESS', 'Adresse de livraison&nbsp;:');
define('ENTRY_BILLING_ADDRESS', 'Adresse de facturation&nbsp;:');
define('ENTRY_PAYMENT_METHOD', 'Moyen de paiement&nbsp;:');
define('ENTRY_CREDIT_CARD_TYPE', 'Type de carte de cr&eacute;dit&nbsp;:');
define('ENTRY_CREDIT_CARD_OWNER', 'Titulaire de la carte de cr&eacute;dit&nbsp;:');
define('ENTRY_CREDIT_CARD_NUMBER', 'Num&eacute;ro de la carte de cr&eacute;dit&nbsp;:');
define('ENTRY_CREDIT_CARD_EXPIRES', 'Date d\'expiration de la carte de cr&eacute;dit&nbsp;:');
define('ENTRY_SUB_TOTAL', 'Sous-total&nbsp;:');
define('ENTRY_TAX', 'Taxe&nbsp;:');
define('ENTRY_SHIPPING', 'Port&nbsp;:');
define('ENTRY_TOTAL', 'Total&nbsp;:');
define('ENTRY_DATE_PURCHASED', 'Date d\'achat&nbsp;:');
define('ENTRY_STATUS', 'Etat&nbsp;:');
define('ENTRY_DATE_LAST_UPDATED', 'Date de la derni&egrave;re actualisation&nbsp;:');
define('ENTRY_NOTIFY_CUSTOMER', 'Avertir le client&nbsp;:');
define('ENTRY_NOTIFY_COMMENTS', 'Joindre un commentaire&nbsp;:');
define('ENTRY_PRINTABLE', 'Imprimer la facture');

define('TEXT_INFO_HEADING_DELETE_ORDER', 'Supprimer la commande');
define('TEXT_INFO_DELETE_INTRO', 'Etes-vous s&ucirc;r de vouloir supprimer cette commande&nbsp;?');
define('TEXT_INFO_RESTOCK_PRODUCT_QUANTITY', 'Remettre en stock la quantit&eacute; du produit');
define('TEXT_DATE_ORDER_CREATED', 'Date de cr&eacute;ation&nbsp;:');
define('TEXT_DATE_ORDER_LAST_MODIFIED', 'Derni&egrave;re modification&nbsp;:');
define('TEXT_INFO_PAYMENT_METHOD', 'Moyen de paiement&nbsp;:');

define('TEXT_ALL_ORDERS', 'Toutes les commandes');
define('TEXT_NO_ORDER_HISTORY', 'Aucun historique de commande disponible');

define('EMAIL_SEPARATOR', '------------------------------------------------------');
define('EMAIL_TEXT_SUBJECT', 'Mise &agrave; jour de la commande');
define('EMAIL_TEXT_ORDER_NUMBER', 'Commande num&eacute;ro&nbsp;:');
define('EMAIL_TEXT_INVOICE_URL', 'Facture d&eacute;taill&eacute;e&nbsp;:');
define('EMAIL_TEXT_DATE_ORDERED', 'Date de la commande&nbsp;:');
define('EMAIL_TEXT_STATUS_UPDATE', 'Votre commande a &eacute;t&eacute; actualis&eacute;e et pass&eacute;e &agrave; l\'&eacute;tat suivant.' . "\n\n" . 'Nouvel &eacute;tat&nbsp;: %s' . "\n\n" . 'Veuillez r&eacute;pondre &agrave; cet email si vous avez la moindre question.' . "\n");
define('EMAIL_TEXT_COMMENTS_UPDATE', 'Voici les commentaires relatifs &agrave; votre commande ' . "\n\n%s\n\n");

define('ERROR_ORDER_DOES_NOT_EXIST', 'Erreur&nbsp;: La commande n\'existe pas.');
define('SUCCESS_ORDER_UPDATED', 'Succ&egrave;s&nbsp;: La commande a &eacute;t&eacute; actualis&eacute;e avec succ&egrave;s.');
define('WARNING_ORDER_NOT_UPDATED', 'Attention&nbsp;: Rien &agrave; changer. La commande n\'a pas &eacute;t&eacute; actualis&eacute;e.');
?>
