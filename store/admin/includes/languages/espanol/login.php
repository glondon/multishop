<?php
/*
  $Id: login.php,v 1.1 2005/11/23 11:29:59 tropic Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

// Translation by Piero Trono http://php-multishop.com

if ($HTTP_GET_VARS['origin'] == FILENAME_CHECKOUT_PAYMENT) {
  define('NAVBAR_TITLE', 'Pedidos');
  define('HEADING_TITLE', 'Pedir online es facil.');
  define('TEXT_STEP_BY_STEP', 'Ti suportamos en este proceso, paso a paso.');
} else {
  define('NAVBAR_TITLE', 'Login');
  define('HEADING_TITLE', 'Bienvenido, puedes hacer el login');
  define('TEXT_STEP_BY_STEP', 'paso a paso'); // should be empty
}

define('HEADING_RETURNING_ADMIN', 'Panel de Login:');
define('HEADING_PASSWORD_FORGOTTEN', 'Password Olvidada:');
define('TEXT_RETURNING_ADMIN', 'Solo Staff!');
define('ENTRY_EMAIL_ADDRESS', 'Direccion E-Mail:');
define('ENTRY_PASSWORD', 'Password:');
define('ENTRY_FIRSTNAME', 'Nombre:');
define('IMAGE_BUTTON_LOGIN', 'Submit');

define('TEXT_PASSWORD_FORGOTTEN', 'Password olvidada?');

define('TEXT_LOGIN_ERROR', '<font color="#ff0000"><b>ERROR:</b></font> Invalido username o password!');
define('TEXT_FORGOTTEN_ERROR', '<font color="#ff0000"><b>ERROR:</b></font> Nombre o password no rescontrada!');
define('TEXT_FORGOTTEN_FAIL', 'Ya has ententado mas que 3 veces. Por seguridad contacta tu Administrador para obtener una nueva password.<br>&nbsp;<br>&nbsp;');
define('TEXT_FORGOTTEN_SUCCESS', 'La nueva password ha sido enviada a tu correo elecctronico. Controlalo para hacer el login.<br>&nbsp;<br>&nbsp;');

define('ADMIN_EMAIL_SUBJECT', 'Nueva Password'); 
define('ADMIN_EMAIL_TEXT', 'Hola %s,' . "\n\n" . 'Puedes entrar en el area de Admin con la seguiente password. Despues del login, es mejor cambiar tu password!' . "\n\n" . 'Website : %s' . "\n" . 'Username: %s' . "\n" . 'Password: %s' . "\n\n" . 'Gracias!' . "\n" . '%s' . "\n\n" . 'Esto es un mail automatico, entonces no respondes!'); 
?>
