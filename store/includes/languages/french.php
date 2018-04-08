<?php
/*
  $Id: french.php,v 1.1 2005/09/27 10:47:48 tropic Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

/*
// look in your $PATH_LOCALE/locale directory for available locales..
// on RedHat6.0 I used 'en_US'
// on FreeBSD 4.0 I use 'en_US.ISO_8859-1'
// this may not work under win32 environments..
setlocale(LC_TIME, 'en_US.ISO_8859-1');
define('DATE_FORMAT_SHORT', '%m/%d/%Y');  // this is used for strftime()
define('DATE_FORMAT_LONG', '%A %d %B, %Y'); // this is used for strftime()
define('DATE_FORMAT', 'm/d/Y'); // this is used for date()
define('PHP_DATE_TIME_FORMAT', 'm/d/Y H:i:s'); // this is used for date()
define('DATE_TIME_FORMAT', DATE_FORMAT_SHORT . ' %H:%M:%S');

////
// Return date in raw format
// $date should be in format mm/dd/yyyy
// raw date is in format YYYYMMDD, or DDMMYYYY
function tep_date_raw($date, $reverse = false) {
  if ($reverse) {
    return substr($date, 3, 2) . substr($date, 0, 2) . substr($date, 6, 4);
  } else {
    return substr($date, 6, 4) . substr($date, 0, 2) . substr($date, 3, 2);
  }
}
*/

// parse le système d'exploitation
function jc_get_system() {
	$sys = php_uname();
	if (stristr($sys, "Linux"))
		$system = "linux";
	if (stristr($sys, "Windows"))
		$system = "windows";
	if (stristr($sys, "FreeBSD"))
		$system = "freebsd";
	if (stristr($sys, "Macintosh"))
		$system = "macintosh";
	return $system;	
}

$system = jc_get_system();
switch ($system) {
	case "freebsd":
	case "macintosh":
		@setlocale(LC_TIME, "fr_FR.ISO_8859-1");
		break;
	case "windows":
		@setlocale(LC_TIME, "fr");
		break;
	default:
		@setlocale(LC_TIME, "fr_FR");
		break;
}
		
define('DATE_FORMAT_SHORT', '%d/%m/%Y');  // this is used for strftime()
define('DATE_FORMAT_LONG', '%A %d %B %Y'); // this is used for strftime()
define('DATE_FORMAT', 'd/m/Y'); // this is used for date()
define('PHP_DATE_TIME_FORMAT', 'd/m/Y H:i:s'); // this is used for date()
define('DATE_TIME_FORMAT', DATE_FORMAT_SHORT . ' %H:%M:%S');

// Retourne date au format brut
// $date doit etre au format dd/mm/yyyy (francais)
// Date au format burt est de la forme YYYYMMDD, or DDMMYYYY
function tep_date_raw($date, $reverse = false) {
  if ($reverse) {
    return substr($date, 0, 2) . substr($date, 3, 2) . substr($date, 6, 4);
  } else {
    return substr($date, 6, 4) . substr($date, 3, 2) . substr($date, 0, 2);
  }
}

// if USE_DEFAULT_LANGUAGE_CURRENCY is true, use the following currency, instead of the applications default currency (used when changing language)
define('LANGUAGE_CURRENCY', 'EUR');

// Global entries for the <html> tag
define('HTML_PARAMS','dir="LTR" lang="fr"');

// charset for web pages and emails
define('CHARSET', 'iso-8859-1');

// page title
define('TITLE', 'shop [store-side of Php-Multishop]');

// header text in includes/header.php
define('HEADER_TITLE_CREATE_ACCOUNT', 'Cr&eacute;er un compte');
define('HEADER_TITLE_MY_ACCOUNT', 'Mon compte');
define('HEADER_TITLE_CART_CONTENTS', 'Panier');
define('HEADER_TITLE_CHECKOUT', 'Commander');
define('HEADER_TITLE_TOP', 'Accueil');
define('HEADER_TITLE_CATALOG', 'Catalogue');
define('HEADER_TITLE_LOGOFF', 'Quitter');
define('HEADER_TITLE_LOGIN', 'S\'identifier');

// footer text in includes/footer.php
define('FOOTER_TEXT_REQUESTS_SINCE', 'visites depuis le ');

// text for gender
define('MALE', 'Homme');
define('FEMALE', 'Femme');
define('MALE_ADDRESS', 'M.');
define('FEMALE_ADDRESS', 'Mme');

// text for date of birth example
define('DOB_FORMAT_STRING', 'jj/mm/aaaa');

// categories box text in includes/boxes/categories.php
define('BOX_HEADING_CATEGORIES', 'Cat&eacute;gories');

// manufacturers box text in includes/boxes/manufacturers.php
define('BOX_HEADING_MANUFACTURERS', 'Fabricants');

// whats_new box text in includes/boxes/whats_new.php
define('BOX_HEADING_WHATS_NEW', 'Quoi de neuf&nbsp;?');

// quick_find box text in includes/boxes/quick_find.php
define('BOX_HEADING_SEARCH', 'Rechercher');
define('BOX_SEARCH_TEXT', 'Mots-clef pour trouver un produit');
define('BOX_SEARCH_ADVANCED_SEARCH', 'Recherche avanc&eacute;e');

// specials box text in includes/boxes/specials.php
define('BOX_HEADING_SPECIALS', 'Promotions');

// reviews box text in includes/boxes/reviews.php
define('BOX_HEADING_REVIEWS', 'Critiques');
define('BOX_REVIEWS_WRITE_REVIEW', 'Ecrire une critique sur ce produit');
define('BOX_REVIEWS_NO_REVIEWS', 'Il n\'y a aucune critique de produit');
define('BOX_REVIEWS_TEXT_OF_5_STARS', '%s &eacute;toiles sur 5');

// shopping_cart box text in includes/boxes/shopping_cart.php
define('BOX_HEADING_SHOPPING_CART', 'Panier');
define('BOX_SHOPPING_CART_EMPTY', '... Vide');

// order_history box text in includes/boxes/order_history.php
define('BOX_HEADING_CUSTOMER_ORDERS', 'Historique des commandes');

// best_sellers box text in includes/boxes/best_sellers.php
define('BOX_HEADING_BESTSELLERS', 'Meilleures ventes');
define('BOX_HEADING_BESTSELLERS_IN', 'Meilleures ventes dans<br>&nbsp;&nbsp;');

// notifications box text in includes/boxes/products_notifications.php
define('BOX_HEADING_NOTIFICATIONS', 'Notifications');
define('BOX_NOTIFICATIONS_NOTIFY', 'Avertissez-moi des mises &agrave; jour de <b>%s</b>');
define('BOX_NOTIFICATIONS_NOTIFY_REMOVE', 'Ne m\'avertissez pas des mises &agrave; jour de <b>%s</b>');

// manufacturer box text
define('BOX_HEADING_MANUFACTURER_INFO', 'Information fabricants');
define('BOX_MANUFACTURER_INFO_HOMEPAGE', 'Page d\'accueil de %s');
define('BOX_MANUFACTURER_INFO_OTHER_PRODUCTS', 'Autres produits');

// languages box text in includes/boxes/languages.php
define('BOX_HEADING_LANGUAGES', 'Langues');

// currencies box text in includes/boxes/currencies.php
define('BOX_HEADING_CURRENCIES', 'Devises');

// information box text in includes/boxes/information.php
define('BOX_HEADING_INFORMATION', 'Information');
define('BOX_INFORMATION_PRIVACY', 'Confidentialit&eacute;');
define('BOX_INFORMATION_CONDITIONS', 'Conditions d\'utilisation');
define('BOX_INFORMATION_SHIPPING', 'Livraison & retour');
define('BOX_INFORMATION_CONTACT', 'Nous contacter');

// tell a friend box text in includes/boxes/tell_a_friend.php
define('BOX_HEADING_TELL_A_FRIEND', 'Avertir un ami');
define('BOX_TELL_A_FRIEND_TEXT', 'Informer une connaissance sur ce produit');

// checkout procedure text
define('CHECKOUT_BAR_DELIVERY', 'Information de livraison');
define('CHECKOUT_BAR_PAYMENT', 'Information de paiement');
define('CHECKOUT_BAR_CONFIRMATION', 'Validation');
define('CHECKOUT_BAR_FINISHED', 'Fin&nbsp;!');

// pull down default text
define('PULL_DOWN_DEFAULT', 'S&eacute;lectionnez...');
define('TYPE_BELOW', 'Tapez ci-dessous');

// javascript messages
define('JS_ERROR', 'Erreur dans le traitement de votre formulaire !\nVeuillez faire les corrections suivantes :\n\n');

define('JS_REVIEW_TEXT', '* La \'critique\' doit avoir au moins ' . REVIEW_TEXT_MIN_LENGTH . ' caractères.\n');
define('JS_REVIEW_RATING', '* Vous devez noter le produit dans votre critique.\n');

define('JS_ERROR_NO_PAYMENT_MODULE_SELECTED', '* Veuillez sélectionner un moyen de paiement pour votre commande.\n');

define('JS_ERROR_SUBMITTED', 'Ce formulaire a déjà été soumis. Veuillez cliquer sur OK et attendez que le processus se termine.');

define('ERROR_NO_PAYMENT_MODULE_SELECTED', 'Veuillez s&eacute;lectionner un moyen de paiement pour votre commande.');

define('CATEGORY_COMPANY', 'D&eacute;tails de la soci&eacute;t&eacute;');
define('CATEGORY_PERSONAL', 'Vos d&eacute;tails personnels');
define('CATEGORY_ADDRESS', 'Votre domiciliation');
define('CATEGORY_CONTACT', 'Pour vous contacter');
define('CATEGORY_OPTIONS', 'Options');
define('CATEGORY_PASSWORD', 'Votre mot de passe');

define('ENTRY_COMPANY', 'Soci&eacute;t&eacute;&nbsp;:');
define('ENTRY_COMPANY_ERROR', '');
define('ENTRY_COMPANY_TEXT', '');
define('ENTRY_GENDER', 'Genre&nbsp;:');
define('ENTRY_GENDER_ERROR', 'Veuillez s&eacute;lectionner votre genre.');
define('ENTRY_GENDER_TEXT', '*');
define('ENTRY_FIRST_NAME', 'Pr&eacute;nom&nbsp;:');
define('ENTRY_FIRST_NAME_ERROR', 'Votre pr&eacute;nom doit avoir un minimum de ' . ENTRY_FIRST_NAME_MIN_LENGTH . ' caract&egrave;res.');
define('ENTRY_FIRST_NAME_TEXT', '*');
define('ENTRY_LAST_NAME', 'Nom&nbsp;:');
define('ENTRY_LAST_NAME_ERROR', 'Votre nom doit avoir un minimum de ' . ENTRY_LAST_NAME_MIN_LENGTH . ' caract&egrave;res.');
define('ENTRY_LAST_NAME_TEXT', '*');
define('ENTRY_DATE_OF_BIRTH', 'Date de naissance&nbsp;:');
define('ENTRY_DATE_OF_BIRTH_ERROR', 'Votre date de naissance doit &ecirc;tre au format&nbsp;: DD/MM/YYYY (ex. 21/05/1970)');
define('ENTRY_DATE_OF_BIRTH_TEXT', '* (ex. 21/05/1970)');
define('ENTRY_EMAIL_ADDRESS', 'Adresse email&nbsp;:');
define('ENTRY_EMAIL_ADDRESS_ERROR', 'Votre adresse email doit avoir un minimum de ' . ENTRY_EMAIL_ADDRESS_MIN_LENGTH . ' caract&egrave;res.');
define('ENTRY_EMAIL_ADDRESS_CHECK_ERROR', 'Votre adresse email ne semble pas valide - veuillez faire les corrections n&eacute;cessaires.');
define('ENTRY_EMAIL_ADDRESS_ERROR_EXISTS', 'Votre adresse email existe d&eacute;j&agrave; dans nos enregistrements - veuillez vous identifiez avec cette adresse ou cr&eacute;er un nouveau compte avec une autre adresse email.');
define('ENTRY_EMAIL_ADDRESS_TEXT', '*');
define('ENTRY_STREET_ADDRESS', 'Adresse&nbsp;:');
define('ENTRY_STREET_ADDRESS_ERROR', 'Votre adresse doit avoir un minimum de ' . ENTRY_STREET_ADDRESS_MIN_LENGTH . ' caract&egrave;res.');
define('ENTRY_STREET_ADDRESS_TEXT', '*');
define('ENTRY_SUBURB', 'Comp. adresse&nbsp;:');
define('ENTRY_SUBURB_ERROR', '');
define('ENTRY_SUBURB_TEXT', '');
define('ENTRY_POST_CODE', 'Code postal&nbsp;:');
define('ENTRY_POST_CODE_ERROR', 'Votre code postal doit avoir un minimum de ' . ENTRY_POSTCODE_MIN_LENGTH . ' caract&egrave;res.');
define('ENTRY_POST_CODE_TEXT', '*');
define('ENTRY_CITY', 'Ville&nbsp;:');
define('ENTRY_CITY_ERROR', 'Votre ville doit avoir un minimum de ' . ENTRY_CITY_MIN_LENGTH . ' caract&egrave;res.');
define('ENTRY_CITY_TEXT', '*');
define('ENTRY_STATE', 'R&eacute;gion&nbsp;:');
define('ENTRY_STATE_ERROR', 'Votre r&eacute;gion doit avoir un minimum de ' . ENTRY_STATE_MIN_LENGTH . ' caract&egrave;res.');
define('ENTRY_STATE_ERROR_SELECT', 'Veuillez s&eacute;lectionner une r&eacute;gion dans la liste d&eacute;roulante des r&eacute;gions.');
define('ENTRY_STATE_TEXT', '*');
define('ENTRY_COUNTRY', 'Pays&nbsp;:');
define('ENTRY_COUNTRY_ERROR', 'Vous devez s&eacute;lectionner un pays dans la liste d&eacute;roulante des pays.');
define('ENTRY_COUNTRY_TEXT', '*');
define('ENTRY_TELEPHONE_NUMBER', 'T&eacute;l&eacute;phone&nbsp;:');
define('ENTRY_TELEPHONE_NUMBER_ERROR', 'Votre t&eacute;l&eacute;phone doit avoir un minimum de ' . ENTRY_TELEPHONE_MIN_LENGTH . ' caract&egrave;res.');
define('ENTRY_TELEPHONE_NUMBER_TEXT', '*');
define('ENTRY_FAX_NUMBER', 'Fax&nbsp;:');
define('ENTRY_FAX_NUMBER_ERROR', '');
define('ENTRY_FAX_NUMBER_TEXT', '');
define('ENTRY_NEWSLETTER', 'Newsletter&nbsp;:');
define('ENTRY_NEWSLETTER_TEXT', '');
define('ENTRY_NEWSLETTER_YES', 'S\'inscrire');
define('ENTRY_NEWSLETTER_NO', 'Se d&eacute;sinscrire');
define('ENTRY_NEWSLETTER_ERROR', '');
define('ENTRY_PASSWORD', 'Mot de passe&nbsp;:');
define('ENTRY_PASSWORD_ERROR', 'Votre mot de passe doit avoir un minimum de ' . ENTRY_PASSWORD_MIN_LENGTH . ' caract&egrave;res.');
define('ENTRY_PASSWORD_ERROR_NOT_MATCHING', 'La confirmation du mot de passe doit correspondre &agrave; votre mot de passe.');
define('ENTRY_PASSWORD_TEXT', '*');
define('ENTRY_PASSWORD_CONFIRMATION', 'Confirmation&nbsp;:');
define('ENTRY_PASSWORD_CONFIRMATION_TEXT', '*');
define('ENTRY_PASSWORD_CURRENT', 'Mot de passe actuel&nbsp;:');
define('ENTRY_PASSWORD_CURRENT_TEXT', '*');
define('ENTRY_PASSWORD_CURRENT_ERROR', 'Votre mot de passe doit avoir un minimum de ' . ENTRY_PASSWORD_MIN_LENGTH . ' caract&egrave;res.');
define('ENTRY_PASSWORD_NEW', 'Nouveau mot de passe&nbsp;:');
define('ENTRY_PASSWORD_NEW_TEXT', '*');
define('ENTRY_PASSWORD_NEW_ERROR', 'Votre nouveau mot de passe doit avoir un minimum de ' . ENTRY_PASSWORD_MIN_LENGTH . ' caract&egrave;res.');
define('ENTRY_PASSWORD_NEW_ERROR_NOT_MATCHING', 'La confirmtion du mot de passe doit correspondre &agrave; votre nouveau mot de passe.');
define('PASSWORD_HIDDEN', '--MASQUER--');

define('FORM_REQUIRED_INFORMATION', '* Information obligatoire');

// constants for use in tep_prev_next_display function
define('TEXT_RESULT_PAGE', 'Page&nbsp;:');
define('TEXT_DISPLAY_NUMBER_OF_PRODUCTS', 'Voir de <b>%d</b> &agrave; <b>%d</b> (sur <b>%d</b> produits)');
define('TEXT_DISPLAY_NUMBER_OF_ORDERS', 'Voir de <b>%d</b> &agrave; <b>%d</b> (sur <b>%d</b> commandes)');
define('TEXT_DISPLAY_NUMBER_OF_REVIEWS', 'Voir de <b>%d</b> &agrave; <b>%d</b> (sur <b>%d</b> critiques)');
define('TEXT_DISPLAY_NUMBER_OF_PRODUCTS_NEW', 'Voir de <b>%d</b> &agrave; <b>%d</b> (sur <b>%d</b> nouveaux produits)');
define('TEXT_DISPLAY_NUMBER_OF_SPECIALS', 'Voir de <b>%d</b> &agrave; <b>%d</b> (sur <b>%d</b> promotions)');

define('PREVNEXT_TITLE_FIRST_PAGE', 'Premi&egrave;re Page');
define('PREVNEXT_TITLE_PREVIOUS_PAGE', 'Page Pr&eacute;c&eacute;dente');
define('PREVNEXT_TITLE_NEXT_PAGE', 'Page Suivante');
define('PREVNEXT_TITLE_LAST_PAGE', 'Derni&egrave;re Page');
define('PREVNEXT_TITLE_PAGE_NO', 'Page %d');
define('PREVNEXT_TITLE_PREV_SET_OF_NO_PAGE', 'Retour de %d Pages');
define('PREVNEXT_TITLE_NEXT_SET_OF_NO_PAGE', 'Aller &agrave; %d Pages');
define('PREVNEXT_BUTTON_FIRST', '&lt;&lt;Premi&egrave;re');
define('PREVNEXT_BUTTON_PREV', '[&lt;&lt;&nbsp;Pr&eacute;c&eacute;dente]');
define('PREVNEXT_BUTTON_NEXT', '[Suivante&nbsp;&gt;&gt;]');
define('PREVNEXT_BUTTON_LAST', 'Derni&egrave;re&gt;&gt;');

define('IMAGE_BUTTON_ADD_ADDRESS', 'Ajouter une adresse');
define('IMAGE_BUTTON_ADDRESS_BOOK', 'Carnet d\'adresses');
define('IMAGE_BUTTON_BACK', 'Retour');
define('IMAGE_BUTTON_BUY_NOW', 'Acheter');
define('IMAGE_BUTTON_CHANGE_ADDRESS', 'Changer d\'adresse');
define('IMAGE_BUTTON_CHECKOUT', 'Commander');
define('IMAGE_BUTTON_CONFIRM_ORDER', 'Valider la commande');
define('IMAGE_BUTTON_CONTINUE', 'Continuer');
define('IMAGE_BUTTON_CONTINUE_SHOPPING', 'Continuer les achats');
define('IMAGE_BUTTON_DELETE', 'Supprimer');
define('IMAGE_BUTTON_EDIT_ACCOUNT', 'Modifier mon compte');
define('IMAGE_BUTTON_HISTORY', 'Historique des commandes');
define('IMAGE_BUTTON_LOGIN', 'S\'indentifier');
define('IMAGE_BUTTON_IN_CART', 'Acheter');
define('IMAGE_BUTTON_NOTIFICATIONS', 'Notifications');
define('IMAGE_BUTTON_QUICK_FIND', 'Recherche rapide');
define('IMAGE_BUTTON_REMOVE_NOTIFICATIONS', 'Supprimer les notifications');
define('IMAGE_BUTTON_REVIEWS', 'Critiques');
define('IMAGE_BUTTON_SEARCH', 'Rechercher');
define('IMAGE_BUTTON_SHIPPING_OPTIONS', 'Options de livraison');
define('IMAGE_BUTTON_TELL_A_FRIEND', 'Avertir un ami');
define('IMAGE_BUTTON_UPDATE', 'Mettre &agrave; jour');
define('IMAGE_BUTTON_UPDATE_CART', 'Actualiser le panier');
define('IMAGE_BUTTON_WRITE_REVIEW', 'Ecrire une critique');

define('SMALL_IMAGE_BUTTON_DELETE', 'Supprimer');
define('SMALL_IMAGE_BUTTON_EDIT', 'Modifier');
define('SMALL_IMAGE_BUTTON_VIEW', 'Voir');

define('ICON_ARROW_RIGHT', 'plus');
define('ICON_CART', 'Mettre dans le panier');
define('ICON_ERROR', 'Erreur');
define('ICON_SUCCESS', 'Succ&egrave;s');
define('ICON_WARNING', 'Avertissement');

define('TEXT_GREETING_PERSONAL', 'Bienvenue &agrave; nouveau <span class="greetUser">%s&nbsp;!</span> Voudriez-vous voir quels <a href="%s"><u>nouveaux produits</u></a> sont disponibles&nbsp;?');
define('TEXT_GREETING_PERSONAL_RELOGON', '<small>Si vous n\'&ecirc;tes pas %s, veuillez <a href="%s"><u>vous indentifier</u></a> avec vos param&egrave;tres de compte.</small>');
define('TEXT_GREETING_GUEST', 'Bienvenue <span class="greetUser">cher visiteur&nbsp;!</span> Voulez-vous <a href="%s"><u>vous identifier</u></a>? Ou pr&eacute;f&eacute;rez-vous <a href="%s"><u>cr&eacute;er un compte</u></a>&nbsp;?');

define('TEXT_SORT_PRODUCTS', 'Trier les produits ');
define('TEXT_DESCENDINGLY', 'par ordre descendant');
define('TEXT_ASCENDINGLY', 'par ordre ascendant');
define('TEXT_BY', ' par ');

define('TEXT_REVIEW_BY', 'par %s');
define('TEXT_REVIEW_WORD_COUNT', '%s mots');
define('TEXT_REVIEW_RATING', 'Notation&nbsp;: %s [%s]');
define('TEXT_REVIEW_DATE_ADDED', 'Date&nbsp;: %s');
define('TEXT_NO_REVIEWS', 'Il n\'y a aucune critique pour ce produit.');

define('TEXT_NO_NEW_PRODUCTS', 'Il n\'y a aucun nouveau produit.');

define('TEXT_UNKNOWN_TAX_RATE', 'Taux de TVA inconnu');

define('TEXT_REQUIRED', '<span class="errorText">Obligatoire</span>');

define('ERROR_TEP_MAIL', '<font face="Verdana, Arial" size="2" color="#ff0000"><b><small>TEP ERREUR:</small> Impossible d\'envoyer le message par le serveur SMTP sp&eacute;cifi&eacute;. Veuillez v&eacute;rifier la configuration dans php.ini et corriger le serveur SMTP si n&eacute;cessaire.</b></font>');
define('WARNING_INSTALL_DIRECTORY_EXISTS', 'Attention&nbsp;: Le r&eacute;pertoire d\'installation existe &agrave; &nbsp;: ' . dirname($HTTP_SERVER_VARS['SCRIPT_FILENAME']) . '/install. Veuillez supprimer ce r&eacute;pertoire pour des questions de s&eacute;curit&eacute;.');
define('WARNING_CONFIG_FILE_WRITEABLE', 'Attention&nbsp;: Il est possible d\'&eacute;crire dans le fichier de configuration&nbsp;: ' . dirname($HTTP_SERVER_VARS['SCRIPT_FILENAME']) . '/includes/configure.php. C\'est une faille de s&eacute;curit&eacute; potentielle - veuillez d&eacute;finir correctement les permissions d\'utilisateur pour ce fichier.');
define('WARNING_SESSION_DIRECTORY_NON_EXISTENT', 'Attention&nbsp;: Le r&eacute;pertoire des sessions n\'existe pas&nbsp;: ' . tep_session_save_path() . '. Les sessions ne fonctionneront pas tant que le r&eacute;pertoire ne sera pas cr&eacute;&eacute;.');
define('WARNING_SESSION_DIRECTORY_NOT_WRITEABLE', 'Attention&nbsp;: Il n\'est pas possible d\'&eacute;crire dans le r&eacute;pertoire des sessions&nbsp;: ' . tep_session_save_path() . '. Les sessions ne fonctionneront pas tant que les permissions d\'utilisateur ne seront pas correctement d&eacute;finies.');
define('WARNING_SESSION_AUTO_START', 'Attention&nbsp;: session.auto_start est activ&eacute; - veuillez d&eacute;sactiver cette fonction php dans php.ini et red&eacute;marrer le serveur web.');
define('WARNING_DOWNLOAD_DIRECTORY_NON_EXISTENT', 'Atttention&nbsp;: Le r&eacute;pertoire de t&eacute;l&eacute;chargement des produits n\'existe pas&nbsp;: ' . DIR_FS_DOWNLOAD . '. Le t&eacute;l&eacute;chargement de produits ne fonctionnera pas tant que ce r&eacute;pertoire ne sera pas valide.');

define('TEXT_CCVAL_ERROR_INVALID_DATE', 'La date d\'expiration de la carte de cr&eacute;dit est invalide.<br>Veuillez v&eacute;rifier la date et essayer &agrave; nouveau.');
define('TEXT_CCVAL_ERROR_INVALID_NUMBER', 'Le num&eacute;ro de carte de cr&eacute;dit est invalide.<br>Veuillez v&eacute;rifier le num&eacute;ro et essayer &agrave; nouveau');
define('TEXT_CCVAL_ERROR_UNKNOWN_CARD', 'Les quatre premiers chiffres saisis sont&nbsp;: %s<br>Si ce nombre est correct, nous n\'acceptons pas ce type de carte de cr&eacute;dit.<br>S\'il ne l\'est pas, veuillez essayer &agrave; nouveau.');

/*
  The following copyright announcement can only be
  appropriately modified or removed if the layout of
  the site theme has been modified to distinguish
  itself from the default osCommerce-copyrighted
  theme.

  For more information please read the following
  Frequently Asked Questions entry on the osCommerce
  support site:

  http://www.oscommerce.com/community.php/faq,26/q,50

  Please leave this comment intact together with the
  following copyright announcement.
*/
define('FOOTER_TEXT_BODY', 'Powered by an engine \'<u>based</u>\' on <a href="http://www.oscommerce.com" target="_blank">osCommerce</a>, Copyright © 2000-2005 Harald Ponce de Leon.<br>Changes to osCommerce by <a href="http://php-multishop.com" target="_blank">Php-MultiShop</a>, Copyright © 2003-2005 Piero Trono.');
?>
