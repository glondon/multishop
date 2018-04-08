<?php
/*
  $Id: login.php,v 1.1 2005/11/23 11:32:45 tropic Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

if ($HTTP_GET_VARS['origin'] == FILENAME_CHECKOUT_PAYMENT) {
  define('NAVBAR_TITLE', 'Ordini');
  define('HEADING_TITLE', 'Ordinare online è facile.');
  define('TEXT_STEP_BY_STEP', 'Ti guideremo in questo processo, paso dopo passo.');
} else {
  define('NAVBAR_TITLE', 'Login');
  define('HEADING_TITLE', 'Benvenuto, effettua il Login');
  define('TEXT_STEP_BY_STEP', ''); // should be empty
}

define('HEADING_RETURNING_ADMIN', 'Pannello di Login:');
define('HEADING_PASSWORD_FORGOTTEN', 'Password Dimenticata:');
define('TEXT_RETURNING_ADMIN', 'Solo Staff!');
define('ENTRY_EMAIL_ADDRESS', 'Indirizzo E-Mail:');
define('ENTRY_PASSWORD', 'Password:');
define('ENTRY_FIRSTNAME', 'Nome:');
define('IMAGE_BUTTON_LOGIN', 'Invia');

define('TEXT_PASSWORD_FORGOTTEN', 'Password dimenticata?');

define('TEXT_LOGIN_ERROR', '<font color="#ff0000"><b>ERROR:</b></font> Username o Password non validi!');
define('TEXT_FORGOTTEN_ERROR', '<font color="#ff0000"><b>ERRORE:</b></font> Nome e Password non riscontrati!');
define('TEXT_FORGOTTEN_FAIL', 'Hai effettuato più di 3 tentativi. Per ragioni di sicurezza, contatta l\'amministratore del sito per richiedere una nuova password.<br>&nbsp;<br>&nbsp;');
define('TEXT_FORGOTTEN_SUCCESS', 'La nuova password è stata inviata al tuo indirizzo email. Controlla la tua casella di posta ed poi effettua il login.<br>&nbsp;<br>&nbsp;');

define('ADMIN_EMAIL_SUBJECT', 'Nuova Password'); 
define('ADMIN_EMAIL_TEXT', 'Ciao %s,' . "\n\n" . 'Puoi accedere al pannello di login con la seguente password. Dopo esserti autenticato, cambia la tua password!' . "\n\n" . 'Sito Web : %s' . "\n" . 'Username: %s' . "\n" . 'Password: %s' . "\n\n" . 'Grazie!' . "\n" . '%s' . "\n\n" . 'Questo è un messaggio inviato automaticamente, a cui non bisogna rispondere!'); 
?>
