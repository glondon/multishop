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

/* $Id: index.php,v 1.1.1.2 2005/11/21 13:51:18 tropic Exp $ */

@include("includes/header.php");

if (isset($step) && ($step == 1 || $step == 2 || $step == 3 || $step == 4 || $step == 5 || $step == 6 || $step == 7)){

	@include("includes/step".$step.".php");

} else {

	

?>

	<table width="100%">

	<tr>

	<td align="left" class="title">

	<? echo NEW_INSTALLATION ; ?>

	</td><td align="right">

	<form name="newlang" action="index.php" method="get">

	<font class="content"><? echo SELECT_LANGUAGE ; ?></font>

	<select name="newlang" onChange="this.form.submit();">

	<option value="english" <? if ($lang == "english") echo "selected"; ?> >English</option>

	<option value="french" <? if ($lang == "italian") echo "selected"; ?> >French</option>

	<option value="italian" <? if ($lang == "italian") echo "selected"; ?> >Italiano</option>

	<option value="spanish" <? if ($lang == "spanish") echo "selected"; ?> >Español</option>

	</select>

	</form>

	</td></tr></table>

	<div class="content">

	<? echo TEXT_NEW_INSTALLATION ; ?>

	</div>

	<form name="form" action="index.php" method="post">

	<input type="hidden" name="step" value="1">

	<input type="image" src="images/start.gif" border="0" alt="start" title="start" align="right">

	</form>

	<br>

	<div class="tiny"><? echo FEEDBACK; ?>: <a href="http://php-multishop.com/contact.php"><img src="images/mail.gif" valign="middle" border="0" alt="email me" title="email me"></a></div>

	

	<?

}

@include("includes/footer.php"); 

?>
