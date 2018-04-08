<?php
/*
  $Id: install_8.php,v 1.1 2005/05/29 15:13:21 tropic Exp $

  Php-MultiShop
  http://php-multishop.com

  Copyright (c) 2005 Piero Trono

  Released under the GNU General Public License
*/


// Return a random value
function tep_rand($min = null, $max = null) {
	static $seeded;
	if (!$seeded) {
	  mt_srand((double)microtime()*1000000);
	  $seeded = true;
	}
	if (isset($min) && isset($max)) {
	  if ($min >= $max) {
	    return $min;
	  } else {
	    return mt_rand($min, $max);
	  }
	} else {
	  return mt_rand();
	}
}

// This function makes a new password from a plaintext password. 
function tep_encrypt_password($plain) {
	$password = '';
	for ($i=0; $i<10; $i++) {
	  $password .= tep_rand();
	}
	$salt = substr(md5($password), 0, 2);
	$password = md5($salt . $plain) . ':' . $salt;
	return $password;
}

$dir_fs_document_root = $HTTP_POST_VARS['DIR_FS_DOCUMENT_ROOT'];
if ((substr($dir_fs_document_root, -1) != '/') && (substr($dir_fs_document_root, -1) != '/')) {
$where = strrpos($dir_fs_document_root, '\\');
if (is_string($where) && !$where) {
  $dir_fs_document_root .= '/';
} else {
  $dir_fs_document_root .= '\\';
}
}

$http_url = parse_url($HTTP_POST_VARS['HTTP_WWW_ADDRESS']);
$http_server = $http_url['scheme'] . '://' . $http_url['host'];
$http_catalog = $http_url['path'];
if (isset($http_url['port']) && !empty($http_url['port'])) {
  $http_server .= ':' . $http_url['port'];
}

if (substr($http_catalog, -1) != '/') {
  $http_catalog .= '/';
}

$https_server = '';
$https_catalog = '';
if (isset($HTTP_POST_VARS['HTTPS_WWW_ADDRESS']) && !empty($HTTP_POST_VARS['HTTPS_WWW_ADDRESS'])) {
  $https_url = parse_url($HTTP_POST_VARS['HTTPS_WWW_ADDRESS']);
  $https_server = $https_url['scheme'] . '://' . $https_url['host'];
  $https_catalog = $https_url['path'];

  if (isset($https_url['port']) && !empty($https_url['port'])) {
    $https_server .= ':' . $https_url['port'];
  }

  if (substr($https_catalog, -1) != '/') {
    $https_catalog .= '/';
  }
}

?>

<p class="pageTitle">Installation of the Store</p>

<p><b>Creation Admin-Account</b></p>

<?php
  $db = array();
  $db['DB_SERVER'] = trim(stripslashes($HTTP_POST_VARS['DB_SERVER']));
  $db['DB_SERVER_USERNAME'] = trim(stripslashes($HTTP_POST_VARS['DB_SERVER_USERNAME']));
  $db['DB_SERVER_PASSWORD'] = trim(stripslashes($HTTP_POST_VARS['DB_SERVER_PASSWORD']));
  $db['DB_DATABASE'] = trim(stripslashes($HTTP_POST_VARS['DB_DATABASE']));
  $db['DB_PREFIX'] = trim(stripslashes($HTTP_POST_VARS['prefix']));

  $db_error = false;
  osc_db_connect($db['DB_SERVER'], $db['DB_SERVER_USERNAME'], $db['DB_SERVER_PASSWORD']);
  osc_db_select_db($db['DB_DATABASE']);
  
  $admin_email_address = trim(stripslashes($HTTP_POST_VARS['admin_email_address']));
  $admin_password = trim(stripslashes($HTTP_POST_VARS['admin_password']));
  $password = tep_encrypt_password($admin_password);      
  osc_db_query("UPDATE " . $db['DB_PREFIX'] . "_admin set admin_email_address = '$admin_email_address', admin_password = '$password' where admin_id = '1'");
  
?>

<table width="95%" border="0" cellpadding="2" class="formPage">
  <tr>
    <td>Creation Admin-Account was successful!</td>
 </tr>
</table>

<p>&nbsp;</p>

<table border="0" width="100%" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center"><a href="<?php echo $http_server . $http_catalog . 'index.php'; ?>" target="_blank"><img src="images/button_catalog.gif" border="0" alt="Catalog"></a></td>
    <td align="center"><a href="<?php echo $http_server . $http_catalog . 'admin/index.php'; ?>" target="_blank"><img src="images/button_administration_tool.gif" border="0" alt="Administration Tool"></a></td>
  </tr>
</table>

