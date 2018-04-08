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
define("TEXT_NEW_INSTALLATION","Php-MultiShop est une solution open source pour créer un portail et une ou plusieurs boutique e-commerce dans une structure unique: un <i>Virtual Mall</i>."
		."<br><br>VOus êtes maintenant en train d'installer le <font class=\"blue\"><i>portail</i></font> de  <b>Php-MultiShop</b>, basé sur l'un des CMS les plus populaires: <b>PHPNuke</b>."
		."<br>Avec ce portail, vous pourrez facilement créer, personnaliser et gérer votre <font class=\"blue\"><i>Communauté</i></font>, en utilisant de nombreux outils: "
		."news, forums, newsletter, chat, curiosités, suggestions, commentaires, évenements culturels ou commerciaux, foires, recettes, itinéraires touristiques, ..."
		."<br><br>De plus, si vous désirez utiliser votre portail pour de <font class=\"blue\"><i>l'e-commerce</i></font>, vous pouvez installer "
		."une boutique (ou plusieurs boutiques indépendantes) en utilisant une <font class=\"blue\"><i>e-boutique</i></font> inclue dans ce pack, "
		."basée sur le système d'e-commerce <b>osCommerce</b>. Vous devrez répetez cette '<i>procédure</i>' pour chaque boutique que vous voudrez installer.<br><br>"
		."Il ne vous reste plus qu'à appuyer sur le bouton <i><u>Start</u></i> et suivre les étapes suivantes: "
		."Tout d'abord, si vous souhaitez utiliser cette plateforme, vous devez accepter les termes de la Licence GNU/GPL, "
		."puis vous devrez entrer les informations utiles pour la connection et la configuration."
		."<br><br>Bon travail,<br>&nbsp;&nbsp;<i>Piero Trono</i>.");
define("READ_LICENSE","S'il vous plaît, veuillez lire la Licence suivante, et n'oubliez pas pour l'étape suivante ce qu'indique la licence dans le paragraphe <font class=\"blue\"><b>2(c)</b></font> à propos du <font class=\"blue\"><i>Copyright</i></font>:");
define("ACCEPT","J'accepte les termes de cet accord");
define("I_READ","J'ai lu la note");
define("I_READ_STOP","Vous n'avez pas lu la note à propos du Disclaimer qui va être affiché en bas de la page de votre portail."
		."<br><br>S'il vous plaît, cliquer sur le bouton <u>back</u> et cochez la case '<i>" . I_READ . "</i>'.");
define("LICENSE_STOP","Vous n'avez pas accepté la Licence GNU/GPL. Vous ne pouvez pas utiliser ce logiciel, désolé."
		."<br><br>Si vous voulez accepter la Licence, cliquez sur le bouton <u>back</u>.");
define("LICENSE_OK","<b>OK</b>,<br>vous avez accepté les termes de la Licence GNU/GPL.<br><br><b>Note Importante</b>:<br>en bas de la page du portail que vous installez sera affiché le <font class=\"blue\"><i>Copyright</i></font> (ou <i>disclaimer</i>) à propos de la Licence GNU/GPL et des auteurs de ce logiciel.");
define("COPYRIGHT_POLICY","Selon le mail numéro 213080 à Dave Turner (GPL Compliance Engineer) de la part de la Free Software Foundation, "
		."ce copyright est en accord à 100% avec la licence GPL, section <font class=\"blue\"><i>2(c)</i></font>."
		."<br><font color=\"#ff0000\">Ce copyright ne peut être supprimé des pages génerées</font>; Si vous souhaitez l'enlever, vous devez vous procurer une licence comerciale."
		."<br>Plus de détails sur les <i>Copyright</i> <a href=\"http://php-multishop.com/copyright-policy.php\"><font class=\"blue\">ici</font></a>.");
define("I_READ_OK","Merci pour votre choix,<br> maintenant vous pouvez installer le '<i>portail</i>' de Php-MultiShop.");
define("TITLE_CREATE_DB","Etape 1: Créer votre Base de Données");
define("TEXT_CREATE_DB","Créez une base de donnés appelée, par exemple, <i>nuke</i>.<br>"
		."Sous un système de type Unix avec MySQL (*), vous pouvez utiliser cette commande:");
define("AFTER_CREATION_DB","Si vous avez créé avec succès la base de données, vous pouvez passer à l'étape suivante.");
define("PHPMYADMIN","(*): naturellement, vous pouvez utiliser d'autres moyens pour créer votre base de données, en utilisant par exemple <a href=\"http://www.phpmyadmin.net\">phpMyAdmin</a>.");
define("TITLE_IMPORT_DB","Etape 2: Import de la Base de Données");
define("CHANGE_PREFIX","Si vous souhaitez utiliser un autre <i>Préfixe</i> pour vos tables, remplacer tous les  '<b>nuke_</b>' par le préfixe de votre choix dans le fichier");
define("TEXT_IMPORT_DB","Veuillez entrer les informations sur le serveur de Base de Données et sa configurqtion:");
define("MISSING_DATA","Il manque des informations,<br>veuillez cliquer sur le bouton <i>back</i> et recommencez.");
define("ERROR_DB","La connection test à votre base de données n'a pas réussi.<br><br>Veuillez cliquer sur le bouton <i>back</i> pour revoir la configuration de votre serveur de base de données."
		."<br>Si vous avez besoin d'aide concernant la configuration de votre serveur de base de données, veuillez contacter votre hébergeur.");
define("ERROR_SQL_FILE","<b>Erreur</b>: le fichier SQL n'existe pas.<br>");
define("ERROR_DB_2","<b>Erreur</b>: l'import SQL a échoué.");
define("IMPORT_DB_OK","Import <b>réussi</b>: ");
define("IMPORT_PROBLEMS","Some errors have occurred: ");
define("TABLES_INSTEAD"," tables crée au lieu de ");
define("TABLES_ON"," tables sur ");
define("IMPORT_MANUALLY","Before to continue with the next step, you should <b>install manually the DataBase</b>, using the file: ");
define("WEB_ADDRESS","Adresse Web de votre portail, par exemple:<br> <i>http://www.mon-portail.com/</i>");
define("FULL_PATH","Chemin sur le serveur du répertoire où est installé Php-MultiShop, par exemple<br> <i>/var/www/html/multishop/</i>");
define("TEXT_ADMIN_FILE","Administration panel filename: '<i>admin</i>' by default for '<i>admin.php</i>'. To improve security please choose other filename, put the new value and rename the old 'admin.php' on server to it, without .php extension");
define("SECURITY_CODE","Activer l'image de sécurité lors de l'identification");
define("TITLE_CONFIGURATION","Etape 3: Configuration");
define("TITLE_CREATE_ADMIN","Etape 4: Création du Super-Administrateur");
define("WRITE_CONFIG","(écriture du fichier '<i>config.php</i>')");
define("NOT_WRITABLE","<b>Attention</b>: le fichier <i>config.php</i> est protégé en écriture."
		."<br>Veuillez changer les droits en écriture du fichier config.php en <font color=\"red\">chmod 666</font> (modifiable en écriture), "
		."puis cliquez sur le bouton <i>next</i>.<br>Par exemple, sous un environnement Unix:");
define("NOT_EXISTS","<b>Attention</b>: le fichier <i>config.php</i> <b>est INTROUVABLE</b>.<br>Veuillez vérifier le pack et le chemin du fichier <i>config.php</i>.<br>Le chemin complet doit être:");
define("WRITE_OK","La configuration s'est déroulée avec <b>succès!</b>");
define("RETRY_CHMOD","Maintenant, remettez le fichier config.php en <font color=\"red\"><b>chmod 644</b></font>.");
define("WARNING_CHMOD","N'oubliez pas de mettre le fichier config.php em chmod 644.");
define("CREATE_ADMIN","Après, vous devez créer le <i>Super-Administrateur</i> de votre Portail.");
define("CREATE_USER","Créer aussi un utilisateur pour ce compte?");
define("CREATION_ADMIN","Création Super-Administrateur");
define("TITLE_FINISH","Fin de l'installation");
define("ADMIN_STOP","Une erreur a eu lieu.<br>Veuillez entrer et vérifier toutes les données requises.");
define("ADMIN_CREATED","<b>Félicitations</b>: le Super-Administrateur a été créé avec <b>succès!</b><br><br>"
		."Maintenant vous devez vous identifier avec ce compte pour indiquer vos <i>préférences</i> dans le menu d'Administration. "
		."Vous pourrez ensuite utiliser votre nouveau portail.<br>Les valeurs importantes des <i>préférences</i> que vous <font color=\"red\"><b>devez changer</b></font> sont:");
define("MORE_CONFIGURATION","Note: vous pouvez modifier votre préférences en éditant le fichier config.php.");
define("DELETE_FOLDER","Après l'installation, <font color=\"red\"><b>supprimez</b></font> le dossier '<b>install</b>' de votre serveur.");
define("TEXT_SUBSCRIPTION","Si vous souhaitez contrôler les inscriptions sur votre site, vous devez inscrire ici l'URL de la page d'inscription/réinscription. Un e-mail sera envoyé.");
define("TEXT_ADVANCED_EDITOR","Activer/désactiver l'éditeur de texte WYSIWYG pour les administrateurs.");
define("RENAME_ADMIN_FILE","<font color=\"red\"><b>Important</b></font>: before of Login, you must rename the '<b>admin.php</b>' file to ");

?>
