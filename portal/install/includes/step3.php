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
/* $Id: step3.php,v 1.1.1.2 2005/11/21 13:51:19 tropic Exp $ */

if ($choice != "on"){
?>
	<table width="100%" height="100%">
	<tr><td valign="top" class="content">
	<? echo "<br>" . I_READ_STOP; ?>
	</td></tr>
	<tr><td>
	<form name="form" action="index.php" method="post">
	<input type="hidden" name="step" value="2">
	<input type="hidden" name="choice" value="on">
	<input type="image" src="images/back.gif" border="0" alt="back" title="back" align="left">
	</form>
	</td></tr>
	</table>
<?	
} else {
?>
	<table width="100%" height="100%" class="content">
	<tr><td valign="top">
	<p class="title">
	<? echo TITLE_CREATE_DB ; ?>
	</p>
	<? echo "<br>" . I_READ_OK ; ?>
	</td></tr><tr><td valign="middle">
	<? echo TEXT_CREATE_DB ; ?>
	<br><br>
	<table cellpadding="6"><tr><td width="30"></td>
	<td width="400" bgcolor="#000000">
	<br>
	<font color="#ffffff">
	<? echo "root@localhost#&nbsp;&nbsp;&nbsp;&nbsp;mysqladmin create nuke&nbsp;" ; ?>
	</font>
	<br><br>
	</td></tr>
	</table>
	<br><br>
	<? echo AFTER_CREATION_DB; ?>
	<br><br><font class="tiny">
	<? echo PHPMYADMIN; ?>
	</font>
	</td></tr><tr><td valign="bottom">
	<form name="form" action="index.php" method="post">
	<input type="hidden" name="step" value="2">
	<input type="hidden" name="choice" value="on">
	<input type="image" src="images/back.gif" border="0" alt="back" title="back" align="left">
	</form>
	<form name="form" action="index.php" method="post">
	<input type="hidden" name="step" value="4">
	<input type="image" src="images/next.gif" border="0" alt="next" title="next" align="right">
	</form>
	</td></tr>
	</table>
<?
}
?>