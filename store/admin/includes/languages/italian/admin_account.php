<?php
/*
  $Id: admin_account.php,v 1.1 2005/11/23 11:32:45 tropic Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

//Translation by Piero Trono http://php-multishop.com

define('HEADING_TITLE', 'Account di Admin');

define('TABLE_HEADING_ACCOUNT', 'Il mio Account');

define('TEXT_INFO_FULLNAME', '<b>Login: </b>');
define('TEXT_INFO_FIRSTNAME', '<b>Nome: </b>');
define('TEXT_INFO_LASTNAME', '<b>Cognome: </b>');
define('TEXT_INFO_EMAIL', '<b>Indirizzo Email: </b>');
define('TEXT_INFO_PASSWORD', '<b>Password: </b>');
define('TEXT_INFO_PASSWORD_HIDDEN', '-Nascosto-');
define('TEXT_INFO_PASSWORD_CONFIRM', '<b>Conferma Password: </b>');
define('TEXT_INFO_CREATED', '<b>Account Creato: </b>');
define('TEXT_INFO_LOGDATE', '<b>Ultimo Access: </b>');
define('TEXT_INFO_LOGNUM', '<b>Log Numero: </b>');
define('TEXT_INFO_GROUP', '<b>Livello Gruppo: </b>');
define('TEXT_INFO_ERROR', '<font color="red">Idirizzo Email già utilizzato!</font>');
define('TEXT_INFO_MODIFIED', 'Modificato: ');

define('TEXT_INFO_HEADING_DEFAULT', 'Modiicaa Account ');
define('TEXT_INFO_HEADING_CONFIRM_PASSWORD', 'Conferma Password');
define('TEXT_INFO_INTRO_CONFIRM_PASSWORD', 'Password:');
define('TEXT_INFO_INTRO_CONFIRM_PASSWORD_ERROR', '<font color="red"><b>ERRORE:</b> Password non appropriata!</font>');
define('TEXT_INFO_INTRO_DEFAULT', 'Clicca <b>modifica</b> permodificare il tuo account.');
define('TEXT_INFO_INTRO_DEFAULT_FIRST_TIME', '<br><b>AVVERTIMENTO:</b><br>Ciao <b>%s</b>, sei loggato per la prima volta. Ti consigliamodicambiare la tua password!');
define('TEXT_INFO_INTRO_DEFAULT_FIRST', '<br><b>AVVERTIMENTO:</b><br>Ciao <b>%s</b>, ti consigliamo di modificare la tua email (<font color="red">admin@localhost</font>) e la password!');
define('TEXT_INFO_INTRO_EDIT_PROCESS', 'Tutti campi obbligatori. Clicca Invia per salvare.');

define('JS_ALERT_FIRSTNAME',        '- Richiesto: Nome \n');
define('JS_ALERT_LASTNAME',         '- Richiesto: Cognome \n');
define('JS_ALERT_EMAIL',            '- Richiesto: Indirizzo Email \n');
define('JS_ALERT_PASSWORD',         '- Richiesto: Password \n');
define('JS_ALERT_FIRSTNAME_LENGTH', '- il Nome deve essere lungo almeno ');
define('JS_ALERT_LASTNAME_LENGTH',  '- il Cognome deve essere lungo almeno ');
define('JS_ALERT_PASSWORD_LENGTH',  '- Indirizzo Email deve essere lungo almeno ');
define('JS_ALERT_EMAIL_FORMAT',     '- formato di Indirizzo Email non valido! \n');
define('JS_ALERT_EMAIL_USED',       '- Indirizzo Email già utilizzato! \n');
define('JS_ALERT_PASSWORD_CONFIRM', '- Non hai scritto la password di conferma! \n');

define('ADMIN_EMAIL_SUBJECT', 'Modifica Informazioni Personali');
define('ADMIN_EMAIL_TEXT', 'Ciao %s,' . "\n\n" . 'Le tue Informazioni Personali, e forse anche la password, sono state modificate.  Se questo è avvenuto senza il tuo consenso, contatta il tuo amministratore immediatamente!' . "\n\n" . 'Website : %s' . "\n" . 'Username: %s' . "\n" . 'Password: %s' . "\n\n" . 'Grazie!' . "\n" . '%s' . "\n\n" . 'Questa è una email inviata automaticamente, quindi non rispondere ad essa!'); 
?>
