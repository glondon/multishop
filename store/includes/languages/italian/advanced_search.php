<?php
/*
  $Id: advanced_search.php,v 1.15 2003/07/08 16:45:35 dgw_ Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce 

  Released under the GNU General Public License 
*/

define('NAVBAR_TITLE_1', 'Ricerca Avanzata');
define('NAVBAR_TITLE_2', 'Risualtati Ricerca');

define('HEADING_TITLE_1', 'Ricerca Avanzata');
define('HEADING_TITLE_2', 'Prodotti che soddisfano i vincoli di ricerca');

define('HEADING_SEARCH_CRITERIA', 'Criteri di ricerca');

define('TEXT_SEARCH_IN_DESCRIPTION', 'Ricerca descrizione prodotto');
define('ENTRY_CATEGORIES', 'Categorie:');
define('ENTRY_INCLUDE_SUBCATEGORIES', 'Includi Subcategorie');
define('ENTRY_MANUFACTURERS', 'Produttori:');
define('ENTRY_PRICE_FROM', 'Dal prezzo:');
define('ENTRY_PRICE_TO', 'Al prezzo:');
define('ENTRY_DATE_FROM', 'Dalla data:');
define('ENTRY_DATE_TO', 'Alla data:');

define('TEXT_SEARCH_HELP_LINK', '<u>Aiuto ricerca</u> [?]');

define('TEXT_ALL_CATEGORIES', 'Tutte le categorie');
define('TEXT_ALL_MANUFACTURERS', 'Tutti i produttori');

define('HEADING_SEARCH_HELP', 'Aiuto ricerca');
define('TEXT_SEARCH_HELP', 'Le parole chiave devono essere separate da AND oppure OR per stabilire un buon controllo dei risultati.<br><br>Per esempio, <u>Microsoft AND mouse</u> generer� risultati che conterranno entrambe le parole. Invece, inserendo <u>mouse OR keyboard</u>, si generer� una lista che contiene prodotti che hanno sia entrambe le parole oppure una delle due..<br><br>E\' inoltre possibile visualizzare i risultati esatti comprendendo le parole fra virgolette..<br><br>Per esempio, <u>"notebook computer"</u> si otterr� una lista di prodotti che hanno la stringa esatta al loro interno.<br><br>Le parentesi possono essere usate per controllare l\'ordine degli operatori logici.<br><br>Per esempio, � possibile inserire <u>Microsoft and (tastiere or mouse or "visual basic")</u>.');
define('TEXT_CLOSE_WINDOW', '<u>Chiudi finestra</u> [x]');

define('TABLE_HEADING_IMAGE', '');
define('TABLE_HEADING_MODEL', 'Modello');
define('TABLE_HEADING_PRODUCTS', 'Nome Prodotto');
define('TABLE_HEADING_MANUFACTURER', 'Produttore');
define('TABLE_HEADING_QUANTITY', 'Quantit�');
define('TABLE_HEADING_PRICE', 'Prezzo');
define('TABLE_HEADING_WEIGHT', 'Peso');
define('TABLE_HEADING_BUY_NOW', 'Compra Ora');

define('TEXT_NO_PRODUCTS', 'Non ci sono prodotti che soddisfano i vincoli di ricerca.');

define('ERROR_AT_LEAST_ONE_INPUT', 'Deve essere inserito almeno uno nei campi di ricerca.');
define('ERROR_INVALID_FROM_DATE', 'Campo "Dalla data" non valido.');
define('ERROR_INVALID_TO_DATE', 'Campo "Alla data" non valido.');
define('ERROR_TO_DATE_LESS_THAN_FROM_DATE', 'Il campo "Alla data" deve essere maggiore o uguale al campo "Dalla data".');
define('ERROR_PRICE_FROM_MUST_BE_NUM', 'Il campo "Dal prezzo" deve essere un numero.');
define('ERROR_PRICE_TO_MUST_BE_NUM', 'Il campo "Al prezzo"  deve essere un numero.');
define('ERROR_PRICE_TO_LESS_THAN_PRICE_FROM', 'Il campo "Al prezzo" deve essere maggiore o uguale al campo "Dal prezzo".');
define('ERROR_INVALID_KEYWORDS', 'Parole chiave non valide.');
?>
