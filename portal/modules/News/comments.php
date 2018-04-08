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

if (!defined('MODULE_FILE')) {
	die ("You can't access this file directly...");
}
require_once("mainfile.php");
$module_name = basename(dirname(__FILE__));
get_lang($module_name);

function format_url($comment) {
	global $nukeurl;
	unset($location);
	$links = array();
	$hrefs = array();
	$pos = 0;
	while (!(($pos = strpos($comment,"<",$pos)) === false)) {
		$pos++;
		$endpos = strpos($comment,">",$pos);
		$tag = substr($comment,$pos,$endpos-$pos);
		$tag = trim($tag);
		if (isset($location)) {
			if (!strcasecmp(strtok($tag," "),"/A")) {
				$link = substr($comment,$linkpos,$pos-1-$linkpos);
				$links[] = $link;
				$hrefs[] = $location;
				unset($location);
			}
			$pos = $endpos+1;
		} else {
			if (!strcasecmp(strtok($tag," "),"A")) {
				if (eregi("HREF[ \t\n\r\v]*=[ \t\n\r\v]*\"([^\"]*)\"",$tag,$regs));
				else if (eregi("HREF[ \t\n\r\v]*=[ \t\n\r\v]*([^ \t\n\r\v]*)",$tag,$regs));
				else $regs[1] = "";
				if ($regs[1]) {
					$location = $regs[1];
				}
				$pos = $endpos+1;
				$linkpos = $pos;
			} else {
				$pos = $endpos+1;
			}
		}
	}
	for ($i=0; $i<sizeof($links); $i++) {
		if (!stripos_clone($hrefs[$i], "http://")) {
			$hrefs[$i] = $nukeurl;
		} elseif (!stripos_clone($hrefs[$i], "mailto://")) {
			$href = explode("/",$hrefs[$i]);
			$href = " [$href[2]]";
			$comment = str_replace(">$links[$i]</a>", "title='$hrefs[$i]'> $links[$i]</a>$href", $comment);
		}
	}
	return($comment);
}

function modone() {
	global $admin, $moderate, $module_name, $sid, $prefix, $db;
	$artsid = intval($sid);
	$comnum = $db->sql_numrows($db->sql_query("SELECT * FROM ".$prefix."_stories WHERE sid='$artsid' AND comments!='0'"));
	if ($comnum != 0) {
		if(((isset($admin)) AND ($moderate == 1)) || ($moderate==2)) echo "<form action=\"modules.php?name=$module_name&file=comments\" method=\"post\">";
	}
}

function modtwo($tid, $score, $reason) {
	global $admin, $user, $moderate, $reasons, $prefix, $db, $sid, $cookie, $userinfo;
	$artsid = intval($sid);
	$comnum = $db->sql_numrows($db->sql_query("SELECT * FROM ".$prefix."_stories WHERE sid='$artsid' AND comments!='0'"));
	if ($comnum != 0) {
		$whoisath = $db->sql_fetchrow($db->sql_query("SELECT name FROM ".$prefix."_comments WHERE tid='$tid'"));
		cookiedecode($user);
		if((((isset($admin)) AND ($moderate == 1)) || ($moderate == 2)) AND ($user)) {
			if (strtolower($cookie[1]) == strtolower($whoisath['name'])) {
				echo " | <select name=dkn$tid>";
				echo "<option value=\"$score:0\">$reasons[0]</option>\n";
				echo "</select>";
			} else {
				echo " | <select name=dkn$tid>";
				for($i=0; $i<sizeof($reasons); $i++) {
					echo "<option value=\"$score:$i\">$reasons[$i]</option>\n";
				}
				echo "</select>";
			}
		}
	}
}

function modthree($sid, $mode, $order, $thold=0) {
	global $admin, $user, $moderate, $db, $prefix, $userinfo, $cookie;
	$artsid = intval($sid);
	$comnum = $db->sql_numrows($db->sql_query("SELECT * FROM ".$prefix."_stories WHERE sid='$artsid' AND comments!='0'"));
	if ($comnum != 0) {
		if((((is_admin($admin)) AND ($moderate == 1)) || ($moderate==2)) AND ($user)) {
                  // Quake - start
		  getusrinfo($user);
          if (!isset($mode) OR empty($mode)) {
            if(isset($userinfo['umode'])) {
              $mode = $userinfo['umode'];
            } else {
              $mode = "thread";
            }
          }
          if (!isset($order) OR empty($order)) {
            if(isset($userinfo['uorder'])) {
              $order = $userinfo['uorder'];
            } else {
              $order = 0;
            }
          }
          if (!isset($thold) OR empty($thold)) {
            if(isset($userinfo['thold'])) {
              $thold = $userinfo['thold'];
            } else {
              $thold = 0;
            }
          }
          // Quake - end
		  $form = "<input type=hidden name=sid value=$sid>";
		  $form .= "<input type=hidden name=mode value=$mode>";
		  $form .= "<input type=hidden name=order value=$order>";
		  $form .= "<input type=hidden name=thold value=$thold>";
	    	  $form .= "<input type=hidden name=op value=moderate><br>";
	    	  echo $form;

	    	OpenTable();
	    	echo "<center><font class=\"title\">"._COMMENTSMODERATION."</font><br><br>"._CLICKTOMODERATE."<br><br>";
	    	echo "<input type=submit value=\""._MODERATE."\"></form></center>";
	    	CloseTable();
	    }
	}
}

function nocomm() {
	OpenTable();
	echo "<center><font class=\"content\">"._NOCOMMENTSACT."</font></center>";
	CloseTable();
}

function navbar($sid, $title, $thold, $mode, $order) {
	global $user, $bgcolor1, $bgcolor2, $textcolor1, $textcolor2, $anonpost, $prefix, $db, $module_name, $admin, $pid, $userinfo, $cookie;

                  // Quake - start
                  cookiedecode($user);
                  getusrinfo($user);
                  if (!isset($mode) OR empty($mode)) {
                    if(isset($userinfo['umode'])) {
                      $mode = $userinfo['umode'];
                    } else {
                      $mode = "thread";
                    }
                  }
                  if (!isset($order) OR empty($order)) {
                    if(isset($userinfo['uorder'])) {
                      $order = $userinfo['uorder'];
                    } else {
                      $order = 0;
                    }
                  }
                  if (!isset($thold) OR empty($thold)) {
                    if(isset($userinfo['thold'])) {
                      $thold = $userinfo['thold'];
                    } else {
                      $thold = 0;
                    }
                  }
                  // Quake - end

        $query = $db->sql_query("SELECT * FROM ".$prefix."_comments WHERE sid='$sid'");
	if(!$query) {
		$count = 0;
	} else {
		$count = $db->sql_numrows($query);
	}
        $sid = intval($sid);
        $query = $db->sql_query("SELECT title FROM ".$prefix."_stories WHERE sid='$sid'");
        list($un_title) = $db->sql_fetchrow($query);
	if(!isset($thold)) {
		$thold=0;
	}
	echo "\n\n<!-- COMMENTS NAVIGATION BAR START -->\n\n";
        echo "<a name=\"comments\"></a>\n";
	OpenTable();
	echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"2\">\n";
	if($title) {
		echo "<tr><td bgcolor=\"$bgcolor2\" align=\"center\"><font class=\"content\" color=\"$textcolor1\">\"$un_title\" | ";
		if(is_user($user)) {
			echo "<a href=\"modules.php?name=Your_Account&amp;op=editcomm\"><font color=\"$textcolor1\">"._CONFIGURE."</font></a>";
		} else {
			echo "<a href=\"modules.php?name=Your_Account\"><font color=\"$textcolor1\">"._LOGINCREATE."</font></a>";
		}
		if(($count==1)) {
			echo " | <B>$count</B> "._COMMENT."";
		} else {
			echo " | <B>$count</B> "._COMMENTS."";
		}
		if ($count > 0 AND is_active("Search")) {
			echo " | <a href='modules.php?name=Search&type=comments&sid=$sid'>"._SEARCHDIS."</a>";
		}
		echo "</font></td></tr>\n";
	}
	echo "<tr><td bgcolor=\"$bgcolor1\" align=\"center\" width=\"100%\">\n";
	if ($anonpost==1 OR is_user($user)) {
		echo "<form action=\"modules.php?name=$module_name&amp;file=comments\" method=\"post\">"
		."<input type=\"hidden\" name=\"pid\" value=\"$pid\">"
		."<input type=\"hidden\" name=\"sid\" value=\"$sid\">"
		."<input type=\"hidden\" name=\"op\" value=\"Reply\">"
		."<input type=\"submit\" value=\""._REPLYMAIN."\"></td></form></tr>";
	}
	echo "<tr><td bgcolor=\"$bgcolor2\" align=\"center\"><font class=\"tiny\">"._COMMENTSWARNING."</font></td></tr></table>"
	."\n\n<!-- COMMENTS NAVIGATION BAR END -->\n\n";
	CloseTable();
	if ($anonpost == 0 AND !is_user($user)) {
		echo "<br>";
		OpenTable();
		echo "<center>"._NOANONCOMMENTS."</center>";
		CloseTable();
	}
}

function DisplayKids ($tid, $mode, $order=0, $thold=0, $level=0, $dummy=0, $tblwidth=99) {
   global $datetime, $user, $cookie, $bgcolor1, $reasons, $anonymous, $anonpost, $commentlimit, $prefix, $textcolor2, $db, $module_name, $user_prefix, $userinfo, $cookie;
   $comments = 0;
   cookiedecode($user);
   getusrinfo($user);
   
                  // Quake - start
                  if (!isset($mode) OR empty($mode)) {
                    if(isset($userinfo['umode'])) {
                      $mode = $userinfo['umode'];
                    } else {
                      $mode = "thread";
                    }
                  }
                  if (!isset($order) OR empty($order)) {
                    if(isset($userinfo['uorder'])) {
                      $order = $userinfo['uorder'];
                    } else {
                      $order = 0;
                    }
                  }
                  if (!isset($thold) OR empty($thold)) {
                    if(isset($userinfo['thold'])) {
                      $thold = $userinfo['thold'];
                    } else {
                      $thold = 0;
                    }
                  }
                  // Quake - end

	$result = $db->sql_query("SELECT tid, pid, sid, date, name, email, host_name, subject, comment, score, reason FROM ".$prefix."_comments WHERE pid='$tid' ORDER BY date, tid");
	if ($mode == 'nested') {
		/* without the tblwidth variable, the tables run of the screen with netscape */
		/* in nested mode in long threads so the text can't be read. */
		while ($row = $db->sql_fetchrow($result)) {
			$r_tid = intval($row['tid']);
			$r_pid = intval($row['pid']);
			$r_sid = intval($row['sid']);
			$r_date = $row['date'];
			$r_name = stripslashes($row['name']);
			$r_email = stripslashes($row['email']);
			$r_host_name = $row['host_name'];
			$r_subject = stripslashes(check_html($row['subject'], "nohtml"));
			$r_comment = stripslashes($row['comment']);
			$r_score = intval($row['score']);
			$r_reason = intval($row['reason']);
			if($r_score >= $thold) {
				if (!isset($level)) {
				} else {
					if (!$comments) {
						echo "<ul>";
						$tblwidth -= 5;
					}
				}
				$comments++;
				if (!eregi("[a-z0-9]",$r_name)) $r_name = $anonymous;
				if (!eregi("[a-z0-9]",$r_subject)) $r_subject = "["._NOSUBJECT."]";
				// HIJO enter hex color between first two appostrophe for second alt bgcolor
				$r_bgcolor = ($dummy%2)?"":"#E6E6D2";
				echo "<a name=\"$r_tid\">";
				echo "<table border=\"0\"><tr bgcolor=\"$bgcolor1\"><td>";
				formatTimestamp($r_date);
				if ($r_email) {
					echo "<b>$r_subject</b> <font class=\"content\">";
					if($userinfo['noscore'] == 0) {
						echo "("._SCORE." $r_score";
						if($r_reason>0) echo ", $reasons[$r_reason]";
						echo ")";
					}
					echo "<br>"._BY." <a href=\"mailto:$r_email\">$r_name</a> <font class=\"content\"><b>($r_email)</b></font> "._ON." $datetime";
				} else {
					echo "<b>$r_subject</b> <font class=\"content\">";
					if($userinfo['noscore'] == 0) {
						echo "("._SCORE." $r_score";
						if($r_reason>0) echo ", $reasons[$r_reason]";
						echo ")";
					}
					echo "<br>"._BY." $r_name "._ON." $datetime";
				}
				if ($r_name != $anonymous) {
					$row2 = $db->sql_fetchrow($db->sql_query("SELECT user_id FROM ".$user_prefix."_users WHERE username='$r_name'"));
					$r_uid = intval($row2['user_id']);
					echo "<br>(<a href=\"modules.php?name=Your_Account&amp;op=userinfo&amp;username=$r_name\">"._USERINFO."</a> ";
                                        // Quake check for pvt msg is active
                                        if(is_active("Private_Messages")) {
                                          echo "| <a href=\"modules.php?name=Private_Messages&amp;mode=post&amp;u=$r_uid\">"._SENDAMSG."</a>) ";
				        }
				        echo ")";
				        // end
                                }
				$row_url = $db->sql_fetchrow($db->sql_query("SELECT user_website FROM ".$user_prefix."_users WHERE username='$r_name'"));
				$url = stripslashes($row_url['user_website']);
				if ($url != "http://" AND !empty($url) AND stripos_clone($url, "http://")) { echo "<a href=\"$url\" target=\"new\">$url</a> "; }
				echo "</font></td></tr><tr><td>";
					        // Quake - start
                $options = "";
      	        $options .= "&mode=".$mode;
	        $options .= "&order=".$order;
	        $options .= "&thold=".$thold;
	        // Quake - end
				if((isset($userinfo['commentmax'])) AND (strlen($r_comment) > $userinfo['commentmax'])) echo substr("$r_comment", 0, $userinfo['commentmax'])."<br><br><b><a href=\"modules.php?name=$module_name&amp;file=comments&amp;sid=$r_sid&amp;tid=$r_tid$options\">"._READREST."</a></b>";
				elseif(strlen($r_comment) > $commentlimit) echo substr("$r_comment", 0, $commentlimit)."<br><br><b><a href=\"modules.php?name=$module_name&amp;file=comments&amp;sid=$r_sid&amp;tid=$r_tid$options\">"._READREST."</a></b>";
				else echo $r_comment;
				echo "</td></tr></table><br><br>";
				if ($anonpost==1 OR is_admin($admin) OR is_user($user)) {
				echo "<font class=\"content\" color=\"$textcolor2\"> [ <a href=\"modules.php?name=$module_name&amp;file=comments&amp;op=Reply&amp;pid=$r_tid&amp;sid=$r_sid$options\">"._REPLY."</a>";
				}
				modtwo($r_tid, $r_score, $r_reason);
				echo " ]</font><br><br>";
				DisplayKids($r_tid, $mode, $order, $thold, $level+1, $dummy+1, $tblwidth);
			}
		}
	} elseif ($mode == 'flat') {
		while ($row = $db->sql_fetchrow($result)) {
			$r_tid = intval($row['tid']);
			$r_pid = intval($row['pid']);
			$r_sid = intval($row['sid']);
			$r_date = $row['date'];
			$r_name = stripslashes($row['name']);
			$r_email = stripslashes($row['email']);
			$r_host_name = $row['host_name'];
			$r_subject = stripslashes(check_html($row['subject'], "nohtml"));
			$r_comment = stripslashes($row['comment']);
			$r_score = intval($row['score']);
			$r_reason = intval($row['reason']);
			if($r_score >= $thold) {
				if (!eregi("[a-z0-9]",$r_name)) $r_name = $anonymous;
				if (!eregi("[a-z0-9]",$r_subject)) $r_subject = "["._NOSUBJECT."]";
				echo "<a name=\"$r_tid\">";
				echo "<hr><table width=\"99%\" border=\"0\"><tr bgcolor=\"$bgcolor1\"><td>";
				formatTimestamp($r_date);
				if ($r_email) {
					echo "<b>$r_subject</b> <font class=\"content\">";
					if($userinfo['noscore'] == 0) {
						echo "("._SCORE." $r_score";
						if($r_reason>0) echo ", $reasons[$r_reason]";
						echo ")";
					}
					echo "<br>"._BY." <a href=\"mailto:$r_email\">$r_name</a> <font class=\"content\"><b>($r_email)</b></font> "._ON." $datetime";
				} else {
					echo "<b>$r_subject</b> <font class=\"content\">";
					if($userinfo['noscore'] == 0) {
						echo "("._SCORE." $r_score";
						if($r_reason>0) echo ", $reasons[$r_reason]";
						echo ")";
					}
					echo "<br>"._BY." $r_name "._ON." $datetime";
				}
				if ($r_name != $anonymous) {
					$row3 = $db->sql_fetchrow($db->sql_query("SELECT user_id FROM ".$user_prefix."_users WHERE username='$r_name'"));
					$ruid = intval($row3['user_id']);
					echo "<br>(<a href=\"modules.php?name=Your_Account&amp;op=userinfo&amp;username=$r_name\">"._USERINFO."</a> | <a href=\"modules.php?name=Private_Messages&amp;mode=post&amp;u=$ruid\">"._SENDAMSG."</a>) ";
				}
				$row_url2 = $db->sql_fetchrow($db->sql_query("SELECT user_website FROM ".$user_prefix."_users WHERE username='$r_name'"));
				$url = stripslashes($row_url2['user_website']);
				if ($url != "http://" AND !empty($url) AND stripos_clone($url, "http://")) { echo "<a href=\"$url\" target=\"new\">$url</a> "; }
				echo "</font></td></tr><tr><td>";
					        // Quake - start
                $options = "";
      	        $options .= "&mode=".$mode;
	        $options .= "&order=".$order;
	        $options .= "&thold=".$thold;
	        // Quake - end
				if((isset($userinfo['commentmax'])) AND (strlen($r_comment) > $userinfo['commentmax'])) echo substr("$r_comment", 0, $userinfo['commentmax'])."<br><br><b><a href=\"modules.php?name=$module_name&amp;file=comments&amp;sid=$r_sid&amp;tid=$r_tid$options\">"._READREST."</a></b>";
				elseif(strlen($r_comment) > $commentlimit) echo substr("$r_comment", 0, $commentlimit)."<br><br><b><a href=\"modules.php?name=$module_name&amp;file=comments&amp;sid=$r_sid&amp;tid=$r_tid$options\">"._READREST."</a></b>";
				else echo $r_comment;
				echo "</td></tr></table><br><br>";
				if ($anonpost==1 OR is_admin($admin) OR is_user($user)) {
					echo "<font class=\"content\" color=\"$textcolor2\"> [ <a href=\"modules.php?name=$module_name&amp;file=comments&amp;op=Reply&amp;pid=$r_tid&amp;sid=$r_sid&amp;mode=$mode&amp;order=$order&amp;thold=$thold\">"._REPLY."</a>";
				}
				modtwo($r_tid, $r_score, $r_reason);
				echo " ]</font><br><br>";
				DisplayKids($r_tid, $mode, $order, $thold);
			}
		}
	} else {
		while ($row = $db->sql_fetchrow($result)) {
			$r_tid = intval($row['tid']);
			$r_pid = intval($row['pid']);
			$r_sid = intval($row['sid']);
			$r_date = $row['date'];
			$r_name = stripslashes($row['name']);
			$r_email = stripslashes($row['email']);
			$r_host_name = $row['host_name'];
			$r_subject = stripslashes(check_html($row['subject'], "nohtml"));
			$r_comment = stripslashes($row['comment']);
			$r_score = intval($row['score']);
			$r_reason = intval($row['reason']);
			if($r_score >= $thold) {
				if (!isset($level)) {
				} else {
					if (!$comments) {
						echo "<ul>";
					}
				}
				$comments++;
				if (!eregi("[a-z0-9]",$r_name)) $r_name = $anonymous;
				if (!eregi("[a-z0-9]",$r_subject)) $r_subject = "["._NOSUBJECT."]";
				formatTimestamp($r_date);
                                	        // Quake - start
                $options = "";
      	        $options .= "&mode=".$mode;
	        $options .= "&order=".$order;
	        $options .= "&thold=".$thold;
	        // Quake - end
				echo "<li><font class=\"content\" color=\"$textcolor2\"><a href=\"modules.php?name=$module_name&amp;file=comments&amp;op=showreply&amp;tid=$r_tid&amp;sid=$r_sid&amp;pid=$r_pid$options#$r_tid\">$r_subject</a> "._BY." $r_name "._ON." $datetime</font><br>";
				DisplayKids($r_tid, $mode, $order, $thold, $level+1, $dummy+1);
			}
		}
	}
	if ($level AND $comments) {
		echo "</ul>";
	}
}

function DisplayBabies ($tid, $level=0, $dummy=0) {
	global $datetime, $anonymous, $prefix, $db, $module_name, $userinfo, $cookie, $user;
	cookiedecode($user);
	getusrinfo($user);
        $comments = 0;
	$result = $db->sql_query("SELECT tid, pid, sid, date, name, email, host_name, subject, comment, score, reason FROM ".$prefix."_comments WHERE pid='$tid' ORDER BY date, tid");
	while ($row = $db->sql_fetchrow($result)) {
		$r_tid = intval($row['tid']);
		$r_pid = intval($row['pid']);
		$r_sid = intval($row['sid']);
		$r_date = $row['date'];
		$r_name = stripslashes($row['name']);
		$r_email = stripslashes($row['email']);
		$r_host_name = $row['host_name'];
		$r_subject = stripslashes(check_html($row['subject'], "nohtml"));
		$r_comment = stripslashes($row['comment']);
		$r_score = intval($row['score']);
		$r_reason = intval($row['reason']);
		if (isset($level) AND !$comments) {
		  echo "<ul>";
		}
		$comments++;
		if (!eregi("[a-z0-9]",$r_name)) { $r_name = $anonymous; }
		if (!eregi("[a-z0-9]",$r_subject)) { $r_subject = "["._NOSUBJECT."]"; }
		formatTimestamp($r_date);
                // Quake - start
                $options = "";
      	        $options .= "&mode=".$mode;
	        $options .= "&order=".$order;
	        $options .= "&thold=".$thold;
	        // Quake - end
		echo "<a href=\"modules.php?name=$module_name&amp;file=comments&amp;op=showreply&amp;tid=$r_tid$options\">$r_subject</a></font><font class=\"content\"> "._BY." $r_name "._ON." $datetime<br>";
		DisplayBabies($r_tid, $level+1, $dummy+1);
	}
	if ($level AND $comments) {
		echo "</ul>";
	}
}

function DisplayTopic ($sid, $pid=0, $tid=0, $mode="thread", $order=0, $thold=0, $level=0, $nokids=0) {
	global $title, $bgcolor1, $bgcolor2, $bgcolor3, $hr, $user, $datetime, $cookie, $admin, $commentlimit, $anonymous, $reasons, $anonpost, $foot1, $foot2, $foot3, $foot4, $prefix, $acomm, $articlecomm, $db, $module_name, $nukeurl, $admin_file, $user_prefix, $userinfo;
	include_once("header.php");
	$count_times = 0;
	cookiedecode($user);
	getusrinfo($user);
	$q = "SELECT tid, pid, sid, date, name, email, host_name, subject, comment, score, reason FROM ".$prefix."_comments WHERE sid='$sid' and pid='$pid'";
	if(!empty($thold)) {
		$q .= " AND score>='$thold'";
	} else {
		$q .= " AND score>='0'";
	}
	if ($order==1) $q .= " ORDER BY date DESC";
	if ($order==2) $q .= " ORDER BY score DESC";
	$something = $db->sql_query($q);
	$num_tid = $db->sql_numrows($something);
	if ($acomm == 1) {
		nocomm();
		return;
	}
	if (($acomm == 0) AND ($articlecomm == 1)) {
		navbar($sid, $title, $thold, $mode, $order);
	}
	modone();
	while ($count_times < $num_tid) {
		echo "<br>";
		OpenTable();
		$row_q = $db->sql_fetchrow($something);
		$tid = intval($row_q['tid']);
		$pid = intval($row_q['pid']);
		$sid = intval($row_q['sid']);
		$date = $row_q['date'];
		$c_name = stripslashes($row_q['name']);
		$email = stripslashes($row_q['email']);
		$host_name = $row_q['host_name'];
		$subject = stripslashes(check_html($row_q['subject'], "nohtml"));
		$comment = stripslashes($row_q['comment']);
		$score = intval($row_q['score']);
		$reason = intval($row_q['reason']);
		$karma = $db->sql_fetchrow($db->sql_query("SELECT karma FROM ".$user_prefix."_users WHERE username='$c_name'"));
		$karma = $karma['karma'];
		if (is_admin($admin)) {
			if ($karma == 1) {
				$karma = "<img src=\"images/karma/1.gif\" border=\"0\" alt=\""._KARMALOW."\" title=\""._KARMALOW."\">&nbsp;";
			} elseif ($karma == 2) {
				$karma = "<img src=\"images/karma/2.gif\" border=\"0\" alt=\""._KARMABAD."\" title=\""._KARMABAD."\">&nbsp;";
			} elseif ($karma == 3) {
				$karma = "<img src=\"images/karma/3.gif\" border=\"0\" alt=\""._KARMADEVIL."\" title=\""._KARMADEVIL."\">&nbsp;";
			} else {
				$karma = "";	
			}
		} else {
			$karma = "";	
		}
		if (empty($c_name)) { $c_name = $anonymous; }
		if (empty($subject)) { $subject = "["._NOSUBJECT."]"; }
		echo "<a name=\"$tid\"></a>";
		echo "<table width=\"99%\" border=\"0\"><tr bgcolor=\"$bgcolor1\"><td width=\"500\">";
		formatTimestamp($date);
		if ($email) {
			echo "<b>$subject</b> <font class=\"content\">";
			if($userinfo['noscore'] == 0) {
				echo "("._SCORE." $score";
				if($reason>0) echo ", $reasons[$reason]";
				echo ")";
			}
			echo "<br>"._BY." <a href=\"mailto:$email\">$c_name</a> <b>($email)</b> "._ON." $datetime";
		} else {
			echo "<b>$subject</b> <font class=\"content\">";
			if($userinfo['noscore'] == 0) {
				echo "("._SCORE." $score";
				if($reason>0) echo ", $reasons[$reason]";
				echo ")";
			}
			echo "<br>"._BY." $c_name "._ON." $datetime";
		}

		/* If you are admin you can see the Poster IP address */
		/* with this you can see who is flaming you...*/

		$journal = "";
		if (is_active("Journal")) {
			$row = $db->sql_fetchrow($db->sql_query("SELECT jid FROM ".$prefix."_journal WHERE aid='$c_name' AND status='yes' ORDER BY pdate,jid DESC LIMIT 0,1"));
			$jid = intval($row['jid']);
			if (!empty($jid) AND isset($jid)) {
				$journal = " | <a href=\"modules.php?name=Journal&amp;file=display&amp;jid=$jid\">"._JOURNAL."</a>";
			} else {
				$journal = "";
			}
		}
		if ($c_name != $anonymous) {
			$row2 = $db->sql_fetchrow($db->sql_query("SELECT user_id FROM ".$user_prefix."_users WHERE username='$c_name'"));
			$r_uid = intval($row2['user_id']);
			echo "<br>(<a href=\"modules.php?name=Your_Account&amp;op=userinfo&amp;username=$c_name\">"._USERINFO."</a> ";
                        if(is_active("Private_Messages")) {
                          echo "| <a href=\"modules.php?name=Private_Messages&amp;mode=post&amp;u=$r_uid\">"._SENDAMSG."</a>";
                        }
                        echo "$journal) ";
		}
		$row_url = $db->sql_fetchrow($db->sql_query("SELECT user_website FROM ".$user_prefix."_users WHERE username='$c_name'"));
		$url = stripslashes($row_url['user_website']);
		if ($url != "http://" AND !empty($url) AND stripos_clone($url, "http://")) { echo "<a href=\"$url\" target=\"new\">$url</a> "; }

		if(is_admin($admin)) {
			$row3 = $db->sql_fetchrow($db->sql_query("SELECT host_name FROM ".$prefix."_comments WHERE tid='$tid'"));
			$host_name = $row3['host_name'];
			echo "<br><b>(IP: $host_name)</b> $karma";
		}
		echo "</font></td></tr><tr><td>";
                // Quake - start
                $options = "";
      	        $options .= "&mode=".$mode;
	        $options .= "&order=".$order;
	        $options .= "&thold=".$thold;
	        // Quake - end
		if((isset($userinfo['commentmax'])) AND (strlen($comment) > $userinfo['commentmax'])) echo substr($comment, 0, $userinfo['commentmax'])."<br><br><b><a href=\"modules.php?name=$module_name&amp;file=comments&amp;sid=$r_sid&amp;tid=$r_tid$options\">"._READREST."</a></b>";
		elseif(strlen($comment) > $commentlimit) echo substr($comment, 0, $commentlimit)."<br><br><b><a href=\"modules.php?name=$module_name&amp;file=comments&amp;sid=$sid&tid=$tid$options\">"._READREST."</a></b>";
		else echo $comment;
		echo "</td></tr></table><br><br>";
		if ($anonpost==1 OR is_admin($admin) OR is_user($user)) {
			echo "<font class=\"content\"> [ <a href=\"modules.php?name=$module_name&amp;file=comments&amp;op=Reply&amp;pid=$tid&amp;sid=$sid$options\">"._REPLY."</a>";
		}
		if ($pid != 0) {
			$row4 = $db->sql_fetchrow($db->sql_query("SELECT pid FROM ".$prefix."_comments WHERE tid='$pid'"));
			$erin = intval($row4['pid']);
			echo " | <a href=\"modules.php?name=$module_name&amp;file=comments&amp;sid=$sid&amp;pid=$erin$options\">"._PARENT."</a>";
		}
		modtwo($tid, $score, $reason);

		if(is_admin($admin)) {
			echo " | <a href=\"".$admin_file.".php?op=RemoveComment&amp;tid=$tid&amp;sid=$sid\">"._DELETE."</a> ]</font><br><br>";
		} elseif ($anonpost != 0 OR is_admin($admin) OR is_user($user)) {
			echo " ]</font><br><br>";
		}

		DisplayKids($tid, $mode, $order, $thold, $level);
		echo "</ul>";
		if($hr) echo "<hr noshade size=\"1\">";
		$count_times += 1;
		CloseTable();
	}
	modthree($sid, $mode, $order, $thold);
	if ($pid==0) {
		return array($sid, $pid, $subject);
	} else {
		include("footer.php");
	}
}

function singlecomment($tid, $sid, $mode, $order, $thold) {
	global $module_name, $user, $cookie, $datetime, $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $admin, $anonpost, $prefix, $textcolor2, $db;
	include("header.php");
	cookiedecode($user);
	getusrinfo($user);
	$row = $db->sql_fetchrow($db->sql_query("SELECT date, name, email, subject, comment, score, reason FROM ".$prefix."_comments WHERE tid='$tid' AND sid='$sid'"));
	$date = $row['date'];
	$name = stripslashes($row['name']);
	$email = stripslashes($row['email']);
	$subject = stripslashes(check_html($row['subject'], "nohtml"));
	$comment = stripslashes($row['comment']);
	$score = intval($row['score']);
	$reason = intval($row['reason']);
	$titlebar = "<b>$subject</b>";
	if(empty($name)) $name = $anonymous;
	if(empty($subject)) $subject = "["._NOSUBJECT."]";
	modone();
	OpenTable();
	echo "<table width=\"99%\" border=\"0\"><tr bgcolor=\"$bgcolor1\"><td width=\"500\">";
	formatTimestamp($date);
	if($email) echo "<b>$subject</b> <font class=\"content\" color=\"$textcolor2\">("._SCORE." $score)<br>"._BY." <a href=\"mailto:$email\"><font color=\"$bgcolor2\">$name</font></a> <font class=content><b>($email)</b></font> "._ON." $datetime";
	else echo "<b>$subject</b> <font class=content>("._SCORE." $score)<br>"._BY." $name "._ON." $datetime";
	echo "</td></tr><tr><td>$comment</td></tr></table><br><br>";
	if ($anonpost==1 OR is_admin($admin) OR is_user($user)) {
	        // Quake - start
                $options = "";
      	        $options .= "&mode=".$mode;
	        $options .= "&order=".$order;
	        $options .= "&thold=".$thold;
	        // Quake - end
		echo "<font class=content> [ <a href=\"modules.php?name=$module_name&amp;file=comments&amp;op=Reply&amp;pid=$tid&amp;sid=$sid$options\">"._REPLY."</a> | <a href=\"modules.php?name=$module_name&amp;file=article&amp;sid=$sid$options\">"._ROOT."</a>";
	}
	modtwo($tid, $score, $reason);
	echo " ]";
	modthree($sid, $mode, $order, $thold);
	CloseTable();
	include("footer.php");
}

function reply($pid, $sid, $mode, $order, $thold) {
	//include("config.php");  // globalized - Quake
	include("header.php");
	global $prefix, $module_name, $user, $cookie, $datetime, $bgcolor1, $bgcolor2, $bgcolor3, $db, $anonpost, $anonymous, $admin;
	cookiedecode($user);
	getusrinfo($user);
        if ($anonpost == 0 AND !is_user($user)) {
		OpenTable();
		echo "<center><font class=title><b>"._COMMENTREPLY."</b></font></center>";
		CloseTable();
		echo "<br>";
		OpenTable();
		echo "<center>"._NOANONCOMMENTS."<br><br>"._GOBACK."</center>";
		CloseTable();
	} else {
		if ($pid != 0) {
			$row = $db->sql_fetchrow($db->sql_query("SELECT date, name, email, subject, comment, score FROM ".$prefix."_comments WHERE tid='$pid'"));
			$date = $row['date'];
			$name = stripslashes($row['name']);
			$email = stripslashes($row['email']);
			$subject = stripslashes(check_html($row['subject'], "nohtml"));
			$comment = stripslashes($row['comment']);
			$score = intval($row['score']);
		} else {
			$row2 = $db->sql_fetchrow($db->sql_query("SELECT time, title, hometext, bodytext, informant, notes FROM ".$prefix."_stories WHERE sid='$sid'"));
			$date = $row2['time'];
			$subject = stripslashes(check_html($row2['title'], "nohtml"));
			$temp_comment = stripslashes($row2['hometext']);
			$comment2 = stripslashes($row2['bodytext']);
			$name = stripslashes($row2['informant']);
			$notes = stripslashes($row2['notes']);
		}
		if(empty($comment)) {	
			$comment = $temp_comment."<br><br>$comment2";
		}
		OpenTable();
		echo "<center><font class=title><b>"._COMMENTREPLY."</b></font></center>";
		CloseTable();
		echo "<br>";
		OpenTable();
		if (empty($name)) $name = $anonymous;
		if (empty($subject)) $subject = "["._NOSUBJECT."]";
		formatTimestamp($date);
		echo "<b>$subject</b> <font class=\"content\">";
		if (!empty($temp_comment)) echo"("._SCORE." $score)";
		if (!empty($email)) {
			echo "<br>"._BY." <a href=\"mailto:$email\">$name</a> <font class=\"content\"><b>($email)</b></font> "._ON." $datetime";
		} else {
			echo "<br>"._BY." $name "._ON." $datetime";
		}
		echo "<br><br>$comment<br><br>";
		if ($pid == 0) {
			if (!empty($notes)) {
				echo "<b>"._NOTE."</b> <i>$notes</i><br><br>";
			} else {
				echo "";
			}
		}
		if (!isset($pid) || !isset($sid)) { echo "Something is not right. This message is just to keep things from messing up down the road"; exit(); }
		if ($pid == 0) {
			$row3 = $db->sql_fetchrow($db->sql_query("SELECT title FROM ".$prefix."_stories WHERE sid='$sid'"));
			$subject = stripslashes(check_html($row3['title'], "nohtml"));
		} else {
			$row4 = $db->sql_fetchrow($db->sql_query("SELECT subject FROM ".$prefix."_comments WHERE tid='$pid'"));
			$subject = stripslashes(check_html($row4['subject'], "nohtml"));
		}
		CloseTable();
		echo "<br>";
		OpenTable();
		echo "<form action=\"modules.php?name=$module_name&amp;file=comments\" method=\"post\">";
		echo "<font class=option><b>"._YOURNAME.":</b></font> ";
		if (is_user($user)) {
			cookiedecode($user);
			echo "<a href=\"modules.php?name=Your_Account\">$cookie[1]</a> <font class=\"content\">[ <a href=\"modules.php?name=Your_Account&amp;op=logout\">"._LOGOUT."</a> ]</font><br><br>";
		} else {
			echo "<font class=\"content\">$anonymous";
			echo " [ <a href=\"modules.php?name=Your_Account\">"._NEWUSER."</a> ]<br><br>";
		}
		echo "<font class=\"option\"><b>"._SUBJECT.":</b></font><br>";
		if (!stripos_clone($subject,"Re:")) $subject = "Re: ".substr($subject,0,81)."";
		echo "<input type=\"text\" name=\"subject\" size=\"50\" maxlength=\"85\" value=\"$subject\"><br><br>";
		echo "<font class=\"option\"><b>"._UCOMMENT.":</b></font><br>"
		."<textarea wrap=\"virtual\" cols=\"70\" rows=\"15\" name=\"comment\"></textarea><br>"
		."<font class=\"content\">"._HTMLNOTALLOWED."<br>";
		echo "<br>";
		if (is_user($user) AND ($anonpost == 1)) { echo "<input type=\"checkbox\" name=\"xanonpost\"> "._POSTANON."<br>"; }
                  // Quake - start
                  if (!isset($mode) OR empty($mode)) {
                    if(isset($userinfo['umode'])) {
                      $mode = $userinfo['umode'];
                    } else {
                      $mode = "thread";
                    }
                  }
                  if (!isset($order) OR empty($order)) {
                    if(isset($userinfo['uorder'])) {
                      $order = $userinfo['uorder'];
                    } else {
                      $order = 0;
                    }
                  }
                  if (!isset($thold) OR empty($thold)) {
                    if(isset($userinfo['thold'])) {
                      $thold = $userinfo['thold'];
                    } else {
                      $thold = 0;
                    }
                  }
                  // Quake - end

                echo "<input type=\"hidden\" name=\"pid\" value=\"$pid\">\n"
		."<input type=\"hidden\" name=\"sid\" value=\"$sid\">\n"
		."<input type=\"hidden\" name=\"mode\" value=\"$mode\">\n"
		."<input type=\"hidden\" name=\"order\" value=\"$order\">\n"
		."<input type=\"hidden\" name=\"thold\" value=\"$thold\">\n"
		."<input type=\"submit\" name=\"op\" value=\""._PREVIEW."\">\n"
		."<input type=\"submit\" name=\"op\" value=\""._OK."\">\n"
		."</font></form>\n";
		CloseTable();
	}
	include("footer.php");
}

function replyPreview ($pid, $sid, $subject, $comment, $xanonpost, $mode, $order, $thold) {
  global $module_name, $user, $cookie, $AllowableHTML, $anonymous, $anonpost, $userinfo;
        include("header.php");
	cookiedecode($user);
	getusrinfo($user);
	OpenTable();
	echo "<center><font class=\"title\"><b>"._COMREPLYPRE."</b></font></center>";
	CloseTable();
	echo "<br>";
	OpenTable();
	cookiedecode($user);
	$subject = stripslashes(check_html($subject, "nohtml"));
	$comment = stripslashes(check_html($comment));
	if (!isset($pid) OR !isset($sid)) {
		die(_NOTRIGHT);
	}
	echo "<b>$subject</b>";
	echo "<br><font class=\"content\">"._BY." ";
	if (is_user($user)) {
		echo $cookie[1];
	} else {
		echo $anonymous;
	}
	echo " "._ONN."</font><br><br>";
	echo $comment;
	CloseTable();
	echo "<br>";
	OpenTable();
	echo "<form action=\"modules.php?name=$module_name&amp;file=comments\" method=\"post\"><font class=\"option\"><b>"._YOURNAME.":</b></font> ";
	if (is_user($user)) {
		echo "<a href=\"modules.php?name=Your_Account\">$cookie[1]</a> <font class=\"content\">[ <a href=\"modules.php?name=Your_Account&amp;op=logout\">"._LOGOUT."</a> ]</font><br><br>";
	} else {
		echo "<font class=\"content\">$anonymous<br><br>";
	}
	echo "<font class=\"option\"><b>"._SUBJECT.":</b></font><br>"
	."<input type=\"text\" name=\"subject\" size=\"50\" maxlength=\"85\" value=\"$subject\"><br><br>"
	."<font class=\"option\"><b>"._UCOMMENT.":</b></font><br>"
	."<textarea wrap=\"virtual\" cols=\"70\" rows=\"15\" name=\"comment\">$comment</textarea><br>"
	."<font class=\"content\">"._HTMLNOTALLOWED."<br>";
	echo "<br>";
	if ($xanonpost AND $anonpost == 1){
		echo "<input type=\"checkbox\" name=\"xanonpost\" checked> "._POSTANON."<br>";
	} elseif (is_user($user) AND $anonpost == 1) {
		echo "<input type=\"checkbox\" name=\"xanonpost\"> "._POSTANON."<br>";
	}
	          // Quake - start
                  if (!isset($mode) OR empty($mode)) {
                    if(isset($userinfo['umode'])) {
                      $mode = $userinfo['umode'];
                    } else {
                      $mode = "thread";
                    }
                  }
                  if (!isset($order) OR empty($order)) {
                    if(isset($userinfo['uorder'])) {
                      $order = $userinfo['uorder'];
                    } else {
                      $order = 0;
                    }
                  }
                  if (!isset($thold) OR empty($thold)) {
                    if(isset($userinfo['thold'])) {
                      $thold = $userinfo['thold'];
                    } else {
                      $thold = 0;
                    }
                  }
                  // Quake - end

	echo "<input type=\"hidden\" name=\"pid\" value=\"$pid\">"
	."<input type=\"hidden\" name=\"sid\" value=\"$sid\">"
	."<input type=\"hidden\" name=\"mode\" value=\"$mode\">"
	."<input type=\"hidden\" name=\"order\" value=\"$order\">"
	."<input type=\"hidden\" name=\"thold\" value=\"$thold\">"
	."<input type=submit name=op value=\""._PREVIEW."\">"
	."<input type=submit name=op value=\""._OK."\">\n"
	."</font></form>";
	CloseTable();
	include("footer.php");
}

function CreateTopic ($xanonpost, $subject, $comment, $pid, $sid, $host_name, $mode, $order, $thold) {
	global $module_name, $user, $userinfo, $EditedMessage, $cookie, $AllowableHTML, $ultramode, $user_prefix, $prefix, $anonpost, $articlecomm, $db;
	cookiedecode($user);
	getusrinfo($user);
	$author = FixQuotes($author);
	$subject = FixQuotes(filter_text($subject, "nohtml"));
	$comment = format_url($comment);
	$comment = FixQuotes(stripslashes(filter_text($comment)));
	if (is_user($user) AND !$xanonpost) {
		$name = $userinfo['username'];
		$email = $userinfo['femail'];
		$url = $userinfo['user_website'];
		$score = 1;
	} else {
		$name = "";
		$email = "";
		$url = "";
		$score = 0;
	}
        if(!isset($ip)) {
          $ip = $_SERVER['REMOTE_ADDR'];
        }
	$fake = $db->sql_numrows($db->sql_query("SELECT * FROM ".$prefix."_stories WHERE sid='$sid'"));
	$comment = trim($comment);
	$comment = stripslashes(check_html($comment));
	if ($fake == 1 AND $articlecomm == 1) {
		if (($anonpost == 0 AND is_user($user)) OR $anonpost == 1) {
			if (is_user($user)) {
				$krow = $db->sql_fetchrow($db->sql_query("SELECT karma FROM ".$user_prefix."_users WHERE username='$name'"));
                // Quake - start
                $koptions = "";
      	        $koptions .= "&mode=".$mode;
                $koptions .= "&order=".$order;
                $koptions .= "&thold=".$thold;
                // Quake - end
				if ($krow['karma'] == 2) {
					$db->sql_query("INSERT INTO ".$prefix."_comments_moderated VALUES (NULL, '$pid', '$sid', now(), '$name', '$email', '$url', '$ip', '$subject', '$comment', '$score', '0', '0')");
					include("header.php");
					title(_MODERATEDTITLE);
					OpenTable();
					echo "<center>"._COMMENTMODERATED."";
					echo "<br><br><a href=\"modules.php?name=$module_name&file=article&sid=$sid$koptions\">"._MODERATEDRETURN."</a>";
					CloseTable();
					include("footer.php");
					die();
				} elseif ($krow['karma'] == 3) {
					Header("Location: modules.php?name=$module_name&file=article&sid=$sid$koptions");
					die();
				}
			}
			$db->sql_query("INSERT INTO ".$prefix."_comments VALUES (NULL, '$pid', '$sid', now(), '$name', '$email', '$url', '$ip', '$subject', '$comment', '$score', '0', '0')");
			$db->sql_query("UPDATE ".$prefix."_stories SET comments=comments+1 WHERE sid='$sid'");
			update_points(5);
			if ($ultramode) { ultramode(); }
		} else {
			die("Nice try..");
		}
	} else {
		include("header.php");
		echo "According to my records, the topic you are trying "
		."to reply to does not exist. If you're just trying to be "
		."annoying, well then too bad.";
		include("footer.php");
	}
	$options = "";
	// Quake - start
	$options = "";
	$options .= "&mode=".$mode;
	$options .= "&order=".$order;
	$options .= "&thold=".$thold;
	// Quake - end
	Header("Location: modules.php?name=$module_name&file=article&sid=$sid$options");
}

// Quake - start
if (isset($sid)) { $sid = intval($sid); } else { $sid = ""; }
if (isset($tid)) { $tid = intval($tid); } else { $tid = ""; }
if (isset($pid)) { $pid = intval($pid); } else { $pid = ""; }
if (isset($order)) { $order = intval($order); }
if (isset($thold)) { $thold = intval($thold); }

if (!isset($op) OR empty($op)) {
    $op = "DisplayTopic";
}

if (!isset($mode) OR empty($mode)) {
  if(isset($userinfo['umode'])) {
    $mode = $userinfo['umode'];
  } else {
    $mode = "thread";
  }
}
if (!isset($order) OR empty($order)) {
  if(isset($userinfo['uorder'])) {
    $order = $userinfo['uorder'];
  } else {
    $order = 0;
  }
}
if (!isset($thold) OR empty($thold)) {
  if(isset($userinfo['thold'])) {
    $thold = $userinfo['thold'];
  } else {
    $thold = 0;
  }
}
// Quake - end

switch($op) {

	case "Reply":
	reply($pid, $sid, $mode, $order, $thold);
	break;

	case ""._PREVIEW."":
	replyPreview ($pid, $sid, $subject, $comment, $xanonpost, $mode, $order, $thold);
	break;

	case ""._OK."":
	CreateTopic($xanonpost, $subject, $comment, $pid, $sid, $host_name, $mode, $order, $thold);
	break;

	case "moderate":
	if(!isset($admin)) {
	  require_once("mainfile.php");
	}
	global $userinfo;
	if(($admintest==1) || ($moderate==2)) {
		while(list($tdw, $emp) = each($_POST)) {
			if (stripos_clone($tdw,"dkn")) {
				$emp = explode(":", $emp);
				if($emp[1] != 0) {
					$tdw = str_replace("dkn", "", $tdw);
					$emp[0] = intval($emp[0]); 
					$emp[1] = intval($emp[1]); 
					$tdw = intval($tdw); 
					$q = "UPDATE ".$prefix."_comments SET";
					if(($emp[1] == 9) AND ($emp[0]>=0)) { # Overrated
						$q .= " score=score-1 where tid='$tdw'";
					} elseif (($emp[1] == 10) AND ($emp[0]<=4)) { # Underrated
						$q .= " score=score+1 where tid='$tdw'";
					} elseif (($emp[1] > 4) AND ($emp[0]<=4)) {
						$q .= " score=score+1, reason='$emp[1]' where tid='$tdw'";
					} elseif (($emp[1] < 5) AND ($emp[0] > -1)) {
						$q .= " score=score-1, reason='$emp[1]' where tid='$tdw'";
					} elseif (($emp[0] == -1) || ($emp[0] == 5)) {
						$q .= " reason='$emp[1]' where tid='$tdw'";
					}
					$row = $db->sql_fetchrow($db->sql_query("SELECT last_moderation_ip FROM ".$prefix."_comments WHERE tid='$tdw'"));
					$ip = $_SERVER['REMOTE_ADDR'];
					if(strlen($q) > 20 AND $row['last_moderation_ip'] != $ip) {
						$db->sql_query($q);
						$db->sql_query("UPDATE ".$prefix."_comments SET last_moderation_ip='$ip' WHERE tid='$tdw'");
					}
				}
			}
		}
	}
	// Quake - start
	$options = "";
        $options .= "&mode=".$mode;
        $options .= "&order=".$order;
        $options .= "&thold=".$thold;
        // Quake - end

	Header("Location: modules.php?name=$module_name&file=article&sid=$sid$options");
	break;

	case "showreply":
	DisplayTopic($sid, $pid, $tid, $mode, $order, $thold);
	break;

	default:
	if (!empty($tid) AND empty($pid)) {
	  singlecomment($tid, $sid, $mode, $order, $thold);
	} elseif (!defined('NUKE_FILE') xor ($pid==0 AND !isset($pid))) {
	        // Quake - start
                $options = "";
      	        $options .= "&mode=".$mode;
	        $options .= "&order=".$order;
	        $options .= "&thold=".$thold;
	        // Quake - end

	        Header("Location: modules.php?name=$module_name&file=article&sid=$sid$options");
        } else {
	  if(!isset($pid)) $pid=0;
          DisplayTopic($sid, $pid, $tid, $mode, $order, $thold);
        }
	break;

}

?>