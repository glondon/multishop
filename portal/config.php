<?php

######################################################################
# PHP-NUKE: Advanced Content Management System
# ============================================
#
# Copyright (c) 2005 by Francisco Burzi
# http://phpnuke.org
#
# This program is free software. You can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License.
######################################################################
#                     Nuke Patch version: 3.1
######################################################################
#  changed by Piero Trono (c) 2005 for http://php-multishop.com      #
/********************************************************************/
/* $Id: config.php,v 1.2 2005/11/22 15:27:38 tropic Exp $ */

if (file_exists("install/index.php")){		
	Header("Location: install/index.php");
	die();
}
######################################################################

if (stristr(htmlentities($_SERVER['PHP_SELF']), "config.php")) {
    Header("Location: index.php");
    die();
}

######################################################################
# Database & System Config
#
# dbhost:       SQL Database Hostname
# dbuname:      SQL Username
# dbpass:       SQL Password
# dbname:       SQL Database Name
# $prefix:      Your Database table's prefix
# $user_prefix: Your Users' Database table's prefix (To share it)
# $dbtype:      Your Database Server type. Supported servers are:
#               MySQL, mysql4, postgres, mssql, oracle, msaccess,
#               db2 and mssql-odbc
#               Be sure to write it exactly as above, case SeNsItIvE!
# $sitekey:	Security Key. CHANGE it to whatever you want, as long
#               as you want. Just don't use quotes.
# $gfx_chk:	Set the graphic security code on every login screen,
#		You need to have GD extension installed:
#		0: No check
#		1: Administrators login only
#		2: Users login only
#		3: New users registration only
#		4: Both, users login and new users registration only
#		5: Administrators and users login only
#		6: Administrators and new users registration only
#		7: Everywhere on all login options (Admins and Users)
#		NOTE: If you aren't sure set this value to 0
# $subscription_url : If you manage subscriptions on your site, you
#                     must write here the url of the subscription
#                     information/renewal page. This will send by
#                     email if set.
# $admin_file: Administration panel filename. "admin" by default for
#		   "admin.php". To improve security please rename the file
#              "admin.php" and change the $admin_file value to the
#              new filename (without the extension .php)
# $tipath:          Path to where the topic images are stored.
# $advanced_editor: On/Off the advanced WYSIWYG text editor for admins
#                   0: Off, will use the default simple text editor
#                   1: On, will use the full featured text editor
# $display_errors: Debug control to see PHP generated errors.
#                   false: Don't show errors
#                   true: See all errors ( No notices )
######################################################################

$dbhost = "localhost";
$dbuname = "root";
$dbpass = "";
$dbname = "nuke";
$prefix = "nuke";
$user_prefix = "nuke";
$dbtype = "MySQL";
$sitekey = "SdFk*fa28367-dm56w69.3a2fDS+e9";
$gfx_chk = 0;
$subscription_url = "";
$admin_file = "admin";
$tipath = "images/topics/";
$advanced_editor = 1;
$display_errors = false;

define("STORE_PREFIX", "Multi-Shop"); // anything, a prefix for your mall-portal
define("NAME_MARKET_PLACE", "Multi-Shop");
define("DEFAULT_LANGUAGE", "english");

$lang_id["english"] = 1;
$lang_id["german"]  = 2;
$lang_id["spanish"] = 3;
$lang_id["italian"] = 4;
$lang_id["french"]  = 5;

define("HTTP_SERVER", "http://multishop/"); // eg, http://www.yoursite.com/ - should not be NULL for productive servers
define("HTTPS_SERVER", ""); // eg, https://www.yoursite.com/ - should not be NULL for productive servers
define("ENABLE_SSL", false); // secure webserver for checkout procedure?
define("DIR_FS_DOCUMENT_ROOT", "C:/xampp/htdocs/multishop"); // IMPORTANT: it's the absolut path on server where is located the current file
define("DIR_WS_INCLUDES", DIR_FS_DOCUMENT_ROOT . "includes/oscommerce/");

define("ENTRY_FIRST_NAME_MIN_LENGTH", "3");
define("ENTRY_LAST_NAME_MIN_LENGTH", "3");
define("ENTRY_TELEPHONE_MIN_LENGTH", "6");
define("ENTRY_STREET_ADDRESS_MIN_LENGTH", "3");
define("ENTRY_CITY_MIN_LENGTH", "2");
define("ENTRY_STATE_PROVINCE_MIN_LENGTH", "2");
define("ENTRY_STATE_MIN_LENGTH", "2");
define("ENTRY_POSTCODE_MIN_LENGTH", "4");

/*********************************************************************/
/* You finished to configure the Database. Now you can change all    */
/* you want in the Administration Section.   To enter just launch    */
/* you web browser pointing to http://yourdomain.com/admin.php       */
/*                                                                   */
/* Remeber to go to Settings section where you can configure your    */
/* new site. In that menu you can change all you need to change.     */
/*                                                                   */
/* Congratulations! now you have an automated news portal!           */
/* Thanks for choose PHP-Nuke: The Future of the Web                 */
/*********************************************************************/

// DO NOT TOUCH ANYTHING BELOW THIS LINE UNTIL YOU KNOW WHAT YOU'RE DOING

$reasons = array("As Is","Offtopic","Flamebait","Troll","Redundant","Insighful","Interesting","Informative","Funny","Overrated","Underrated");
$badreasons = 4;
$AllowableHTML = array("b"=>1,"i"=>1,"u"=>1,"div"=>2,"a"=>2,"em"=>1,"br"=>1,"strong"=>1,"blockquote"=>1,"tt"=>1,"li"=>1,"ol"=>1,"ul"=>1);
$CensorList = array("fuck","cunt","fucker","fucking","pussy","cock","c0ck","cum","twat","clit","bitch","fuk","fuking","motherfucker");

//***************************************************************
// IF YOU WANT TO LEGALY REMOVE ANY COPYRIGHT NOTICES PLAY FAIR AND CHECK: http://phpnuke.org/modules.php?name=Commercial_License
// COPYRIGHT NOTICES ARE GPL SECTION 2(c) COMPLIANT AND CAN'T BE REMOVED WITHOUT PHP-NUKE'S AUTHOR WRITTEN AUTHORIZATION
// THE USE OF COMMERCIAL LICENSE MODE FOR PHP-NUKE HAS BEEN APPROVED BY THE FSF (FREE SOFTWARE FOUNDATION)
// YOU CAN REQUEST INFORMATION ABOUT THIS TO GNU.ORG REPRESENTATIVE. THE EMAIL THREAD REFERENCE IS #213080
// YOU'RE NOT AUTHORIZED TO CHANGE THE FOLLOWING VARIABLE'S VALUE UNTIL YOU ACQUIRE A COMMERCIAL LICENSE
// (http://phpnuke.org/modules.php?name=Commercial_License)
//***************************************************************
$commercial_license = 0;
//Nuke Patched 3.1
?>