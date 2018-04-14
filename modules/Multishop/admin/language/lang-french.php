<?php

/**************************************************************************/
/* Php-MultiShop                                                          */
/* Copyright (c) 2003 par Piero Trono   http://php-multishop.com          */
/* basé sur : Php-Nuke et osCommerce                                      */
/* =================================                                      */
/*                                                                        */
/* Translation in French by Youk (youk@wanadoo.fr)                        */
/* ===============================================                        */
/*                                                                        */
/* This is the language module with all the system messages               */
/*                                                                        */
/* If you made a translation, please go to the site and send to me        */
/* the translated file. Please keep the original text order by modules,   */
/* and just one message per line, also double check your translation!     */
/*                                                                        */
/* You need to change the second quoted phrase, not the capital one!      */
/*                                                                        */
/* If you need to use double quotes (") remember to add a backslash (\),  */
/* so your entry will look like: This is \"double quoted\" text.          */
/* And, if you use HTML code, please double check it.                     */
/**************************************************************************/
/* $Id: lang-french.php,v 1.1.1.1 2005/11/21 13:48:09 tropic Exp $ */

define("STORES","Boutiques");
define('SELECT_LANGUAGES', 'Please, select just the used languages in the categories name');
define('GENERATION_OF_CATEGORIES_LIST', 'Generation of Categories List');
define('_UPDATE_CATEGORIES_LIST', 'After any change on the Categories, remember to regenerate the categories list');
define('_GENERATE_LIST', 'Generate List');
define('TEXT_INFO_EDIT_INTRO', 'Veuillez effectuer ici tous changements n&eacute;cessaires');
define('TEXT_INFO_CURRENCY_TITLE', 'Titre&nbsp;:');
define('TEXT_INFO_CURRENCY_CODE', 'Code&nbsp;:');
define('TEXT_INFO_CURRENCY_SYMBOL_LEFT', 'Symbole gauche&nbsp;:');
define('TEXT_INFO_CURRENCY_SYMBOL_RIGHT', 'Symbole droit&nbsp;:');
define('TEXT_INFO_CURRENCY_DECIMAL_POINT', 'S&eacute;parateur d&eacute;cimal&nbsp;:');
define('TEXT_INFO_CURRENCY_THOUSANDS_POINT', 'S&eacute;parateur des milliers&nbsp;:');
define('TEXT_INFO_CURRENCY_DECIMAL_PLACES', 'Nombre de d&eacute;cimales&nbsp;:');
define('TEXT_INFO_CURRENCY_LAST_UPDATED', 'Derni&egrave;re mise &agrave; jour&nbsp;:');
define('TEXT_INFO_CURRENCY_VALUE', 'Valeur&nbsp;:');
define('TEXT_INFO_CURRENCY_EXAMPLE', 'Exemple d\'affichage&nbsp;:');
define('TEXT_INFO_INSERT_INTRO', 'Veuillez compl&eacute;ter les donn&eacute;es suivantes pour la nouvelle devise');
define("_ADD_CURRENCY","Nouvelle devise");
define("_ACTIONS","Action");
define("_VALUE","Valeur");
define("_CODE","Code");
define("_CURRENCY","Devise");
define("_CURRENCIES","Devises");
define("_PRODS_FOR_SHOP","Num Prods from each shop");
define("_MAX_PROD_FOR_PAGE","Num max of Prods for page");
define("_SHOW_RSS", "comprende RSS MetaTag pour les navigateurs");
define("_SET_TYPE", "Type de Boutique");
define("_TYPE_ACTIVE", "ACTIF");
define("_TYPE_INACTIVE", "INACTIF");
define("_TYPE_EXTERNAL", "EXTERIEUR");
define("_REVIEWS","Critiques");
define("_ENABLE_TO_SHOW", "<b>Permettre la vue de:</b>");
define("_ENABLE_NOTICE", "Note: if " . _SET_TYPE . " is set as <i>" . _TYPE_INACTIVE . "</i><br>all the options will be disabled");
define("_SPECIALS", "Offres");
define("_BEST", "Plus vendue");
define("_SHOW_SHOPS_IN_HOME","montre les boutiques in home page");
define("_NUM_HOME_PRODS","num products displayed in news page");
define("_NUM_HOME_NEWS","num news in news page with products");
define("_INCLUDE_TAX_RATE","include l'impôt dans le prix");
define("_SHOW_TAX_RATE","montre l'impôt en %");
define("_DELETE_ORDERS_SHOP","<font color=\"red\"><b>Warning</b></font>: this function will delete all the information for this user in every shop, as orders, address book, customers basket, ...");
define("DESCRIPTION_SHOP","Description de la Boutique");
define("DESCRIPTION_PRODUCTION","Détails sur Notre Production");
define("_INFORMATION_FOR_SHOPPING","Informations sur les Boutiques");
define("_LAST_NAME","NOM");
define("_TELEPHONE","Téléphone");
define("_MULTISHOP","Multi-Shop");
define("_CONFIG","Configuration");
define("_NUM_MIN","Nombre mininum de caractères pour le Préfixe et les Noms des Vendeurs");
define("_NUM_MIN_CAT","Nombre mininum de caractères pour les noms des Catégories");
define("_NUM_PROD_HOME","Nombre de produits par boutique");
define("_NUM_PROD_FOR_LINE","Nombre de produits par ligne");
define("_NUM_PROD_TOTAL","Nombre de produits total");
define("_CONFIG_UPDATED","Configuration mise à jour");
define("_LISTVENDORS","Liste des Vendeurs");
define("_NOTVENDORS","Pas de Vendeurs");
define("_NOT_VENDOR_SELECTED","Vendeur non sélectionné");
define("_VENDORS_PREFIX","Préfixe");
define("_VENDORS_NAME","Nom");
define("_VENDORS_HOST","Url-Catalog");
define("_NOTE_URL","Fichier par défaut du Catalog, Exemple: www.myshop.com/index.php, www.myshop.com/catalog/default.php");
define("_EDIT_VENDOR","Editer le Vendeur");
define("_VENDOR_UPDATED","Vendeur mis à jour");
define("_WARNING_DELETE","Etes-vous sûr de vouloir supprimer ?");
define("_WARNING_HAVE_CHILD","Erreur: cette catégorie a des sous-catégories");
define("_ADDED_CATEGORY","Catégorie insérée:");
define("_CATEGORY_DELETED","Catégorie supprimée:");
define("_ALL_CATEGORIES","Catégories");
define("_NOT_CATEGORY_SELECTED","Aucune catégorie sélectionnée");
define("_MOTHER_CATEGORY","Catégorie Supérieure");
define("_NOTE_MOTHER_CATEGORY","Ne pas sélectionner si la catégorie est une catégorie principale");
define("_CATEGORY_UPDATED","Catégorie mise à jour");
define("_VENDOR_DELETED","Vendeur Supprimé");
define("_SHOW_SHOPS","Boutiques");
define("_ASSIGN_CATEGORY","Assigner une Catégorie");
define("_CATEGORY_ASSIGNED","Catégorie Assignée");
define("_ALREADY_ASSIGNED","Catégorie déjà assignée à ce Vendeur");
define("_ADDVENDOR","Ajouter un Vendeur");
define("_SUBMIT_ADD","Ajouter le Vendeur");
define("_ADDED_VENDOR","Vendeur ajouté");
define("_ERROR_LENGHT","Les champs suivants n'ont pas la longueur requise");
define("_ERROR_HOST","L'Url n'a pas un format correct");
define("_FORMAT_HOST","Ne pas inclure <b>http://</b>");
define("_CATEGORIES_PRODUCTS","Catégories de Produits");
define("_NOTE_CPATH","Cette variable facultative permet un lien à une catégorie spécifique de la Boutique");
define("_PATH_LOGO","Logo");
define("_SHOP_ADDRESS","Adresse, Tel ...");
define("_PATH_IMAGE_SHOP","Image de la Société");
define("_DESCR_SHOP_ENGLISH","Description en anglais");
define("_DESCR_SHOP_ITALIAN","Description en italien");
define("_DESCR_SHOP_SPANISH","Description en espagnol");
define("_PATH_IMAGE_PRODUCT","Image production");
define("_DESCR_PRODUCTION_ENGLISH","Production en anglais");
define("_DESCR_PRODUCTION_ITALIAN","Production en italien");
define("_DESCR_PRODUCTION_SPANISH","Production en espagnol");
define("_WIDHT_LOGO","Largeur du Logo");
define("_WIDHT_IMAGE_SHOP","Largeur de l'image de la Boutique");
define("_WIDHT_IMAGE_PRODUCTION","Largeur de l'image de la Production");

?>
