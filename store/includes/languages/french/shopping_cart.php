<?php
/*
  $Id: shopping_cart.php,v 1.13 2002/04/05 20:24:02 project3000 Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE', 'Contenu panier');
define('HEADING_TITLE', 'Qu\'y-a-t-il dans mon panier&nbsp;?');
define('TABLE_HEADING_REMOVE', 'Enlever');
define('TABLE_HEADING_QUANTITY', 'Qt&eacute;.');
define('TABLE_HEADING_MODEL', 'Mod&egrave;le');
define('TABLE_HEADING_PRODUCTS', 'Produit(s)');
define('TABLE_HEADING_TOTAL', 'Total');
define('TEXT_CART_EMPTY', 'Votre panier est vide&nbsp;!');
define('SUB_TITLE_SUB_TOTAL', 'Sous-total&nbsp;:');
define('SUB_TITLE_TOTAL', 'Total&nbsp;:');

define('OUT_OF_STOCK_CANT_CHECKOUT', 'Les produits marqu&eacute;s avec ' . STOCK_MARK_PRODUCT_OUT_OF_STOCK . ' ne sont pas en quantit&eacute; suffisante dans notre stock.<br>Veuillez modifier la quantit&eacute; des produits marqu&eacute;s avec (' . STOCK_MARK_PRODUCT_OUT_OF_STOCK . '), Merci');
define('OUT_OF_STOCK_CAN_CHECKOUT', 'Les produits marqu&eacute;s avec ' . STOCK_MARK_PRODUCT_OUT_OF_STOCK . ' ne sont pas en quantit&eacute; suffisante dans notre stock.<br>Vous pouvez cependant les acheter et commander la quantit&eacute; que nous avons en stock pour une livraison imm&eacute;diate lors de l\'enregistrement de la commande.');
?>