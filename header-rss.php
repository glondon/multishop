<?php

/************************************************************************/
/* Php-MultiShop                                                        */
/* http://www.php-multishop.com                                         */
/* Copyright (c) 2003-2005 by Piero Trono                               */
/* ======================================                               */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/
/* $Id: header-rss.php,v 1.1.1.2 2005/11/21 13:51:01 tropic Exp $ */

global $Conf_Multishop, $sitename;

if ($Conf_Multishop['show_rss']){
		
	echo '<link rel="alternate" type="application/rss+xml" title="Overview of Shops on ' . $sitename . '" href="rss.php">' . "\n";
	echo '<link rel="alternate" type="application/rss+xml" title="Product in Special Offer from ' . $sitename . '" href="rss.php?op=specials">' . "\n";
	echo '<link rel="alternate" type="application/rss+xml" title="Product Random from ' . $sitename . '" href="rss.php?op=prod_random">' . "\n";
	echo '<link rel="alternate" type="application/rss+xml" title="Bestsellers from ' . $sitename . '" href="rss.php?op=best">' . "\n";
}
?>
