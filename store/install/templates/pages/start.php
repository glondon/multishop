<?php
/*
  $Id: start.php,v 1.4 2005/11/22 18:37:33 tropic Exp $

  Php-MultiShop
  http://php-multishop.com

  Copyright (c) 2005 Piero Trono

  Released under the GNU General Public License
*/
?>

<p class="pageTitle">Choice the PREFIX</p>

<form name="install" action="install.php?step=s1" method="post">

<p>First all, you must choose a <b>PREFIX</b> for the store you are installing.
<p>The PREFIX is an alphanumerical word (without special chars, better lower case, min 3 and max 16 chars) 
   to identify each store of Php-MultiShop;
   examples:<br>store, shop1, shop2, ..., bookshop, wineshop, ...
<p>Note: the PREFIX is not the Name of the store and will be not displayed to the users.
After you can edit/change the Store Name, but you cannot change the PREFIX selected now.

<br><br>
<table width="95%" border="0" cellpadding="2" class="formPage">
  <tr>
    <td valign="middle" height="40" align="center">Please, enter the <b>PREFIX</b> for this store:&nbsp;
    <input type="text" name="prefix" size="20" maxlength="16">
    </td>
  </tr>
</table>
<br>
<table border="0" width="100%" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center"><a href="index.php"><img src="images/button_cancel.gif" border="0" alt="Cancel"></a></td>
    <td align="center"><input type="image" src="images/button_continue.gif" border="0" alt="Continue"></td>
  </tr>
</table>

</form>
