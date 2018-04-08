<?php
/*
  $Id: currencies.php,v 1.12 2003/06/25 20:36:48 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Devises');

define('TABLE_HEADING_CURRENCY_NAME', 'Devise');
define('TABLE_HEADING_CURRENCY_CODES', 'Code');
define('TABLE_HEADING_CURRENCY_VALUE', 'Valeur');
define('TABLE_HEADING_ACTION', 'Action');

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
define('TEXT_INFO_DELETE_INTRO', 'Etes-vous s&ucirc;r de vouloir supprimer cette devise&nbsp;?');
define('TEXT_INFO_HEADING_NEW_CURRENCY', 'Nouvelle devise');
define('TEXT_INFO_HEADING_EDIT_CURRENCY', 'Modifier la devise');
define('TEXT_INFO_HEADING_DELETE_CURRENCY', 'Supprimer la devise');
define('TEXT_INFO_SET_AS_DEFAULT', TEXT_SET_DEFAULT . ' (n&eacute;cessite une mise &agrave; jour manuelle des valeurs des devises)');
define('TEXT_INFO_CURRENCY_UPDATED', 'Le taux ce change pour %s (%s) a &eacute;t&eacute; correctement mis &agrave; jour via %s.');

define('ERROR_REMOVE_DEFAULT_CURRENCY', 'Erreur&nbsp;: La devise par d&eacute;faut ne peut pas &ecirc;tre supprim&eacute;e. Veuillez d\'abord d&eacute;finir une autre devise par d&eacute;faut puis essayer &agrave; nouveau.');
define('ERROR_CURRENCY_INVALID', 'Erreur&nbsp;: Le taux ce change pour %s (%s) n\'a &eacute;t&eacute; correctement mis &agrave; jour via %s. S\'agit-il d\'un code de devise valide&nbsp;?');
define('WARNING_PRIMARY_SERVER_FAILED', 'Attention&nbsp;: Le serveur primaire de taux de change (%s) a &eacute;chou&eacute; pour %s (%s) - tentative avec le serveur secondaire de taux de change.');
?>
