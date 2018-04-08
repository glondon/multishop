<?php
/*
  $Id: install.php,v 1.4 2005/05/29 15:18:31 tropic Exp $
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com
  Copyright (c) 2002 osCommerce
  Released under the GNU General Public License
  
  Changed by Piero Trono (c) 2005 for htpp://php-multishop.com
*/

  require('includes/application.php');

  $page_file = 'install.php';
  $page_title = 'Installation';

  switch ($HTTP_GET_VARS['step']) {
    case 's1':
      $page_contents = 'start_1.php';
      break;
    case '1':
      $page_contents = 'install.php';
      break;
    case '2':
      if (osc_in_array('database', $HTTP_POST_VARS['install'])) {
        $page_contents = 'install_2.php';
      } elseif (osc_in_array('configure', $HTTP_POST_VARS['install'])) {
        $page_contents = 'install_4.php';
      } else {
        $page_contents = 'install.php';
      }
      break;
    case '3':
      if (osc_in_array('database', $HTTP_POST_VARS['install'])) {
        $page_contents = 'install_3.php';
      } else {
        $page_contents = 'install.php';
      }
      break;
    case '4':
      if (osc_in_array('configure', $HTTP_POST_VARS['install'])) {
        $page_contents = 'install_4.php';
      } else {
        $page_contents = 'install.php';
      }
      break;
    case '5':
      if (osc_in_array('configure', $HTTP_POST_VARS['install'])) {
        if (isset($HTTP_POST_VARS['ENABLE_SSL']) && ($HTTP_POST_VARS['ENABLE_SSL'] == 'true')) {
          $page_contents = 'install_5.php';
        } else {
          $page_contents = 'install_6.php';
        }
      } else {
        $page_contents = 'install.php';
      }
      break;
    case '6':
      if (osc_in_array('configure', $HTTP_POST_VARS['install'])) {
        $page_contents = 'install_6.php';
      } else {
        $page_contents = 'install.php';
      }
      break;
    case '7':
      if (osc_in_array('configure', $HTTP_POST_VARS['install'])) {
        $page_contents = 'install_7.php';
      } else {
        $page_contents = 'install.php';
      }
      break;
    case '8':
      if (osc_in_array('configure', $HTTP_POST_VARS['install'])) {
        $page_contents = 'install_8.php';
      } else {
        $page_contents = 'install.php';
      }
      break;
    default:
      $page_contents = 'start.php';
  }

  require('templates/main_page.php');
?>
