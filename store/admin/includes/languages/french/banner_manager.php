<?php
/*
  $Id: banner_manager.php,v 1.17 2002/08/18 18:54:47 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Gestionnaire de banni&egrave;res');

define('TABLE_HEADING_BANNERS', 'Banni&egrave;res');
define('TABLE_HEADING_GROUPS', 'Groupes');
define('TABLE_HEADING_STATISTICS', 'Affichages/Clics');
define('TABLE_HEADING_STATUS', 'Etat');
define('TABLE_HEADING_ACTION', 'Action');

define('TEXT_BANNERS_TITLE', 'Titre de la banni&egrave;re&nbsp;:');
define('TEXT_BANNERS_URL', 'URL de la banni&egrave;re&nbsp;:');
define('TEXT_BANNERS_GROUP', 'Groupe de la banni&egrave;re&nbsp;:');
define('TEXT_BANNERS_NEW_GROUP', ', ou indiquez ci-desssous un nouveau groupe de banni&egrave;res');
define('TEXT_BANNERS_IMAGE', 'Image&nbsp;:');
define('TEXT_BANNERS_IMAGE_LOCAL', ', ou indiquez ci-dessous un fichier local');
define('TEXT_BANNERS_IMAGE_TARGET', 'Destination de l\'image (Enregistrer sous)&nbsp;:');
define('TEXT_BANNERS_HTML_TEXT', 'Texte HTML&nbsp;:');
define('TEXT_BANNERS_EXPIRES_ON', 'Expire le&nbsp;:');
define('TEXT_BANNERS_OR_AT', ', ou apr&egrave;s');
define('TEXT_BANNERS_IMPRESSIONS', 'impressions/aper&ccedil;us.');
define('TEXT_BANNERS_SCHEDULED_AT', 'Pr&eacute;vu le&nbsp;:');
define('TEXT_BANNERS_BANNER_NOTE', '<b>Notes sur la banni&egrave;re&nbsp;:</b><ul><li>Utiliser une image ou un texte HTML pour la banni&egrave;re - mais pas les deux.</li><li>Le texte HTML a priorit&eacute; sur l\'image</li></ul>');
define('TEXT_BANNERS_INSERT_NOTE', '<b>Notes sur l\'image&nbsp;:</b><ul><li>Les r&eacute;pertoires de destination doivent avoir des droits d\'utilisateur (en &eacute;criture) correctement d&eacute;finis&nbsp;!</li><li>Ne renseignez pas le champs \'Enregistrer sous\' si vous ne t&eacute;l&eacute;chargez pas d\'image sur le serveur (c\'est &agrave; dire si vous utilisez une image locale (c&ocirc;t&eacute; serveur)).</li><li>Le champs \'Enregistrer sous\' doit &ecirc;tre un r&eacute;pertoire existant avec un slash en fin (ex. bannieres/).</li></ul>');
define('TEXT_BANNERS_EXPIRCY_NOTE', '<b>Notes sur l\'expiration&nbsp;:</b><ul><li>Un seul des deux champs doit &ecirc;tre renseign&eacute;</li><li>Si la banni&egrave;re n\'est pas pr&eacute;vue pour expirer automatiquement, laissez alors ces champs vides</li></ul>');
define('TEXT_BANNERS_SCHEDULE_NOTE', '<b>Notes sur la pr&eacute;vision&nbsp;:</b><ul><li>Si une date de pr&eacute;vision est d&eacute;finie, la banni&egrave;re sera activ&eacute;e &agrave; cette date.</li><li>Toutes les banni&egrave;res en pr&eacute;vision sont marqu&eacute;es d&eacute;sactiv&eacute;es jusqu\'&agrave; leur date de pr&eacute;vision, apr&egrave;s quoi elles sont marqu&eacute;es activ&eacute;es.</li></ul>');

define('TEXT_BANNERS_DATE_ADDED', 'Date d\'insertion&nbsp;:');
define('TEXT_BANNERS_SCHEDULED_AT_DATE', 'Pr&eacute;vu le&nbsp;: <b>%s</b>');
define('TEXT_BANNERS_EXPIRES_AT_DATE', 'Expire le&nbsp;: <b>%s</b>');
define('TEXT_BANNERS_EXPIRES_AT_IMPRESSIONS', 'Expire apr&egrave;s&nbsp;: <b>%s</b> impressions');
define('TEXT_BANNERS_STATUS_CHANGE', 'Changement d\'&eacute;tat&nbsp;: %s');

define('TEXT_BANNERS_DATA', 'D<br>A<br>T<br>A');
define('TEXT_BANNERS_LAST_3_DAYS', '3 derniers jours');
define('TEXT_BANNERS_BANNER_VIEWS', 'Affichages de banni&egrave;res');
define('TEXT_BANNERS_BANNER_CLICKS', 'Clics de banni&egrave;res');

define('TEXT_INFO_DELETE_INTRO', 'Etes-vous s&ucirc;r de vouloir supprimer cette banni&egrave;re&nbsp;?');
define('TEXT_INFO_DELETE_IMAGE', 'Supprimer l\'image de la banni&egrave;re');

define('SUCCESS_BANNER_INSERTED', 'Succ&egrave;s&nbsp;: La banni&egrave;re a &eacute;t&eacute; ins&eacute;r&eacute;e.');
define('SUCCESS_BANNER_UPDATED', 'Succ&egrave;s&nbsp;: La banni&egrave;re a &eacute;t&eacute; mise &agrave; jour.');
define('SUCCESS_BANNER_REMOVED', 'Succ&egrave;s&nbsp;: La banni&egrave;re a &eacute;t&eacute; supprim&eacute;e.');
define('SUCCESS_BANNER_STATUS_UPDATED', 'Succ&egrave;s&nbsp;: L\'&eacute;tat de la banni&egrave;re a &eacute;t&eacute; mis &agrave; jour.');

define('ERROR_BANNER_TITLE_REQUIRED', 'Erreur&nbsp;: Le titre de la banni&egrave;re est obligatoire.');
define('ERROR_BANNER_GROUP_REQUIRED', 'Erreur&nbsp;: Le groupe de la banni&egrave;re est obligatoire.');
define('ERROR_IMAGE_DIRECTORY_DOES_NOT_EXIST', 'Erreur&nbsp;: Le r&eacute;pertoire de destination n\'existe pas&nbsp;: %s');
define('ERROR_IMAGE_DIRECTORY_NOT_WRITEABLE', 'Erreur&nbsp;: Le r&eacute;pertoire de destination n\'est pas accessible en &eacute;criture&nbsp;: %s');
define('ERROR_IMAGE_DOES_NOT_EXIST', 'Erreur&nbsp;: L\'image n\'existe pas.');
define('ERROR_IMAGE_IS_NOT_WRITEABLE', 'Erreur&nbsp;: L\'image ne peut &ecirc;tre supprim&eacute;e.');
define('ERROR_UNKNOWN_STATUS_FLAG', 'Erreur&nbsp;: Indication d\'&eacute;tat inconnue.');

define('ERROR_GRAPHS_DIRECTORY_DOES_NOT_EXIST', 'Erreur&nbsp;: Le r&eacute;pertoire des graphiques n\'existe pas. Veuillez cr&eacute;er un r&eacute;pertoire \'graphs\' dans le r&eacute;pertoire \'images\'.');
define('ERROR_GRAPHS_DIRECTORY_NOT_WRITEABLE', 'Erreur&nbsp;: Le r&eacute;pertoire des graphiques n\'est pas accessible en &eacute;criture.');
?>