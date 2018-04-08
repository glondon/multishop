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
/* $Id: step1.php,v 1.1.1.2 2005/11/21 13:51:19 tropic Exp $ */

?>
<table width="100%">
<tr><td class="content">
<? echo READ_LICENSE ; ?>
<br><br></td></tr>
<tr><td>
<form name="form" action="index.php" method="post">
<textarea name="gpl" rows="13" cols="70" readonly>
<? @include("includes/gpl.txt"); ?>
</textarea>
</td></tr>
<tr><td align="center" class="content">
<input type="checkbox" name="choice">&nbsp;<? echo ACCEPT ; ?>
</td></tr>
<tr><td align="right">
<input type="hidden" name="step" value="2">
<input type="image" src="images/next.gif" alt="next"  border="0" title="next" align="right">
</form>
<form name="form2" action="index.php" method="post">
<input type="hidden" name="step" value="0">
<input type="image" src="images/back.gif" alt="back"  border="0" title="back" align="left">
</form>
</td></tr>
</table>


