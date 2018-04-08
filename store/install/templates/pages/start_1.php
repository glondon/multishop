<?php
/*
  $Id: start_1.php,v 1.4 2005/11/22 18:51:42 tropic Exp $

  Php-MultiShop
  http://php-multishop.com

  Copyright (c) 2005 Piero Trono

  Released under the GNU General Public License
*/

$sourcefile = "source.sql";
$targetfile = "oscommerce.sql";
$findstr = "PREFIXSHOP";
$report;
$check = 0 ;
$prefix = trim(stripslashes($HTTP_POST_VARS['prefix']));

echo '<p class="pageTitle">Installation of the Store</p>';

if (!ereg("^[a-zA-Z0-9_\-]{3,16}$", $prefix)){
?>
<p><font color="red"><b>Bad PREFIX:</b></font>&nbsp;&nbsp;<b><? echo $prefix; ?></b></p>
<p>Please, go back and enter other PREFIX.
<br><br>

<table border="0" width="100%" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center"><a href="install.php"><img src="images/button_back.gif" border="0" alt="Cancel"></a></td>
  </tr>
</table>
</form>
<?
} elseif (!is_writable($targetfile)){

?>
<p>Right! the entered PREFIX is: <b><? echo $prefix; ?></b>
<p>Now you must set on your server the '<i>install/oscommerce.sql</i>' file as writable (chmod 666); for example, through a shell on a Unix-like System:<br><br>

<table width="80%" bgcolor="#000000" align="center" cellpadding="6"><tr>
<td valign="middle" height="40" align="left">
<font color="#ffffff">
<? echo "root@localhost#&nbsp;&nbsp;&nbsp;&nbsp;chmod 666 install/oscommerce.sql&nbsp;" ; ?>
</font>
</td></tr>
</table>
<br>
<form name="install" action="install.php?step=s1" method="post">
<input type="hidden" name="prefix" value="<? echo $prefix; ?>">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center"><a href="install.php"><img src="images/button_back.gif" border="0" alt="Cancel"></a></td>
    <td align="center"><input type="image" src="images/button_continue.gif" border="0" alt="Continue"></td>
  </tr>
</table>
</form>
<?
} else {

?>

<p>Right! the entered PREFIX is: <b><? echo $prefix; ?></b>
<p>... editing '<i>oscommerce.sql</i>' file...</p>

<?
$lines = file($sourcefile);
copy($sourcefile, $targetfile);
if ($fref = fopen($targetfile, "w")) {
	    for ($i=0; $i<count($lines); $i++) {
   	    	$newline = ereg_replace($findstr, $prefix, $lines[$i]);
   	    	fwrite($fref, $newline);
	    }
	    $report  = "OK, file edited <b>successfully !!!</b>";
} else {
	    $report = "Some <b>Error</b> has occurred during the editing...";
}

echo $report;
?>
<br><br>
<form name="install" action="install.php?step=1" method="post">
<input type="hidden" name="prefix" value="<? echo $prefix; ?>">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center"><a href="index.php"><img src="images/button_cancel.gif" border="0" alt="Cancel"></a></td>
    <td align="center"><input type="image" src="images/button_continue.gif" border="0" alt="Continue"></td>
  </tr>
</table>
</form>
<?
}
