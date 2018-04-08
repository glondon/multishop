<?php
/*
  $Id: login.php,v 1.2 2005/11/22 22:08:48 tropic Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Changed by Piero Trono (c) 2005 for http://php-multishop.com

  Released under the GNU General Public License
*/

  require('includes/application_top.php');
  
  if (isset($HTTP_GET_VARS['action']) && ($HTTP_GET_VARS['action'] == 'process')) {
    $email_address = tep_db_prepare_input($HTTP_POST_VARS['email_address']);
    $password = tep_db_prepare_input($HTTP_POST_VARS['password']);

// Check if email exists
    $check_admin_query = tep_db_query("select admin_id as login_id, admin_groups_id as login_groups_id, admin_firstname as login_firstname, admin_email_address as login_email_address, admin_password as login_password, admin_modified as login_modified, admin_logdate as login_logdate, admin_lognum as login_lognum from " . TABLE_ADMIN . " where admin_email_address = '" . tep_db_input($email_address) . "'");
    if (!tep_db_num_rows($check_admin_query)) {
      $HTTP_GET_VARS['login'] = 'fail';
    } else {
      $check_admin = tep_db_fetch_array($check_admin_query);
      // Check that password is good
      if (!tep_validate_password($password, $check_admin['login_password'])) {
        $HTTP_GET_VARS['login'] = 'fail';
      } else {
        if (tep_session_is_registered('password_forgotten')) {
          tep_session_unregister('password_forgotten');
        }

        $login_id = $check_admin['login_id'];
        $login_groups_id = $check_admin[login_groups_id];
        $login_firstname = $check_admin['login_firstname'];
        $login_email_address = $check_admin['login_email_address'];
        $login_logdate = $check_admin['login_logdate'];
        $login_lognum = $check_admin['login_lognum'];
        $login_modified = $check_admin['login_modified'];

        tep_session_register('login_id');
        tep_session_register('login_groups_id');
        tep_session_register('login_first_name');

        //$date_now = date('Ymd');
        tep_db_query("update " . TABLE_ADMIN . " set admin_logdate = now(), admin_lognum = admin_lognum+1 where admin_id = '" . $login_id . "'");

        if (($login_lognum == 0) || !($login_logdate) || ($login_email_address == 'admin@localhost') || ($login_modified == '0000-00-00 00:00:00')) {
          tep_redirect(tep_href_link(FILENAME_ADMIN_ACCOUNT));
        } else {
          tep_redirect(tep_href_link(FILENAME_DEFAULT));
        }

      }
    }
  }

  @include(DIR_WS_LANGUAGES . $language . '/' . FILENAME_LOGIN);
?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<title><?php echo TITLE; ?></title>
<style type="text/css"><!--
a { color:#080381; text-decoration:none; }
a:hover { color:#aabbdd; text-decoration:underline; }
a.text:link, a.text:visited { color: #ffffff; text-decoration: none; }
a:text:hover { color: #000000; text-decoration: underline; }
a.sub:link, a.sub:visited { color: #dddddd; text-decoration: none; }
A.sub:hover { color: #dddddd; text-decoration: underline; }
.sub { font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; font-weight: bold; line-height: 1.5; color: #dddddd; }
.text { font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 11px; font-weight: bold; color: #000000; }
.smallText { font-family: Verdana, Arial, sans-serif; font-size: 10px; }
.login_heading { font-family: Verdana, Arial, sans-serif; font-size: 12px; color: #ffffff;}
.login { font-family: Verdana, Arial, sans-serif; font-size: 12px; color: #000000;}
//--></style>
</head>
<body marginwidth="0" marginheight="0" topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0" bgcolor="#FFFFFF">

<table border="0" width="600" height="100%" cellspacing="0" cellpadding="0" align="center" valign="middle">
  <tr>
    <td><table border="0" width="600" height="440" cellspacing="0" cellpadding="1" align="center" valign="middle">
      <tr bgcolor="#000000">
        <td><table border="0" width="600" height="440" cellspacing="0" cellpadding="0">
          <tr bgcolor="#ffffff" height="50">
            <td height="50"><?php echo tep_image(DIR_WS_IMAGES . 'shopadmin.gif', 'admin of Store'); ?></td>
            <td align="right" class="text" nowrap><?php echo '<a href="' . tep_href_link(FILENAME_DEFAULT) . '">' . HEADER_TITLE_ADMINISTRATION . '</a>&nbsp;|&nbsp;<a href="' . tep_catalog_href_link() . '">' . HEADER_TITLE_ONLINE_CATALOG . '</a>&nbsp;|&nbsp;<a href="http://www.oscommerce.com" target="_blank">' . HEADER_TITLE_SUPPORT_SITE . '</a>'; ?>&nbsp;&nbsp;</td>
          </tr>
          <tr bgcolor="#080381">
            <td colspan="2" align="center" valign="middle">
                          <?php echo tep_draw_form('login', FILENAME_LOGIN, 'action=process'); ?>
                            <table width="280" border="0" cellspacing="0" cellpadding="2">
                              <tr>
                                <td class="login_heading" valign="top">&nbsp;<b><?php echo HEADING_RETURNING_ADMIN; ?></b></td>
                              </tr>
                              <tr>
                                <td height="100%" valign="top" align="center">
                                <table border="0" height="100%" cellspacing="0" cellpadding="1" bgcolor="#666666">
                                  <tr><td><table border="0" width="100%" height="100%" cellspacing="3" cellpadding="2" bgcolor="#F0F0FF">
<?php
  if ($HTTP_GET_VARS['login'] == 'fail') {
    $info_message = TEXT_LOGIN_ERROR;
  }

  if (isset($info_message)) {
?>
                                    <tr>
                                      <td colspan="2" class="smallText" align="center"><?php echo $info_message; ?></td>
                                    </tr>
<?php
  } else {
?>
                                    <tr>
                                      <td colspan="2"><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
                                    </tr>
<?php
  }
?>                                    
                                    <tr>
                                      <td class="login"><?php echo ENTRY_EMAIL_ADDRESS; ?></td>
                                      <td class="login"><?php echo tep_draw_input_field('email_address'); ?></td>
                                    </tr>
                                    <tr>
                                      <td class="login"><?php echo ENTRY_PASSWORD; ?></td>
                                      <td class="login"><?php echo tep_draw_password_field('password'); ?></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2" align="right" valign="top"><?php echo tep_image_submit('button_confirm.gif', IMAGE_BUTTON_LOGIN); ?></td>
                                    </tr>
                                  </table></td></tr>
                                </table>
                                </td>
                              </tr>
                              <tr>
                                <td valign="top" align="right"><?php echo '<a class="sub" href="' . tep_href_link(FILENAME_PASSWORD_FORGOTTEN, '', 'SSL') . '">' . TEXT_PASSWORD_FORGOTTEN . '</a><span class="sub">&nbsp;</span>'; ?></td>
                              </tr>
                            </table>
                          </form>

            </td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><?php require(DIR_WS_INCLUDES . 'footer.php'); ?></td>
      </tr>
    </table></td>
  </tr>
</table>

</body>

</html>