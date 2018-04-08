<?php
/************************************************************************/
/* functions for Php-MultiShop Platform                                 */
/* =====================================                                */
/*                                                                      */
/* Copyright (c) 2003 by Piero Trono                                    */
/* http://www.php-multishop.com                                         */
/*                                                                      */
/* This	program	is free	software. You can redistribute it and/or modify	*/
/* it under the	terms of the GNU General Public	License	as published by	*/
/* the Free Software Foundation; either	version	2 of the License.       */
/************************************************************************/


function check_session() {
	global $sitekey, $usession;
	
	$check_login = 0;
	if (isset($usession)){
		$user = base64_decode($usession);
		$uservars = explode(":", $user);
		$uid = $uservars[0];
    	$uname = $uservars[1];
    	$infocrypt = $uservars[2];
    	$referer = $_SERVER[HTTP_REFERER];
		$check_referer = ereg(DOMAIN_MULTISHOP, $referer);
		$sql = "SELECT random_num FROM ".PREFIX_DB_NUKE."_session WHERE uname='$uname' and guest='0'";
		$result = mysql_query($sql);
		if(mysql_num_rows($result) == 1){
			$row = mysql_fetch_row($result);
			$Random_num = intval($row['0']);
		} else {
			unset($Random_num);
		}
		//if (isset($Random_num) && $check_referer) 
		if (isset($Random_num)) {
			
			$newinfo = md5($uid . $_SERVER[HTTP_USER_AGENT] . $sitekey . $Random_num);
    		if ($infocrypt == $newinfo) {

    			$check_login = 1;
    		}
		}
    }
    return $check_login;
}

function get_userid(){
	global $sitekey, $usession;
	if (isset($usession)){
		$user = base64_decode($usession);
		$uservars = explode(":", $user);
		$uid = $uservars[0];
    		$uname = $uservars[1];
    		$infocrypt = $uservars[2];
    		$referer = $_SERVER[HTTP_REFERER];
		$check_referer = ereg(DOMAIN_MULTISHOP, $referer);
		$sql = "SELECT random_num FROM ".PREFIX_DB_NUKE."_session WHERE uname='$uname' and guest='0'";
		$result = mysql_query($sql);
		$row = mysql_fetch_row($result);
		$Random_num = $row['0'];
		
		if (isset($Random_num) ) {
			
			$newinfo = md5($uid . $_SERVER[HTTP_USER_AGENT] . $sitekey . $Random_num);
    			if ($infocrypt == $newinfo) {
    				
    				return $uid;
    			}
		}
    	}
}
?>