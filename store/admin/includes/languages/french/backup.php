<?php
/*
  $Id: backup.php,v 1.16 2002/03/16 21:30:02 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Gestionnaire de sauvegarde');

define('TABLE_HEADING_TITLE', 'Titre');
define('TABLE_HEADING_FILE_DATE', 'Date');
define('TABLE_HEADING_FILE_SIZE', 'Taille');
define('TABLE_HEADING_ACTION', 'Action');

define('TEXT_INFO_HEADING_NEW_BACKUP', 'Nouvelle sauvegarde');
define('TEXT_INFO_HEADING_RESTORE_LOCAL', 'Restauration locale');
define('TEXT_INFO_NEW_BACKUP', 'N\'interrompez pas le processus de sauvegarde qui peut durer plusieurs minutes.');
define('TEXT_INFO_UNPACK', '<br><br>(apr&egrave;s d&eacute;compactage du fichier depuis de l\'archive)');
define('TEXT_INFO_RESTORE', 'N\'interrompez pas le processus de restauration.<br><br>Plus volumineuse est la sauvegarde, plus longue sera la restauration&nbsp;!<br><br>Si possible, utilisez le client mysql.<br><br>Par exemple&nbsp;:<br><br><b>mysql -h' . DB_SERVER . ' -u' . DB_SERVER_USERNAME . ' -p ' . DB_DATABASE . ' < %s </b> %s');
define('TEXT_INFO_RESTORE_LOCAL', 'N\'interrompez pas le processus de restauration.<br><br>Plus volumineuse est la sauvegarde, plus longue sera la restauration&nbsp;!');
define('TEXT_INFO_RESTORE_LOCAL_RAW_FILE', 'Le fichier &agrave; t&eacute;l&eacute;charger doit &ecirc;tre un fichier au format sql (texte) brut.');
define('TEXT_INFO_DATE', 'Date&nbsp;:');
define('TEXT_INFO_SIZE', 'Taille&nbsp;:');
define('TEXT_INFO_COMPRESSION', 'Compression&nbsp;:');
define('TEXT_INFO_USE_GZIP', 'Utiliser GZIP');
define('TEXT_INFO_USE_ZIP', 'Utiliser ZIP');
define('TEXT_INFO_USE_NO_COMPRESSION', 'Pas de compression (SQL brut)');
define('TEXT_INFO_DOWNLOAD_ONLY', 'T&eacute;l&eacute;charger uniquement (pas d\'enregistrement c&ocirc;t&eacute; serveur)');
define('TEXT_INFO_BEST_THROUGH_HTTPS', 'Meilleur avec une connexion HTTPS');
define('TEXT_DELETE_INTRO', 'Etes-vous s&ucirc;r de vouloir supprimer cette sauvegarde&nbsp;?');
define('TEXT_NO_EXTENSION', 'Aucune');
define('TEXT_BACKUP_DIRECTORY', 'R&eacute;pertoire de sauvegarde&nbsp;:');
define('TEXT_LAST_RESTORATION', 'Derni&egrave;re restauration&nbsp;:');
define('TEXT_FORGET', '(<u>oubli&eacute;</u>)');

define('ERROR_BACKUP_DIRECTORY_DOES_NOT_EXIST', 'Erreur&nbsp;: Le r&eacute;pertoire de sauvegarde n\'existe pas. Veuillez le d&eacute;finir dans le fichier de configuration configure.php.');
define('ERROR_BACKUP_DIRECTORY_NOT_WRITEABLE', 'Erreur&nbsp;: Le r&eacute;pertoire de sauvagarde n\'est pas accessible en &eacute;criture.');
define('ERROR_DOWNLOAD_LINK_NOT_ACCEPTABLE', 'Erreur&nbsp;: Le lien de t&eacute;l&eacute;chargement n\'est pas accessible.');

define('SUCCESS_LAST_RESTORE_CLEARED', 'Succ&egrave;s&nbsp;: La date de la derni&egrave;re restauration a &eacute;t&eacute; effac&eacute;e.');
define('SUCCESS_DATABASE_SAVED', 'Succ&egrave;s&nbsp;: La base de donn&eacute;es a &eacute;t&eacute; sauvegard&eacute;e.');
define('SUCCESS_DATABASE_RESTORED', 'Succ&egrave;s&nbsp;: La base de donn&eacute;es a &eacute;t&eacute; restaur&eacute;e.');
define('SUCCESS_BACKUP_DELETED', 'Succ&egrave;s&nbsp;: La sauvegarde a &eacute;t&eacute; supprim&eacute;e.');
?>