<?php

/************************************************************************/
/* PHP-NUKE: Web Portal System                                          */
/* ===========================                                          */
/*                                                                      */
/* Copyright (c) 2005 by Francisco Burzi                                */
/* http://phpnuke.org                                                   */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/

if (!defined('ADMIN_FILE')) {
	die ("Access Denied");
}

global $prefix, $db, $admin_file;
$aid = substr($aid, 0,25);
$query = $db->sql_query("SELECT title, admins FROM ".$prefix."_modules WHERE title='Topics'");
list($title, $admins) = $db->sql_fetchrow($query);
$query = $db->sql_query("SELECT name, radminsuper FROM ".$prefix."_authors WHERE aid='$aid'");
list($name, $radminsuper) = $db->sql_fetchrow($query);
$admins = explode(",", $admins);
$auth_user = 0;
for ($i=0; $i < sizeof($admins); $i++) {
	if ($name == $admins[$i] AND !empty($admins)) {
		$auth_user = 1;
	}
}

if ($radminsuper == 1 || $auth_user == 1) {

	/*********************************************************/
	/* Topics Manager Functions                              */
	/*********************************************************/

	function topicsmanager() {
		global $prefix, $db, $admin_file, $tipath;
		include("header.php");
		GraphicAdmin();
		OpenTable();
		echo "<center><span class=\"title\"><b>"._TOPICSMANAGER . "</b></span></center>";
		CloseTable();
		echo "<br>";
		OpenTable();
		echo "<center><span class=\"option\"><b>"._CURRENTTOPICS . "</b></span><br>"._CLICK2EDIT . "</span></center><br>"
		."<table border=\"0\" width=\"100%\" align=\"center\" cellpadding=\"2\">";
		$count = 0;
		$result = $db->sql_query("SELECT topicid, topicname, topicimage, topictext from " . $prefix . "_topics order by topicname");
		while (list($topicid, $topicname, $topicimage, $topictext) = $db->sql_fetchrow($result)) {
			$topicid = intval($topicid);
			echo "<td align=\"center\">"
			."<a href=\"".$admin_file.".php?op=topicedit&amp;topicid=$topicid\"><img src=\"$tipath/$topicimage\" border=\"0\" alt=\"\"></a><br>"
			."<span class=\"content\"><b>$topictext</td>";
			$count++;
			if ($count == 5) {
				echo "</tr><tr>";
				$count = 0;
			}
		}
		echo "</table>";
		CloseTable();
		echo "<br><a name=\"Add\">";
		OpenTable();
		echo "<center><span class=\"option\"><b>"._ADDATOPIC . "</b></span></center><br>"
		."<form action=\"".$admin_file.".php\" method=\"post\">"
		."<b>"._TOPICNAME . ":</b><br><span class=\"tiny\">"._TOPICNAME1 . "<br>"
		.""._TOPICNAME2 . "</span><br>"
		."<input type=\"text\" name=\"topicname\" size=\"20\" maxlength=\"20\"><br><br>"
		."<b>"._TOPICTEXT . ":</b><br><span class=\"tiny\">"._TOPICTEXT1 . "<br>"
		.""._TOPICTEXT2 . "</span><br>"
		."<input type=\"text\" name=\"topictext\" size=\"40\" maxlength=\"40\"><br><br>"
		."<b>"._TOPICIMAGE . ":</b><br>"
		."<select name=\"topicimage\">";
		$handle=opendir($tipath);
		while ($file = readdir($handle)) {
			if ( (ereg("^([_0-9a-zA-Z]+)([.]{1})([_0-9a-zA-Z]{3})$",$file)) AND $file != "AllTopics.gif") {
				$tlist .= "$file ";
			}
		}
		closedir($handle);
		$tlist = explode(" ", $tlist);
		sort($tlist);
		for ($i=0; $i < sizeof($tlist); $i++) {
			if(!empty($tlist[$i])) {
				echo "<option name=\"topicimage\" value=\"$tlist[$i]\">$tlist[$i]\n";
			}
		}
		echo "</select><br><br>"
		."<input type=\"hidden\" name=\"op\" value=\"topicmake\">"
		."<input type=\"submit\" value=\""._ADDTOPIC . "\">"
		."</form>";
		CloseTable();
		include("footer.php");
	}

	function topicedit($topicid) {
		global $prefix, $db, $admin_file, $tipath;
		include("header.php");
		GraphicAdmin();
		OpenTable();
		echo "<center><span class=\"title\"><b>"._TOPICSMANAGER . "</b></span></center>";
		CloseTable();
		echo "<br>";
		OpenTable();
		$query = $db->sql_query("SELECT topicid, topicname, topicimage, topictext from ".$prefix . "_topics where topicid='$topicid'");
		list($topicid, $topicname, $topicimage, $topictext) = $db->sql_fetchrow($query);
		$topicid = intval($topicid);
		echo "<img src=\"$tipath/$topicimage\" border=\"0\" align=\"right\" alt=\"$topictext\">"
		."<span class=\"option\"><b>"._EDITTOPIC . ": $topictext</b></span>"
		."<br><br>"
		."<form action=\"".$admin_file.".php\" method=\"post\"><br>"
		."<b>"._TOPICNAME . ":</b><br><span class=\"tiny\">"._TOPICNAME1 . "<br>"
		.""._TOPICNAME2 . "</span><br>"
		."<input type=\"text\" name=\"topicname\" size=\"20\" maxlength=\"20\" value=\"$topicname\"><br><br>"
		."<b>"._TOPICTEXT . ":</b><br><span class=\"tiny\">"._TOPICTEXT1 . "<br>"
		.""._TOPICTEXT2 . "</span><br>"
		."<input type=\"text\" name=\"topictext\" size=\"40\" maxlength=\"40\" value=\"$topictext\"><br><br>"
		."<b>"._TOPICIMAGE . ":</b><br>"
		."<select name=\"topicimage\">";
		$handle=opendir($tipath);
		while ($file = readdir($handle)) {
			if ( (ereg("^([_0-9a-zA-Z]+)([.]{1})([_0-9a-zA-Z]{3})$",$file)) AND $file != "AllTopics.gif") {
				$tlist .= "$file ";
			}
		}
		closedir($handle);
		$tlist = explode(" ", $tlist);
		sort($tlist);
		for ($i=0; $i < sizeof($tlist); $i++) {
			if(!empty($tlist[$i])) {
				if ($topicimage == $tlist[$i]) {
					$sel = "selected";
				} else {
					$sel = "";
				}
				echo "<option name=\"topicimage\" value=\"$tlist[$i]\" $sel>$tlist[$i]\n";
			}
		}
		echo "</select><br><br>"
		."<b>"._ADDRELATED . ":</b><br>"
		.""._SITENAME . ": <input type=\"text\" name=\"name\" size=\"30\" maxlength=\"30\"><br>"
		.""._URL . ": <input type=\"text\" name=\"url\" value=\"http://\" size=\"50\" maxlength=\"200\"><br><br>"
		."<b>"._ACTIVERELATEDLINKS . ":</b><br>"
		."<table width=\"100%\" border=\"0\">";
		$res = $db->sql_query("SELECT rid, name, url from ".$prefix . "_related where tid='$topicid'");
		$num = $db->sql_numrows($res);
		if ($num == 0) {
			echo "<tr><td><span class=\"tiny\">"._NORELATED . "</span></td></tr>";
		}
		while(list($rid, $name, $url) = $db->sql_fetchrow($res)) {
			$rid = intval($rid);
			$url = stripslashes($url);
			echo "<tr><td align=\"left\"><span class=\"content\"><strong><big>&middot;</big></strong>&nbsp;&nbsp;<a href=\"$url\">$name</a></td>"
			."<td align=\"center\"><span class=\"content\"><a href=\"$url\">$url</a></td><td align=\"right\"><span class=\"content\">[ <a href=\"".$admin_file.".php?op=relatededit&amp;tid=$topicid&amp;rid=$rid\">"._EDIT . "</a> | <a href=\"".$admin_file.".php?op=relateddelete&amp;tid=$topicid&amp;rid=$rid\">"._DELETE . "</a> ]</td></tr>";
		}
		echo "</table><br><br>"
		."<input type=\"hidden\" name=\"topicid\" value=\"$topicid\">"
		."<input type=\"hidden\" name=\"op\" value=\"topicchange\">"
		."<INPUT type=\"submit\" value=\""._SAVECHANGES . "\"> <span class=\"content\">[ <a href=\"".$admin_file.".php?op=topicdelete&amp;topicid=$topicid\">"._DELETE . "</a> ]</span>"
		."</form>";
		CloseTable();
		include("footer.php");
	}

	function relatededit($tid, $rid) {
		global $prefix, $db, $admin_file, $tipath;
		include("header.php");
		GraphicAdmin();
		OpenTable();
		echo "<center><span class=\"title\"><b>"._TOPICSMANAGER . "</b></span></center>";
		CloseTable();
		echo "<br>";
		$rid = intval($rid);
		$tid = intval($tid);
		$query = $db->sql_query("SELECT name, url from ".$prefix . "_related where rid='$rid'");
		list($name, $url) = $db->sql_fetchrow($query);
		$query = $db->sql_query("SELECT topictext, topicimage from ".$prefix . "_topics where topicid='$tid'");
		list($topictext, $topicimage) = $db->sql_fetchrow($query);
		OpenTable();
		echo "<center>"
		."<img src=\"$tipath/$topicimage\" border=\"0\" alt=\"$topictext\" align=\"right\">"
		."<span class=\"option\"><b>"._EDITRELATED . "</b></span><br>"
		."<b>"._TOPIC . ":</b> $topictext</center>"
		."<form action=\"".$admin_file.".php\" method=\"post\">"
		.""._SITENAME . ": <input type=\"text\" name=\"name\" value=\"$name\" size=\"30\" maxlength=\"30\"><br><br>"
		.""._URL . ": <input type=\"text\" name=\"url\" value=\"".stripslashes($url)."\" size=\"60\" maxlength=\"200\"><br><br>"
		."<input type=\"hidden\" name=\"op\" value=\"relatedsave\">"
		."<input type=\"hidden\" name=\"tid\" value=\"$tid\">"
		."<input type=\"hidden\" name=\"rid\" value=\"$rid\">"
		."<input type=\"submit\" value=\""._SAVECHANGES . "\"> "._GOBACK . ""
		."</form>";
		CloseTable();
		include("footer.php");
	}

	function relatedsave($tid, $rid, $name, $url) {
		global $prefix, $db, $admin_file;
		$rid = intval($rid);
		$db->sql_query("update ".$prefix . "_related set name='$name', url='$url' where rid='$rid'");
		Header("Location: ".$admin_file.".php?op=topicedit&topicid=$tid");
	}

	function relateddelete($tid, $rid) {
		global $prefix, $db, $admin_file;
		$rid = intval($rid);
		$db->sql_query("delete from ".$prefix . "_related where rid='$rid'");
		Header("Location: ".$admin_file.".php?op=topicedit&topicid=$tid");
	}

	function topicmake($topicname, $topicimage, $topictext) {
		global $prefix, $db, $admin_file;
		$topicname = stripslashes(FixQuotes($topicname));
		$topicimage = stripslashes(FixQuotes($topicimage));
		$topictext = stripslashes(FixQuotes($topictext));
		$db->sql_query("INSERT INTO ".$prefix . "_topics VALUES (NULL,'$topicname','$topicimage','$topictext','0')");
		Header("Location: ".$admin_file.".php?op=topicsmanager#Add");
	}

	function topicchange($topicid, $topicname, $topicimage, $topictext, $name, $url) {
		global $prefix, $db, $admin_file;
		$topicname = stripslashes(FixQuotes($topicname));
		$topicimage = stripslashes(FixQuotes($topicimage));
		$topictext = stripslashes(FixQuotes($topictext));
		$name = stripslashes(FixQuotes($name));
		$url = stripslashes(FixQuotes($url));
		$topicid = intval($topicid);
		$db->sql_query("update ".$prefix . "_topics set topicname='$topicname', topicimage='$topicimage', topictext='$topictext' where topicid='$topicid'");
		if (!$name) {
		} else {
			$db->sql_query("insert into ".$prefix . "_related VALUES (NULL, '$topicid','$name','$url')");
		}
		Header("Location: ".$admin_file.".php?op=topicedit&topicid=$topicid");
	}

	function topicdelete($topicid, $ok=0) {
		global $prefix, $db, $admin_file, $tipath;
		$topicid = intval($topicid);
		if ($ok==1) {
			$query = $db->sql_query("SELECT sid from " . $prefix . "_stories where topic='$topicid'");
                        list($sid) = $db->sql_fetchrow($query);
			$sid = intval($sid);
			$db->sql_query("delete from " . $prefix . "_stories where topic='$topicid'");
			$db->sql_query("delete from " . $prefix . "_topics where topicid='$topicid'");
			$db->sql_query("delete from " . $prefix . "_related where tid='$topicid'");
			$query = $db->sql_query("SELECT sid from " . $prefix . "_comments where sid='$sid'");
                        list($sid) = $db->sql_fetchrow($query);
			$sid = intval($sid);
			$db->sql_query("delete from " . $prefix . "_comments where sid='$sid'");
			Header("Location: ".$admin_file.".php?op=topicsmanager");
		} else {
			global $topicimage;
			include("header.php");
			GraphicAdmin();
			OpenTable();
			echo "<center><span class=\"title\"><b>" . _TOPICSMANAGER . "</b></span></center>";
			CloseTable();
			echo "<br>";
			$sql = "SELECT topicimage, topictext from " . $prefix . "_topics where topicid='$topicid'";
			$query = $db->sql_query($sql);
			list($topicimage, $topictext) = $db->sql_fetchrow($query);
			OpenTable();
			echo "<center><img src=\"$tipath/$topicimage\" border=\"0\" alt=\"$topictext\"><br><br>";
			echo "<b>" . _DELETETOPIC . " $topictext</b><br><br>"._TOPICDELSURE." <i>$topictext</i>?<br>";
			echo _TOPICDELSURE1."<br><br>[ <a href=\"".$admin_file.".php?op=topicsmanager\">" . _NO . "</a> | ";
                        echo "<a href=\"".$admin_file.".php?op=topicdelete&amp;topicid=$topicid&amp;ok=1\">" . _YES . "</a> ]</center><br><br>";
			CloseTable();
			include("footer.php");
		}
	}

	switch ($op) {

		case "topicsmanager":
		topicsmanager();
		break;

		case "topicedit":
		topicedit($topicid);
		break;

		case "topicmake":
		topicmake($topicname, $topicimage, $topictext);
		break;

		case "topicdelete":
		topicdelete($topicid, $ok);
		break;

		case "topicchange":
		topicchange($topicid, $topicname, $topicimage, $topictext, $name, $url);
		break;

		case "relatedsave":
		relatedsave($tid, $rid, $name, $url);
		break;

		case "relatededit":
		relatededit($tid, $rid);
		break;

		case "relateddelete":
		relateddelete($tid, $rid);
		break;

	}

} else {
	include("header.php");
	GraphicAdmin();
	OpenTable();
	echo "<center><b>"._ERROR."</b><br><br>You do not have administration permission for module \"$module_name\"</center>";
	CloseTable();
	include("footer.php");
}

?>