<?php
/*
  $Id: categories.php,v 1.26 2003/07/11 14:40:28 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Cat&eacute;gories/Produits');
define('HEADING_TITLE_SEARCH', 'Recherche&nbsp;:');
define('HEADING_TITLE_GOTO', 'Aller &agrave;&nbsp;:');

define('TABLE_HEADING_ID', 'ID');
define('TABLE_HEADING_CATEGORIES_PRODUCTS', 'Cat&eacute;gories/Produits');
define('TABLE_HEADING_ACTION', 'Action');
define('TABLE_HEADING_STATUS', 'Etat');

define('TEXT_NEW_PRODUCT', 'Nouveau produit dans &quot;%s&quot;');
define('TEXT_CATEGORIES', 'Cat&eacute;gories&nbsp;:');
define('TEXT_SUBCATEGORIES', 'Sous-cat&eacute;gories&nbsp;:');
define('TEXT_PRODUCTS', 'Produits&nbsp;:');
define('TEXT_PRODUCTS_PRICE_INFO', 'Prix&nbsp;:');
define('TEXT_PRODUCTS_TAX_CLASS', 'Classe de taxation&nbsp;:');
define('TEXT_PRODUCTS_AVERAGE_RATING', 'Taux moyen&nbsp;:');
define('TEXT_PRODUCTS_QUANTITY_INFO', 'Quantit&eacute;&nbsp;:');
define('TEXT_DATE_ADDED', 'Date d\'insertion&nbsp;:');
define('TEXT_DATE_AVAILABLE', 'Date de disponibilit&eacute;&nbsp;:');
define('TEXT_LAST_MODIFIED', 'Derni&egrave;re modification&nbsp;:');
define('TEXT_IMAGE_NONEXISTENT', 'IMAGE INDISPONIBLE');
define('TEXT_NO_CHILD_CATEGORIES_OR_PRODUCTS', 'Veuillez ins&eacute;rer une nouvelle cat&eacute;gorie ou un nouveau produit à ce niveau.');
define('TEXT_PRODUCT_MORE_INFORMATION', 'Pour plus d\'informations, veuillez visiter la <a href="http://%s" target="blank"><u>page web</u></a> du produit.');
define('TEXT_PRODUCT_DATE_ADDED', 'Ce produit a &eacute;t&eacute; ajout&eacute; &agrave; notre catalogue le %s.');
define('TEXT_PRODUCT_DATE_AVAILABLE', 'Ce produit sera en stock le %s.');

define('TEXT_EDIT_INTRO', 'Veuillez effectuer ici tous changements n&eacute;cessaires');
define('TEXT_EDIT_CATEGORIES_ID', 'ID de la cat&eacute;gorie&nbsp;:');
define('TEXT_EDIT_CATEGORIES_NAME', 'Nom de la cat&eacute;gorie&nbsp;:');
define('TEXT_EDIT_CATEGORIES_IMAGE', 'Image de la cat&eacute;gorie&nbsp;:');
define('TEXT_EDIT_SORT_ORDER', 'Ordre de tri&nbsp;:');

define('TEXT_INFO_COPY_TO_INTRO', 'Veuillez choisir une nouvelle cat&eacute;gorie dans laquelle vous d&eacute;sirez copier le produit');
define('TEXT_INFO_CURRENT_CATEGORIES', 'Cat&eacute;gorie en cours&nbsp;:');

define('TEXT_INFO_HEADING_NEW_CATEGORY', 'Nouvelle cat&eacute;gorie');
define('TEXT_INFO_HEADING_EDIT_CATEGORY', 'Modifier la cat&eacute;gorie');
define('TEXT_INFO_HEADING_DELETE_CATEGORY', 'Supprimer la cat&eacute;gorie');
define('TEXT_INFO_HEADING_MOVE_CATEGORY', 'D&eacute;placer la cat&eacute;gorie');
define('TEXT_INFO_HEADING_DELETE_PRODUCT', 'Supprimer le produit');
define('TEXT_INFO_HEADING_MOVE_PRODUCT', 'D&eacute;placer le produit');
define('TEXT_INFO_HEADING_COPY_TO', 'Copier dans');

define('TEXT_DELETE_CATEGORY_INTRO', 'Etes-vous s&ucirc;r de vouloir supprimer cette cat&eacute;gorie&nbsp;?');
define('TEXT_DELETE_PRODUCT_INTRO', 'Etes-vous s&ucirc;r de vouloir supprimer d&eacute;finitivement ce produit&nbsp;?');

define('TEXT_DELETE_WARNING_CHILDS', '<b>ATTENTION:</b> Il y a encore %s (sous-)cat&eacute;gories li&eacute;es &agrave; cette cat&eacute;gorie&nbsp;!');
define('TEXT_DELETE_WARNING_PRODUCTS', '<b>ATTENTION:</b> Il y a encore %s produits li&eacute;s &agrave; cette cat&eacute;gorie&nbsp;!');

define('TEXT_MOVE_PRODUCTS_INTRO', 'Veuillez s&eacute;lectionner dans quelle cat&eacute;gorie vous d&eacute;sirez que soit class&eacute; <b>%s</b>');
define('TEXT_MOVE_CATEGORIES_INTRO', 'Veuillez s&eacute;lectionner dans quelle cat&eacute;gorie vous d&eacute;sirez que soit class&eacute; <b>%s</b>');
define('TEXT_MOVE', 'D&eacute;placer <b>%s</b> dans&nbsp;:');

define('TEXT_NEW_CATEGORY_INTRO', 'Veuiller compl&eacute;ter les informations suivantes pour la nouvelle cat&eacute;gorie');
define('TEXT_CATEGORIES_NAME', 'Nom de la cat&eacute;gorie&nbsp;:');
define('TEXT_CATEGORIES_IMAGE', 'Image de la cat&eacute;gorie&nbsp;:');
define('TEXT_SORT_ORDER', 'Ordre de tri&nbsp;:');

define('TEXT_PRODUCTS_STATUS', 'Etat du produit&nbsp;:');
define('TEXT_PRODUCTS_DATE_AVAILABLE', 'Date de disponibilit&eacute;&nbsp;:');
define('TEXT_PRODUCT_AVAILABLE', 'En stock');
define('TEXT_PRODUCT_NOT_AVAILABLE', 'En rupture de stock');
define('TEXT_PRODUCTS_MANUFACTURER', 'Fabricant du produit&nbsp;:');
define('TEXT_PRODUCTS_NAME', 'Nom du produit&nbsp;:');
define('TEXT_PRODUCTS_DESCRIPTION', 'Description du produit&nbsp;:');
define('TEXT_PRODUCTS_QUANTITY', 'Quantit&eacute; du produit&nbsp;:');
define('TEXT_PRODUCTS_MODEL', 'Mod&egrave;le du produit&nbsp;:');
define('TEXT_PRODUCTS_IMAGE', 'Image du produit&nbsp;:');
define('TEXT_PRODUCTS_URL', 'URL du produit&nbsp;:');
define('TEXT_PRODUCTS_URL_WITHOUT_HTTP', '<small>(sans http://)</small>');
define('TEXT_PRODUCTS_PRICE_NET', 'Prix du produit (HT)&nbsp;:');
define('TEXT_PRODUCTS_PRICE_GROSS', 'Prix du produit (TTC)&nbsp;:');
define('TEXT_PRODUCTS_WEIGHT', 'Poids du produit&nbsp;:');

define('EMPTY_CATEGORY', 'Cat&eacute;gorie vide');

define('TEXT_HOW_TO_COPY', 'M&eacute;thode de copie&nbsp;:');
define('TEXT_COPY_AS_LINK', 'Produit li&eacute;');
define('TEXT_COPY_AS_DUPLICATE', 'Produit dupliqu&eacute;');

define('ERROR_CANNOT_LINK_TO_SAME_CATEGORY', 'Erreur&nbsp;: Impossible de lier des produits dans la m&ecirc;me cat&eacute;gorie.');
define('ERROR_CATALOG_IMAGE_DIRECTORY_NOT_WRITEABLE', 'Erreur&nbsp;: Le r&eacute;pertoire d\'images du catalogue n\'est pas accessible en &eacute;criture&nbsp;: ' . DIR_FS_CATALOG_IMAGES);
define('ERROR_CATALOG_IMAGE_DIRECTORY_DOES_NOT_EXIST', 'Erreur&nbsp;: Le r&eacute;pertoire d\'images du catalogue n\'existe pas&nbsp;: ' . DIR_FS_CATALOG_IMAGES);
define('ERROR_CANNOT_MOVE_CATEGORY_TO_PARENT', 'Erreur&nbsp;: Une cat&eacute;gorie ne peut pas &ecirc;tre d&eacute;placer dans une sous-cat&eacute;gorie.');
?>
