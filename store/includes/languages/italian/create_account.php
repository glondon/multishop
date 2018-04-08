<?php
/*
  $Id: create_account.php,v 1.11 2003/07/05 13:58:31 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce 

  Released under the GNU General Public License 
*/

define('NAVBAR_TITLE', 'Crea un Account');

define('HEADING_TITLE', 'Informazioni account');

define('TEXT_ORIGIN_LOGIN', '<font color="#FF0000"><small><b>NOTA:</b></font></small> Se tu hai gia un account, vai alla pagina <a href="%s"><u>login</u></a>.');

define('EMAIL_SUBJECT', 'Benvenuto in ' . STORE_NAME);
define('EMAIL_GREET_MR', 'Caro Mr. %s,' . "\n\n");
define('EMAIL_GREET_MS', 'Cara Ms. %s,' . "\n\n");
define('EMAIL_GREET_NONE', 'Caro %s' . "\n\n");
define('EMAIL_WELCOME', 'Ti diamo il benvenuto in <b>' . STORE_NAME . '</b>.' . "\n\n");
define('EMAIL_TEXT', 'Adesso puoi usufruire dei <b>molti servizi</b> che ti offriamo. Alcuni fra questi sono:' . "\n\n" . '<li><b>Carrello acquisti</b> - Qualsiasi prodotto aggiunto al tuo carrello vi rimarrà fino a che non lo rimuoverete o lo acquistarete.' . "\n" . '<li><b>Rubrica personale</b> - Ora possiamo spedirvi prodotti ad indirizzi differenti da quello con cui avete creato l\'accout. Questa soluzione è perfetta per spedire regali di compleanno direttamente al festeggiato.' . "\n" . '<li><b>Storico ordini</b> - Visualizza la cronologia degli acquisti che hai fatto.' . "\n" . '<li><b>Recensioni prodotti</b> - Condividi le tue opinioni riguardo a prodotti con altri nostri clienti.' . "\n\n");
define('EMAIL_CONTACT', 'Per ricevere aiuto riguardo qualsiasi dei servizi da noi offerti, manda una email a: ' . STORE_OWNER_EMAIL_ADDRESS . '.' . "\n\n");
define('EMAIL_WARNING', '<b>Note:</b> Questo indirizzo email è stato utilizzato da un nostro cliente. Se non hai scelto tu di iscriverti, per piacere contattaci all\'indirizzo ' . STORE_OWNER_EMAIL_ADDRESS . '.' . "\n");
?>