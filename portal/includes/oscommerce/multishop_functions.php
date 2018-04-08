<?php
/************************************************************************/
/* Php-MultiShop                                                        */
/* http://www.php-multishop.com                                         */
/* Copyright (c) 2003-2005 by Piero Trono                               */
/* ======================================                               */
/*                                                                      */
/* This	program	is free	software. You can redistribute it and/or modify	*/
/* it under the	terms of the GNU General Public	License	as published by	*/
/* the Free Software Foundation; either	version	2 of the License.       */
/************************************************************************/
/* $Id: multishop_functions.php,v 1.1.1.2 2005/11/21 13:51:16 tropic Exp $ */

  function link_to_shop($page = '', $parameters = '') {
    global $usession, $cookie;

    if (!tep_not_null($page)) {
      die('</td></tr></table></td></tr></table><br><br><font color="#ff0000"><b>Error!</b></font><br><br><b>Unable to determine the page link!<br><br>');
    }
    
    if (tep_not_null($parameters)) {
      if ($usession) $parameters .= '&usession=' . $usession;
      $link = $page . '?' . strtr(trim($parameters), array('"' => '&quot;'));
    } else {
      $link .= $page;
      if ($usession) $link .= '?usession=' . $usession;
    }

    while ( (substr($link, -1) == '&') || (substr($link, -1) == '?') ) $link = substr($link, 0, -1);
    return $link;
  }

function generate_random_num() {
	mt_srand ((double)microtime()*1000000);
	$maxran = 1000000;
	return mt_rand(0, $maxran);
}

function generate_usession($Random_num) {
	global $sitekey, $cookie;
	$uid = $cookie[0];
    $uname = $cookie[1];
    $passw = $cookie[2];
    $info = md5($uid . $_SERVER['HTTP_USER_AGENT'] . $sitekey . $Random_num);
    $usession = base64_encode("$uid:$uname:$info");
    return $usession;
}

function get_usession() {
	global $prefix, $cookie, $db;
	
	$row = $db->sql_fetchrow($db->sql_query("SELECT random_num FROM ".$prefix."_session WHERE uname='$cookie[1]' and guest='0'"));
	$Random_num = $row['0'];
    	if (isset($Random_num)) $usession = generate_usession($Random_num);
    	return $usession;
}

?>