<?php

/************************************************************************/
/* PHP-NUKE: Web Portal System                                          */
/* ===========================                                          */
/*                                                                      */
/* Copyright (c) 2005 by Francisco Burzi                                */
/* http://phpnuke.org                                                   */
/*                                                                      */
/* Based on php Addon Feedback 1.0                                      */
/* Copyright (c) 2001 by Jack Kozbial                                   */
/* http://www.InternetIntl.com                                          */
/* jack@internetintl.com                                                */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/

if (!defined('MODULE_FILE')) {
	die ("You can't access this file directly...");
}

require_once("mainfile.php");
$module_name = basename(dirname(__FILE__));
get_lang($module_name);

/**********************************/
/* Configuration                  */
/*                                */
/* You can change this:           */
/* $index = 0; (right side off)   */
/**********************************/
define('INDEX_FILE', true);
$subject = $sitename." "._FEEDBACK;
/**********************************/

include("header.php");

if (!isset($opi) OR ($opi != "ds")) {
  $intcookie = intval($cookie[0]);
  if (!empty($cookie[1])) {
    $sql = "SELECT name, username, user_email FROM ".$user_prefix."_users WHERE user_id='".$intcookie."'";
    $result = $db->sql_query($sql);
    $row = $db->sql_fetchrow($result);
    $db->sql_freeresult($result);
    if (!empty($row['name'])) {
      $sender_name = $row['name'];
    } else {
      $sender_name = $row['username'];
    }
    $sender_email = $row['user_email'];
  } else {
    $sender_email = "";
    $sender_name = "";
  }
}

if (!isset($message)) { $message = ""; }
if (!isset($opi)) { $opi = ""; }
if (!isset($send)) { $send = ""; }

$form_block = "<div align=\"center\"><span class=\"title\"><strong>$sitename: "._FEEDBACKTITLE."</strong></span>\n";
$form_block .= "<br><br><span class=\"content\">"._FEEDBACKNOTE."</span>\n";
$form_block .= "<form onsubmit=\"this.submit.disabled='true'\" method=\"post\" action=\"modules.php?name=$module_name\"\n>";
$form_block .= "<p><strong>"._YOURNAME.":</strong><br>";
$form_block .= "<input type=\"text\" name=\"sender_name\" value=\"$sender_name\" size=30></p>";
$form_block .= "<p><strong>"._YOUREMAIL.":</strong><br>";
$form_block .= "<input type=\"text\" name=\"sender_email\" value=\"$sender_email\" size=30></p>";
$form_block .= "<p><strong>"._MESSAGE.":</strong><br>";
$form_block .= "<textarea name=\"message\" cols=30 rows=5 wrap=\"virtual\">$message</textarea></p>";
$form_block .= "<input type=\"hidden\" name=\"opi\" value=\"ds\">";
$form_block .= "<p><input type=\"submit\" name=\"submit\" value=\""._SEND."\"></p>";
$form_block .= "</form></div>";

OpenTable();
if ($_POST['opi'] != "ds") {
    echo $form_block;
} else {
    if (empty($sender_name)) {
	$name_err = "<div align=\"center\"><span class=\"option\"><strong><em>"._FBENTERNAME."</em></strong></span></div><br>";
	$send = "no";
    } 
    if (empty($sender_email)) {
	$email_err = "<div align=\"center\"><span class=\"option\"><strong><em>"._FBENTEREMAIL."</em></strong></span></div><br>";
	$send = "no";
    } 
    if (empty($message)) {
    	$message_err = "<div align=\"center\"><span class=\"option\"><strong><em>"._FBENTERMESSAGE."</em></span></font></div><br>";
	$send = "no";
    } 
    if ($send != "no") {
   	$sender_name = addslashes(removecrlf($sender_name));
	$sender_email = validate_mail(addslashes(removecrlf($sender_email)));
	$message = addslashes($message);
	$msg = "$sitename\n\n";
	$msg .= ""._SENDERNAME.": $sender_name\n";
	$msg .= ""._SENDEREMAIL.": $sender_email\n";
	$msg .= ""._MESSAGE.": $message\n\n";
	$to = $adminmail;
	$mailheaders = "From: $sender_name <$sender_email>\n";
	$mailheaders .= "Reply-To: $sender_email\n\n";
	mail($to, $subject, $msg, $mailheaders);
	echo "<p><div align=\"center\">"._FBMAILSENT."</div></p>";
	echo "<p><div align=\"center\">"._FBTHANKSFORCONTACT."</div></p>";
    } elseif ($send == "no") {
	OpenTable2();
	if (!empty($name_err)) { echo "$name_err"; }
	if (!empty($email_err)) {echo "$email_err"; }
	if (!empty($message_err)) {echo "$message_err"; }
	CloseTable2();
	echo "<br><br>";
	echo $form_block;
    } 
}

CloseTable();
include("footer.php");

?>