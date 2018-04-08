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
/* $Id: english.php,v 1.2 2005/11/22 16:49:18 tropic Exp $ */


define('CHARSET', 'iso-8859-1');
define("FEEDBACK","Note: please, contact me for any feedback, suggestions or report of bug");
define("INSTALLATION_PHPMULTISHPOP","Installation of Php-MultiShop");
define("SELECT_LANGUAGE","Select language");
define("NEW_INSTALLATION","New Installation");
define("TEXT_NEW_INSTALLATION","Php-MultiShop is an open source solution to build a portal with one or many e-commerce store in a unique platform: a <i>Virtual Mall</i>."
		."<br><br>Now you are installing the <font class=\"blue\"><i>portal-side</i></font> of <b>Php-MultiShop</b>, based on one of the most popular and supported CMS: <b>PHPNuke</b>."
		."<br>With this portal you can easily create, personalize and manage your <font class=\"blue\"><i>Community</i></font>, using any type of content you want: "
		."news, forums, newsletter, chat, curiosities, suggestions, reviews, cultural or commercial events, fairs, recipes, tourist itineraries, ..."
		."<br><br>Besides, if you want to use your portal also for <font class=\"blue\"><i>e-commerce</i></font>, you can install "
		."one shop (or many independent shops) using the <font class=\"blue\"><i>store-side</i></font> included in this package, "
		."based on the great e-commerce cart system <b>osCommerce</b>. You have to replicate this '<i>module</i>' for each store you want to install.<br><br>"
		."Now just you have to click on the <i><u>Start</u></i> button and follow some steps: "
		."first all, if you want to use this platform, you must accept the terms of the GNU/GPL License, "
		."then insert the required data for connection and configuration."
		."<br><br>Good job,<br>&nbsp;&nbsp;<i>Piero Trono</i>.");
define("READ_LICENSE","Please, read the following License, and keep in mind for the next step what the license tells in the <font class=\"blue\"><b>2(c)</b></font> item about <font class=\"blue\"><i>Copyright Notice</i></font>:");
define("ACCEPT","I accept the Agreement");
define("I_READ","I read the notice");
define("I_READ_STOP","You don't have read the notice about the Disclaimer that will be displayed at the footer of the portal."
		."<br><br>Please, click on the <u>back</u> button and chek the checkbox with the label '<i>" . I_READ . "</i>'.");
define("LICENSE_STOP","You don't have accepted the GNU/GPL License then cannot use this Software, sorry."
		."<br><br>If you want to back to accept the License, click on the <u>back</u> button.");
define("LICENSE_OK","<b>OK</b>,<br>you have accepted the terms of GNU/GPL License.<br><br><b>Important Note</b>:<br>at the footer of the portal that you are installing, will be displayed a <font class=\"blue\"><i>Copyright Notice</i></font> (or <i>disclaimer</i>) about the authors of this software and the GNU/GPL License.");
define("COPYRIGHT_POLICY","According with the email number 213080 to Dave Turner (GPL Compliance Engineer) from the Free Software Foundation, "
		."this copyright notice is 100% compliant with the GPL license section <font class=\"blue\"><i>2(c)</i></font>."
		."<br><font color=\"#ff0000\">This copyright notice from the generated pages can't be removed</font>; if you want to legally remove it must purchase a Commercial License."
		."<br>Read more details about the <i>Copyright Policy</i> <a href=\"http://php-multishop.com/copyright-policy.php\"><font class=\"blue\">here</font></a>.");
define("I_READ_OK","Thanks for your choice,<br>now you can install the '<i>portal-side</i>' of Php-MultiShop.");
define("TITLE_CREATE_DB","Step 1: Create your DataBase");
define("TEXT_CREATE_DB","Create a database called, for example, <i>nuke</i>.<br>"
		."Through a shell in a Unix-like System with MySQL (*), for example, you can put the comand:");
define("AFTER_CREATION_DB","If you have successfully created the DB, you can go to the next step.");
define("PHPMYADMIN","(*): naturally you can use other ways to create your DataBase, for example using <a href=\"http://www.phpmyadmin.net\">phpMyAdmin</a>.");
define("TITLE_IMPORT_DB","Step 2: DataBase Import");
define("CHANGE_PREFIX","If you want to use another <i>Prefix</i> for your tables, replace all the '<b>nuke_</b>' words with your preferred Prefix in the file");
define("TEXT_IMPORT_DB","Please enter the DataBase server information and Configuration:");
define("MISSING_DATA","Some data is missing,<br>please click on the <i>back</i> button below and retry.");
define("ERROR_DB","A test connection made to the database was <b>NOT</b> successful.<br><br>Please click on the <i>back</i> button below to review your database server settings."
		."<br>If you require help with your database server settings, please consult your hosting company.");
define("ERROR_SQL_FILE","<b>Error</b>: the follow SQL file does not exist:<br>");
define("ERROR_DB_2","<b>Error</b>: the Sql Import was <b>NOT</b> successful.");
define("IMPORT_DB_OK","Import <b>Successful</b>: ");
define("IMPORT_PROBLEMS","Some errors have occurred: ");
define("TABLES_INSTEAD"," tables created instead of ");
define("TABLES_ON"," tables of ");
define("IMPORT_MANUALLY","Before to continue with the next step, you should <b>install manually the DataBase</b>, using the file: ");
define("WEB_ADDRESS","Web address of your Portal, for example:<br> <i>http://www.my-portal.com/</i>");
define("FULL_PATH","Directory on the Server where Php-MultiShop is installed, for example<br> <i>/var/www/html/multishop/</i>");
define("TEXT_ADMIN_FILE","Administration panel filename: '<i>admin</i>' by default for '<i>admin.php</i>'. To improve security rename the old admin.php file on your server and insert here the new filename without the .php extension");
define("SECURITY_CODE","Set to dislpay, at login, the image with Security Code");
define("TITLE_CONFIGURATION","Step 3: Configuration");
define("TITLE_CREATE_ADMIN","Step 4: Creation of Super-Administrator");
define("WRITE_CONFIG","(writing the '<i>config.php</i>' file)");
define("NOT_WRITABLE","<b>Warning</b>: the <i>config.php</i> file is not writable."
		."<br>Please set <font color=\"red\">chmod 666</font> (writable) to config.php file, "
		."then click on <i>next</i> button.<br>For example, on a Unix-like System:");
define("NOT_EXISTS","<b>Warning</b>: file <i>config.php</i> <b>NOT found</b>.<br>Please, check the package and the path of <i>config.php</i> file on your FileSystem.<br>The full path sould be:");
define("WRITE_OK","The configuration was <b>successful!</b>");
define("RETRY_CHMOD","now retry <font color=\"red\"><b>chmod 644</b></font> to config.php file.");
define("WARNING_CHMOD","remember to set chmod 644 to config.php file.");
define("CREATE_ADMIN","After, you must create the <i>Super-Administrator</i> of your Portal.");
define("CREATE_USER","Create also an User with this account?");
define("CREATION_ADMIN","Creation Super-Administrator");
define("TITLE_FINISH","End of Installation");
define("ADMIN_STOP","Some error has occurred.<br>Please enter and check all the required datas.");
define("ADMIN_CREATED","<b>Congratulation</b>: Super-Administrator created <b>Successfully!</b><br><br>"
		."Now you must log-in with this account to set some <i>Preferences</i> in the Admin Panel, "
		."after you can use your New Portal.<br>The most important values of <i>Preferences</i> that you <font color=\"red\"><b>must change</b></font> are:");
define("MORE_CONFIGURATION","Note: you can change your configurations by editing the config.php file.");
define("DELETE_FOLDER","After this process, <font color=\"red\"><b>Delete</b></font> the '<b>install</b>' folder from your Server.");
define("TEXT_SUBSCRIPTION","If you manage subscriptions on your site, you must write here the url of the subscription information/renewal page. This will send by email if set.");
define("TEXT_ADVANCED_EDITOR","On/Off the advanced WYSIWYG text editor for admins.");
define("RENAME_ADMIN_FILE","<font color=\"red\"><b>Important</b></font>: before of Login, you must rename the '<b>admin.php</b>' file to ");

?>
