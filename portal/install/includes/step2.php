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
/* $Id: step2.php,v 1.1.1.2 2005/11/21 13:51:19 tropic Exp $ */

if ($choice != "on"){
?>
	<table width="100%" height="100%">
	<tr><td valign="top" class="content">
	<? echo "<br>" . LICENSE_STOP; ?>

</td></tr>
<tr><td valign="bottom">
<form name="form" action="index.php" method="post">
<input type="hidden" name="step" value="1">
<input type="image" src="images/back.gif" border="0" alt="back" title="back" align="left">
</form>
</td></tr>
</table>

<?	
} else {
?>
	<table width="100%" height="100%">
	<tr><td valign="top" class="content">
	<? echo "<br>" . LICENSE_OK ; ?>
	</td>
	</tr>
	<tr>
	<td valign="middle">
	</td>
	</tr>
	<tr><td>
		<table width="100%" cellpadding="6">
		<tr>
			<td width="10%"></td>
			<td width="80%" bgcolor="#efefef" class="content">
			<? echo COPYRIGHT_POLICY ; ?>
			</td>
			<td width="10%"></td>
		</tr>
		</table>
	</td></tr>
	<tr>
	<td valign="bottom">
		<table width="100%" class="content">
		<tr>
			<td width="15%" valign="bottom"><br><br><br>
			<form name="form2" action="index.php" method="post">
			<input type="hidden" name="step" value="1">
			<input type="image" src="images/back.gif" alt="back"  border="0" title="back" align="left">
			</form>
			</td>
			<td width="70%" align="center" valign="top">
			<form name="form" action="index.php" method="post">
			<input type="checkbox" name="choice">&nbsp;<? echo I_READ ; ?>
			<input type="hidden" name="step" value="3">
			</td>
			<td width="15%" valign="bottom"><br><br><br>
			<input type="image" src="images/next.gif" alt="next"  border="0" title="next" align="right">
			</form>
			</td>
		</tr>
		</table>
	</td></tr>
	
	</table>
<?
}
