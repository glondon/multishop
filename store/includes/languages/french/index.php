<?php
/*
  $Id: index.php,v 1.1 2003/06/11 17:38:00 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

define('TEXT_MAIN', 'Ceci est la pr&eacute;sentation par d&eacute;faut du projet osCommerce, les produits propos&eacute;s le sont uniquement pour d&eacute;monstration, <b>aucun produit achet&eacute; ne sera livr&eacute; et le client ne sera pas factur&eacute;</b>. Toutes les informations affich&eacute;es pour ces produits doivent &ecirc;tre consid&eacute;r&eacute;es comme fictives.<br><br><table border="0" width="100%" cellspacing="5" cellpadding="2"><tr><td class="main" valign="top">' . tep_image(DIR_WS_IMAGES . 'default/1.gif') . '</td><td class="main" valign="top"><b>Messages d\'erreur</b><br><br>S\'il est affich&eacute; ci-dessus un quelconque message d\'erreur ou d\'avertissement, veullez commencer par le corriger avant de continuer.<br><br>Les messages d\'erreur sont affich&eacute;s au tout d&eacute;but de la page sur un <span class="messageStackError">fond</span> de couleur unie.<br><br>Plusieurs v&eacute;rifications sont faites pour s\'assurer du param&egrave;trage correct de votre boutique en ligne - ces v&eacute;rifications peuvent &ecirc;tre d&eacute;sactiv&eacute;es en modifiant les param&egrave;tres concern&eacute;s au bas du fichier  includes/application_top.php.</td></tr><td class="main" valign="top">' . tep_image(DIR_WS_IMAGES . 'default/2.gif') . '</td><td class="main" valign="top"><b>Modifier les textes des pages</b><br><br>Ce texte peut &ecirc;tre modifi&eacute;, pour chaque langue, dans le fichier suivant&nbsp;:<br><br><nobr class="messageStackSuccess">[chemin vers catalogue]/includes/languages/' . $language . '/' . FILENAME_DEFAULT . '</nobr><br><br>Ce fichier peut &ecirc;tre &eacute;dit&eacute; manuellement ou via le panneau d\'administration dans le menu <nobr class="messageStackSuccess">Langues->' . ucfirst($language) . '->D&eacute;finir</nobr> ou dans le module <nobr class="messageStackSuccess">Outils->Gestion fichiers</nobr>.<br><br>Le texte est d&eacute;fini de la mani&egrave;re suivante&nbsp;:<br><br><nobr>define(\'TEXT_MAIN\', \'<span class="messageStackSuccess">Ceci est la pr&eacute;sentation par d&eacute;faut du projet osCommerce...</span>\');</nobr><br><br>Le text surlign&eacute; en vert peut &ecirc;tre modifi&eacute; - il est important de laisser le define() du mot-clef TEXT_MAIN. Pour supprimer compl&egrave;tement le texte pour TEXT_MAIN, il faut utiliser l\'exemple suivant avec simplement deux guillemets simples&nbsp;:<br><br><nobr>define(\'TEXT_MAIN\', \'\');</nobr><br><br>Plus d\'informations sur l\'utilsation de la fonction PHP define() peuvent &ecirc;tre consult&eacute;es <a href="http://www.php.net/define" target="_blank"><u>ici</u></a>.</td></tr><tr><td class="main" valign="top">' . tep_image(DIR_WS_IMAGES . 'default/3.gif') . '</td><td class="main" valign="top"><b>S&eacute;curiser le panneau d\'administration</b><br><br>Il est important de s&eacute;curiser le panneau d\'administration car il n\'existe actuellement aucune impl&eacute;mentation de s&eacute;curit&eacute;.</td></tr><tr><td class="main" valign="top">' . tep_image(DIR_WS_IMAGES . 'default/4.gif') . '</td><td class="main" valign="top"><b>Documentation en ligne</b><br><br>Une documention en ligne peut &ecirc;tre consult&eacute;e sur le site <a href="http://wiki.oscommerce.com" target="_blank"><u>osCommerce Wiki Documentation Effort</u></a>.<br><br>Un support communautaire est disponible sur le site <a href="http://forums.oscommerce.com" target="_blank"><u>osCommerce Community Support Forums</u></a>.</td></tr></table><br>Si vous d&eacute;sirez t&eacute;l&eacute;charger le programme de cette boutique en ligne ou si vous voulez contribuer au projet osCommerce, veuillez visitez le site <a href="http://www.oscommerce.com" target="_blank"><u>support d\' osCommerce</u></a>. Cette boutique tourne sous le version <font color="#f0000"><b>' . PROJECT_VERSION . '</b></font> d\'osCommerce.');
define('TABLE_HEADING_NEW_PRODUCTS', 'Nouveaux produits pour %s');
define('TABLE_HEADING_UPCOMING_PRODUCTS', 'Produits &agrave; venir');
define('TABLE_HEADING_DATE_EXPECTED', 'Date pr&eacute;vue');

if ( ($category_depth == 'products') || ($HTTP_GET_VARS['manufacturers_id']) ) {
  define('HEADING_TITLE', 'Voyons ce que nous avons-l&agrave;');
  define('TABLE_HEADING_IMAGE', '');
  define('TABLE_HEADING_MODEL', 'Mod&egrave;le');
  define('TABLE_HEADING_PRODUCTS', 'Nom du produit');
  define('TABLE_HEADING_MANUFACTURER', 'Fabricant');
  define('TABLE_HEADING_QUANTITY', 'Quantit&eacute;');
  define('TABLE_HEADING_PRICE', 'Prix');
  define('TABLE_HEADING_WEIGHT', 'Poids');
  define('TABLE_HEADING_BUY_NOW', 'Acheter maintenant');
  define('TEXT_NO_PRODUCTS', 'Il n\'y a aucun produit dans cette cat&eacute;gorie.');
  define('TEXT_NO_PRODUCTS2', 'Il n\'y a aucun produit de ce fabricant.');
  define('TEXT_NUMBER_OF_PRODUCTS', 'Nombre de produits&nbsp;: ');
  define('TEXT_SHOW', '<b>Voir&nbsp;:</b>');
  define('TEXT_BUY', 'Acheter 1 \'');
  define('TEXT_NOW', '\' maintenant');
  define('TEXT_ALL_CATEGORIES', 'Toutes cat&eacute;gories');
  define('TEXT_ALL_MANUFACTURERS', 'Tous fabricants');
} elseif ($category_depth == 'top') {
  define('HEADING_TITLE', 'Quoi de neuf&nbsp;?');
} elseif ($category_depth == 'nested') {
  define('HEADING_TITLE', 'Cat&eacute;gories');
}
?>
