<?php
/*
  $Id: newsletters.php,v 1.5 2002/03/08 22:10:08 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Gestionnaire de newsletters');

define('TABLE_HEADING_NEWSLETTERS', 'Newsletters');
define('TABLE_HEADING_SIZE', 'Taille');
define('TABLE_HEADING_MODULE', 'Module');
define('TABLE_HEADING_SENT', 'Envoy&eacute;e');
define('TABLE_HEADING_STATUS', 'Etat');
define('TABLE_HEADING_ACTION', 'Action');

define('TEXT_NEWSLETTER_MODULE', 'Module&nbsp;:');
define('TEXT_NEWSLETTER_TITLE', 'Titre de la newsletter&nbsp;:');
define('TEXT_NEWSLETTER_CONTENT', 'Contenu&nbsp;:');

define('TEXT_NEWSLETTER_DATE_ADDED', 'Date d\'insertion&nbsp;:');
define('TEXT_NEWSLETTER_DATE_SENT', 'Date d\'envoi&nbsp;:');

define('TEXT_INFO_DELETE_INTRO', 'Etes-vous s&ucirc;r de vouloir supprimer cette newsletter&nbsp;?');

define('TEXT_PLEASE_WAIT', 'Veuillez patienter ... envoi des emails ...<br><br>Veuillez ne pas interrompre le processus&nbsp;!');
define('TEXT_FINISHED_SENDING_EMAILS', 'Envoi des emails termin&eacute;&nbsp;!');

define('ERROR_NEWSLETTER_TITLE', 'Erreur&nbsp;: Le titre de la newsletter est obligatoire');
define('ERROR_NEWSLETTER_MODULE', 'Erreur&nbsp;: Le module de newsletter est obligatoire');
define('ERROR_REMOVE_UNLOCKED_NEWSLETTER', 'Erreur&nbsp;: Veuillez v&eacute;rouiller la newsletter avant de l\'effacer.');
define('ERROR_EDIT_UNLOCKED_NEWSLETTER', 'Erreur&nbsp;: Veuillez v&eacute;rouiller la newsletter avant de la modifier.');
define('ERROR_SEND_UNLOCKED_NEWSLETTER', 'Erreur&nbsp;: Veuillez v&eacute;rouiller la newsletter avant de la supprimer.');
?>