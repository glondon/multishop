<?php
/*
  $Id: moneyorder.php,v 1.6 2003/01/24 21:36:04 thomasamoulton Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

  define('MODULE_PAYMENT_MONEYORDER_TEXT_TITLE', 'Ch&egrave;que / Mandat');
  define('MODULE_PAYMENT_MONEYORDER_TEXT_DESCRIPTION', 'Payable A&nbsp;:&nbsp;' . MODULE_PAYMENT_MONEYORDER_PAYTO . '<br><br>Envoyer A&nbsp;:<br>' . nl2br(STORE_NAME_ADDRESS) . '<br><br>' . 'Votre commande sera exp&eacute;di&eacute;e d&egrave;s r&eacute;ception de votre paiement.');
  define('MODULE_PAYMENT_MONEYORDER_TEXT_EMAIL_FOOTER', "Payable A&nbsp;: ". MODULE_PAYMENT_MONEYORDER_PAYTO . "\n\nEnvoyer A&nbsp;:\n" . STORE_NAME_ADDRESS . "\n\n" . 'Votre commande sera exp&eacute;di&eacute;e d&egrave;s r&eacute;ception de votre paiement.');
?>
