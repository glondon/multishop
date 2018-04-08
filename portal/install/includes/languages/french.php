<?php

/************************************************************************/
/* Php-MultiShop                                                        */
/* http://www.php-multishop.com                                         */
/* Copyright (c) 2003-2005 by Piero Trono                               */
/* ======================================                               */
/*                                                                      */
/* Translation by CRDD, coroidedroite@yahoo.fr                          */
/*                                                                      */
/* This	program	is free	software. You can redistribute it and/or modify	*/
/* it under the	terms of the GNU General Public	License	as published by	*/
/* the Free Software Foundation; either	version	2 of the License.       */
/************************************************************************/
/* $Id: french.php,v 1.2 2005/11/22 16:49:18 tropic Exp $ */


define('CHARSET', 'iso-8859-1');
define("FEEDBACK","Note: please, contact me for any feedback, suggestions or report of bug");
define("INSTALLATION_PHPMULTISHPOP","Installation de Php-MultiShop");
define("SELECT_LANGUAGE","Choisir la langue");
define("NEW_INSTALLATION","Nouvelle Installation");
define("TEXT_NEW_INSTALLATION","Php-MultiShop est une solution open source pour cr�er un portail et une ou plusieurs boutique e-commerce dans une structure unique: un <i>Virtual Mall</i>."
		."<br><br>VOus �tes maintenant en train d'installer le <font class=\"blue\"><i>portail</i></font> de  <b>Php-MultiShop</b>, bas� sur l'un des CMS les plus populaires: <b>PHPNuke</b>."
		."<br>Avec ce portail, vous pourrez facilement cr�er, personnaliser et g�rer votre <font class=\"blue\"><i>Communaut�</i></font>, en utilisant de nombreux outils: "
		."news, forums, newsletter, chat, curiosit�s, suggestions, commentaires, �venements culturels ou commerciaux, foires, recettes, itin�raires touristiques, ..."
		."<br><br>De plus, si vous d�sirez utiliser votre portail pour de <font class=\"blue\"><i>l'e-commerce</i></font>, vous pouvez installer "
		."une boutique (ou plusieurs boutiques ind�pendantes) en utilisant une <font class=\"blue\"><i>e-boutique</i></font> inclue dans ce pack, "
		."bas�e sur le syst�me d'e-commerce <b>osCommerce</b>. Vous devrez r�petez cette '<i>proc�dure</i>' pour chaque boutique que vous voudrez installer.<br><br>"
		."Il ne vous reste plus qu'� appuyer sur le bouton <i><u>Start</u></i> et suivre les �tapes suivantes: "
		."Tout d'abord, si vous souhaitez utiliser cette plateforme, vous devez accepter les termes de la Licence GNU/GPL, "
		."puis vous devrez entrer les informations utiles pour la connection et la configuration."
		."<br><br>Bon travail,<br>&nbsp;&nbsp;<i>Piero Trono</i>.");
define("READ_LICENSE","S'il vous pla�t, veuillez lire la Licence suivante, et n'oubliez pas pour l'�tape suivante ce qu'indique la licence dans le paragraphe <font class=\"blue\"><b>2(c)</b></font> � propos du <font class=\"blue\"><i>Copyright</i></font>:");
define("ACCEPT","J'accepte les termes de cet accord");
define("I_READ","J'ai lu la note");
define("I_READ_STOP","Vous n'avez pas lu la note � propos du Disclaimer qui va �tre affich� en bas de la page de votre portail."
		."<br><br>S'il vous pla�t, cliquer sur le bouton <u>back</u> et cochez la case '<i>" . I_READ . "</i>'.");
define("LICENSE_STOP","Vous n'avez pas accept� la Licence GNU/GPL. Vous ne pouvez pas utiliser ce logiciel, d�sol�."
		."<br><br>Si vous voulez accepter la Licence, cliquez sur le bouton <u>back</u>.");
define("LICENSE_OK","<b>OK</b>,<br>vous avez accept� les termes de la Licence GNU/GPL.<br><br><b>Note Importante</b>:<br>en bas de la page du portail que vous installez sera affich� le <font class=\"blue\"><i>Copyright</i></font> (ou <i>disclaimer</i>) � propos de la Licence GNU/GPL et des auteurs de ce logiciel.");
define("COPYRIGHT_POLICY","Selon le mail num�ro 213080 � Dave Turner (GPL Compliance Engineer) de la part de la Free Software Foundation, "
		."ce copyright est en accord � 100% avec la licence GPL, section <font class=\"blue\"><i>2(c)</i></font>."
		."<br><font color=\"#ff0000\">Ce copyright ne peut �tre supprim� des pages g�ner�es</font>; Si vous souhaitez l'enlever, vous devez vous procurer une licence comerciale."
		."<br>Plus de d�tails sur les <i>Copyright</i> <a href=\"http://php-multishop.com/copyright-policy.php\"><font class=\"blue\">ici</font></a>.");
define("I_READ_OK","Merci pour votre choix,<br> maintenant vous pouvez installer le '<i>portail</i>' de Php-MultiShop.");
define("TITLE_CREATE_DB","Etape 1: Cr�er votre Base de Donn�es");
define("TEXT_CREATE_DB","Cr�ez une base de donn�s appel�e, par exemple, <i>nuke</i>.<br>"
		."Sous un syst�me de type Unix avec MySQL (*), vous pouvez utiliser cette commande:");
define("AFTER_CREATION_DB","Si vous avez cr�� avec succ�s la base de donn�es, vous pouvez passer � l'�tape suivante.");
define("PHPMYADMIN","(*): naturellement, vous pouvez utiliser d'autres moyens pour cr�er votre base de donn�es, en utilisant par exemple <a href=\"http://www.phpmyadmin.net\">phpMyAdmin</a>.");
define("TITLE_IMPORT_DB","Etape 2: Import de la Base de Donn�es");
define("CHANGE_PREFIX","Si vous souhaitez utiliser un autre <i>Pr�fixe</i> pour vos tables, remplacer tous les  '<b>nuke_</b>' par le pr�fixe de votre choix dans le fichier");
define("TEXT_IMPORT_DB","Veuillez entrer les informations sur le serveur de Base de Donn�es et sa configurqtion:");
define("MISSING_DATA","Il manque des informations,<br>veuillez cliquer sur le bouton <i>back</i> et recommencez.");
define("ERROR_DB","La connection test � votre base de donn�es n'a pas r�ussi.<br><br>Veuillez cliquer sur le bouton <i>back</i> pour revoir la configuration de votre serveur de base de donn�es."
		."<br>Si vous avez besoin d'aide concernant la configuration de votre serveur de base de donn�es, veuillez contacter votre h�bergeur.");
define("ERROR_SQL_FILE","<b>Erreur</b>: le fichier SQL n'existe pas.<br>");
define("ERROR_DB_2","<b>Erreur</b>: l'import SQL a �chou�.");
define("IMPORT_DB_OK","Import <b>r�ussi</b>: ");
define("IMPORT_PROBLEMS","Some errors have occurred: ");
define("TABLES_INSTEAD"," tables cr�e au lieu de ");
define("TABLES_ON"," tables sur ");
define("IMPORT_MANUALLY","Before to continue with the next step, you should <b>install manually the DataBase</b>, using the file: ");
define("WEB_ADDRESS","Adresse Web de votre portail, par exemple:<br> <i>http://www.mon-portail.com/</i>");
define("FULL_PATH","Chemin sur le serveur du r�pertoire o� est install� Php-MultiShop, par exemple<br> <i>/var/www/html/multishop/</i>");
define("TEXT_ADMIN_FILE","Administration panel filename: '<i>admin</i>' by default for '<i>admin.php</i>'. To improve security please choose other filename, put the new value and rename the old 'admin.php' on server to it, without .php extension");
define("SECURITY_CODE","Activer l'image de s�curit� lors de l'identification");
define("TITLE_CONFIGURATION","Etape 3: Configuration");
define("TITLE_CREATE_ADMIN","Etape 4: Cr�ation du Super-Administrateur");
define("WRITE_CONFIG","(�criture du fichier '<i>config.php</i>')");
define("NOT_WRITABLE","<b>Attention</b>: le fichier <i>config.php</i> est prot�g� en �criture."
		."<br>Veuillez changer les droits en �criture du fichier config.php en <font color=\"red\">chmod 666</font> (modifiable en �criture), "
		."puis cliquez sur le bouton <i>next</i>.<br>Par exemple, sous un environnement Unix:");
define("NOT_EXISTS","<b>Attention</b>: le fichier <i>config.php</i> <b>est INTROUVABLE</b>.<br>Veuillez v�rifier le pack et le chemin du fichier <i>config.php</i>.<br>Le chemin complet doit �tre:");
define("WRITE_OK","La configuration s'est d�roul�e avec <b>succ�s!</b>");
define("RETRY_CHMOD","Maintenant, remettez le fichier config.php en <font color=\"red\"><b>chmod 644</b></font>.");
define("WARNING_CHMOD","N'oubliez pas de mettre le fichier config.php em chmod 644.");
define("CREATE_ADMIN","Apr�s, vous devez cr�er le <i>Super-Administrateur</i> de votre Portail.");
define("CREATE_USER","Cr�er aussi un utilisateur pour ce compte?");
define("CREATION_ADMIN","Cr�ation Super-Administrateur");
define("TITLE_FINISH","Fin de l'installation");
define("ADMIN_STOP","Une erreur a eu lieu.<br>Veuillez entrer et v�rifier toutes les donn�es requises.");
define("ADMIN_CREATED","<b>F�licitations</b>: le Super-Administrateur a �t� cr�� avec <b>succ�s!</b><br><br>"
		."Maintenant vous devez vous identifier avec ce compte pour indiquer vos <i>pr�f�rences</i> dans le menu d'Administration. "
		."Vous pourrez ensuite utiliser votre nouveau portail.<br>Les valeurs importantes des <i>pr�f�rences</i> que vous <font color=\"red\"><b>devez changer</b></font> sont:");
define("MORE_CONFIGURATION","Note: vous pouvez modifier votre pr�f�rences en �ditant le fichier config.php.");
define("DELETE_FOLDER","Apr�s l'installation, <font color=\"red\"><b>supprimez</b></font> le dossier '<b>install</b>' de votre serveur.");
define("TEXT_SUBSCRIPTION","Si vous souhaitez contr�ler les inscriptions sur votre site, vous devez inscrire ici l'URL de la page d'inscription/r�inscription. Un e-mail sera envoy�.");
define("TEXT_ADVANCED_EDITOR","Activer/d�sactiver l'�diteur de texte WYSIWYG pour les administrateurs.");
define("RENAME_ADMIN_FILE","<font color=\"red\"><b>Important</b></font>: before of Login, you must rename the '<b>admin.php</b>' file to ");

?>
