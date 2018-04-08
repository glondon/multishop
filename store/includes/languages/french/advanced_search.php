<?php
/*
  $Id: advanced_search.php,v 1.15 2003/07/08 16:45:35 dgw_ Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE_1', 'Recherche avanc&eacute;e');
define('NAVBAR_TITLE_2', 'R&eacute;sultats');

define('HEADING_TITLE_1', 'Recherche avanc&eacute;e');
define('HEADING_TITLE_2', 'Produits correspondant aux crit&egrave;res de recherche');

define('HEADING_SEARCH_CRITERIA', 'Crit&egrave;res de recherche');

define('TEXT_SEARCH_IN_DESCRIPTION', 'Rechercher dans les descriptions de produits');
define('ENTRY_CATEGORIES', 'Cat&eacute;gories&nbsp;:');
define('ENTRY_INCLUDE_SUBCATEGORIES', 'Inclure les sous-cat&eacute;gories');
define('ENTRY_MANUFACTURERS', 'Fabricants&nbsp;:');
define('ENTRY_PRICE_FROM', 'Prix &agrave; partir de&nbsp;:');
define('ENTRY_PRICE_TO', 'Prix jusqu\'&agrave;&nbsp;:');
define('ENTRY_DATE_FROM', 'Date &agrave; partir de&nbsp;:');
define('ENTRY_DATE_TO', 'Date jusqu\'&agrave;&nbsp;:');

define('TEXT_SEARCH_HELP_LINK', '<u>Aide Recherche</u> [?]');

define('TEXT_ALL_CATEGORIES', 'Toutes cat&eacute;gories');
define('TEXT_ALL_MANUFACTURERS', 'Tous fabricants');

define('HEADING_SEARCH_HELP', 'Aide Recherche');
define('TEXT_SEARCH_HELP', 'Les mots-clef peuvent &ecirc;tre reli&eacute;s par AND et/ou ET pour un meilleur affinage du r&eacute;sultat.<br><br>Par exemple, <u>Microsoft AND souris</u> retournera un r&eacute;sultat contenant les deux mots. Cependant, pour <u>souris OR clavier</u>, les r&eacute;sultats retourn&eacute;s pourront contenir l\'un ou l\'autre mot ou les deux.<br><br>Une correspondance exacte sera obtenue en mettant entre guillemets-doubles les mots-clef.<br><br>Par exemple, <u>"ordinateur portable"</u> retournera un r&eacute;sultat o&ugrave; l\'expression appara&icirc;t exactement telle que.<br><br>Les parenth&egrave;ses peuvent &ecirc;tre utilis&eacute;es pour un contr&ocirc;le plus pr&eacute;cis du r&eacute;sultat.<br><br>Par exemple, <u>Microsoft AND (clavier OR souris OR "Visual basic")</u>.');
define('TEXT_CLOSE_WINDOW', '<u>Fermer la fen&ecirc;tre</u> [x]');

define('TABLE_HEADING_IMAGE', '');
define('TABLE_HEADING_MODEL', 'Mod&egrave;le');
define('TABLE_HEADING_PRODUCTS', 'Nom du produit');
define('TABLE_HEADING_MANUFACTURER', 'Fabricant');
define('TABLE_HEADING_QUANTITY', 'Quantit&eacute;');
define('TABLE_HEADING_PRICE', 'Prix');
define('TABLE_HEADING_WEIGHT', 'Poids');
define('TABLE_HEADING_BUY_NOW', 'Acheter');

define('TEXT_NO_PRODUCTS', 'Il n\'y a aucun produit correspondant aux crit&egrave;res de recherche.');

define('ERROR_AT_LEAST_ONE_INPUT', 'Au moins un des champs du formulaire de recherche doit &ecirc;tre renseign&eacute;.');
define('ERROR_INVALID_FROM_DATE', 'Date &agrave; partir de invalide.');
define('ERROR_INVALID_TO_DATE', 'Date jusqu\'&agrave; invalide.');
define('ERROR_TO_DATE_LESS_THAN_FROM_DATE', 'La date jusqu\'&agrave; doit &ecirc;tre &eacute;gale ou sup&eacute;rieure &agrave; Date &agrave; partir de.');
define('ERROR_PRICE_FROM_MUST_BE_NUM', 'Prix &agrave; partir de doit &ecirc;tre un nombre.');
define('ERROR_PRICE_TO_MUST_BE_NUM', 'Prix jusqu\'&agrave; doit &ecirc;tre un nombre.');
define('ERROR_PRICE_TO_LESS_THAN_PRICE_FROM', 'Prix jusqu\'&agrave; doit &ecirc;tre &eacute;gal ou sup&eacute;rieur &agrave; Prix &agrave; partir de.');
define('ERROR_INVALID_KEYWORDS', 'Mots-clef invalides.');
?>
