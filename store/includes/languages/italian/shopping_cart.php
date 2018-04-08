<?php
/*
  $Id: shopping_cart.php,v 1.13 2002/04/05 20:24:02 project3000 Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce 

  Released under the GNU General Public License 
*/

define('NAVBAR_TITLE', 'Contenuto carrello');
define('HEADING_TITLE', 'Cosa c\'è nel mio carrello?');
define('TABLE_HEADING_REMOVE', 'Cancella');
define('TABLE_HEADING_QUANTITY', 'Quantità');
define('TABLE_HEADING_MODEL', 'Modello');
define('TABLE_HEADING_PRODUCTS', 'Prodotto(i)');
define('TABLE_HEADING_TOTAL', 'Totale');
define('TEXT_CART_EMPTY', 'Il tuo carrello è vuoto!');
define('SUB_TITLE_SUB_TOTAL', 'Sub-Totale:');
define('SUB_TITLE_TOTAL', 'Totale:');

define('OUT_OF_STOCK_CANT_CHECKOUT', 'I prodotti contrassegnati con ' . STOCK_MARK_PRODUCT_OUT_OF_STOCK . ' non sono presenti nel nostro magazzino nella quantità desiderata.<br>Cambia la quantità del prodotto contrassegnato con (' . STOCK_MARK_PRODUCT_OUT_OF_STOCK . '), Grazie');
define('OUT_OF_STOCK_CAN_CHECKOUT', 'I prodotti contrassegnati con ' . STOCK_MARK_PRODUCT_OUT_OF_STOCK . ' non sono presenti nel nostro magazzino nella quantità desiderata.<br>Puoi acquistare questo prodotto in ogni momento controllando la disponibilità per l\'immediata spedizione nel procedimento di acquisto.');
?>