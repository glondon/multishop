<?php
/*
  $Id: orders_status.php,v 1.5 2002/01/29 14:43:00 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Etat de commande');

define('TABLE_HEADING_ORDERS_STATUS', 'Etat de commande');
define('TABLE_HEADING_ACTION', 'Action');

define('TEXT_INFO_EDIT_INTRO', 'Veuillez effectuer ici tous changements n&eacute;cessaires');
define('TEXT_INFO_ORDERS_STATUS_NAME', 'Etat de commande&nbsp;:');
define('TEXT_INFO_INSERT_INTRO', 'Veuillez compl&eacute;ter les donn&eacute;es suivantes pour le nouvel &eacute;tat de commande.');
define('TEXT_INFO_DELETE_INTRO', 'Etes-vous s&ucirc;r de vouloir supprimer cet &eacute;tat de commande&nbsp;?');
define('TEXT_INFO_HEADING_NEW_ORDERS_STATUS', 'Nouvel &eacute;tat de commande');
define('TEXT_INFO_HEADING_EDIT_ORDERS_STATUS', 'Modifier l\'&eacute;tat de commande');
define('TEXT_INFO_HEADING_DELETE_ORDERS_STATUS', 'Supprimer l\'&eacute;tat de commande');

define('ERROR_REMOVE_DEFAULT_ORDER_STATUS', 'Erreur&nbsp;: L\'&eacute;tat de commnande par d&eacute;faut ne peut pas &ecirc;tre supprim&eacute;. Veuillez d\'abord d&eacute;finir un autre &eacute;tat de commande par d&eacute;faut puis essayer &agrave; nouveau.');
define('ERROR_STATUS_USED_IN_ORDERS', 'Erreur&nbsp;: Cet &eacute;tat de commande est actuellement utilis&eacute; pour certainnes commandes.');
define('ERROR_STATUS_USED_IN_HISTORY', 'Erreur&nbsp;: Cet &eacute;tat de commande est actuellement utilis&eacute; dans l\'historique des &eacute;tats de commande.');
?>