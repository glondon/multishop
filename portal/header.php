<?php

/************************************************************************/
/* PHP-NUKE: Advanced Content Management System                         */
/* ============================================                         */
/*                                                                      */
/* Copyright (c) 2005 by Francisco Burzi                                */
/* http://phpnuke.org                                                   */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/
/* changed by Piero Trono (c) 2005 for http://php-multishop.com         */
/************************************************************************/
/* $Id: header.php,v 1.1.1.2 2005/11/21 13:51:01 tropic Exp $ */

if (stristr(htmlentities($_SERVER['PHP_SELF']), "header.php")) {
	Header("Location: index.php");
	die();
}

define('NUKE_HEADER', true);
require_once("mainfile.php");

##################################################
# Include some common header for HTML generation #
##################################################


function head() {
	global $slogan, $sitename, $banners, $nukeurl, $Version_Num, $artpage, $topic, $hlpfile, $user, $hr, $theme, $cookie, $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $textcolor1, $textcolor2, $forumpage, $adminpage, $userpage, $pagetitle;
	$ThemeSel = get_theme();
	include_once("themes/$ThemeSel/theme.php");
	echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\">\n";
	echo "<html>\n";
	echo "<head>\n";
	echo "<title>$sitename $pagetitle</title>\n";
	include("includes/meta.php");
	include("includes/javascript.php");
	if (file_exists("themes/$ThemeSel/images/favicon.ico")) {
	echo "<link REL=\"shortcut icon\" HREF=\"themes/$ThemeSel/images/favicon.ico\" TYPE=\"image/x-icon\">\n";
	}
	echo "<link rel=\"alternate\" type=\"application/rss+xml\" title=\"RSS\" href=\"backend.php\">\n";

#== // Php-MultiShop
	if (file_exists("header-rss.php")) @include_once("header-rss.php");
#== //

	echo "<LINK REL=\"StyleSheet\" HREF=\"themes/$ThemeSel/style/style.css\" TYPE=\"text/css\">\n\n\n";
	if (file_exists("includes/custom_files/custom_head.php")) {
	  include_once("includes/custom_files/custom_head.php");
	}
	echo "\n\n\n</head>\n\n";
	if (file_exists("includes/custom_files/custom_header.php")) {
	  include_once("includes/custom_files/custom_header.php");
	}
	themeheader();
}

online();

#== // Php-MultiShop
if (is_user($user)) $usession = get_usession();
else unset($usession);
#== //

head();
include("includes/counter.php");
if(defined('HOME_FILE')) {
	message_box();
	blocks("Center");
}

?>