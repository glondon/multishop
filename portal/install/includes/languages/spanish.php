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
/* $Id: spanish.php,v 1.2 2005/11/22 16:49:18 tropic Exp $ */


define('CHARSET', 'iso-8859-1');
define("FEEDBACK","Note: por favor, contactame por cualquier problema o sugerencia");
define("INSTALLATION_PHPMULTISHPOP","Instalación de Php-MultiShop");
define("SELECT_LANGUAGE","Seleccióna Idioma");
define("NEW_INSTALLATION","Nueva Instalación");
define("TEXT_NEW_INSTALLATION","Php-MultiShop es un Software Libre para construir un portal con una tienda (o mas) e-commerce en unica plataforma: un <i>Centro Comercial Virtual</i>."
		."<br><br>Ahora vas a instalar el <font class=\"blue\"><i>lado-portal</i></font> de <b>Php-MultiShop</b>, basado sobre uno de los mas populares y suportados CMS: <b>PHPNuke</b>."
		."<br>Con ese portal puedes crear y personalizar sencillamente tu <font class=\"blue\"><i>Comunidad Virtual</i></font>, para el contenido que quieras: "
		."noticias, foros, newsletter, chat, curiosidades, comentarios, eventos culturales o comerciales, ferias, recetas, rutas turisticas, ..."
		."<br><br>Ademas, si quieres tambien utilizar tu portal para hacer <font class=\"blue\"><i>comercio electronico</i></font>, puedes instalar "
		."una tienda (o varias tiendas independientes) por medio del <font class=\"blue\"><i>lado-tienda</i></font> incluido en ese paquete: "
		."un paquete basado sobre el popular y eficaz software de e-commerce <b>osCommerce</b>. Por cada tienda que quieres instalar, tienes que repitir individualmente la instalación de ese '<i>modulo</i>' en nuevo directorio.<br><br>"
		."Ahora solo tienes que pisar el botón <i><u>Start</u></i> y seguir algunos pasos: "
		."primero, para poder utilizar esa plataforma software, tienes que aceptar lo terminos de la Licencia GNU/GPL License, "
		."pues insertar los datos necesarios para la conexión al DataBase y la configuración."
		."<br><br>Buen trabajo,<br>&nbsp;&nbsp;<i>Piero Trono</i>.");
define("READ_LICENSE","Por favor, tienes que que leer esta Licencia acordandote, en el paso siguiente, lo que esa licencia dice en el punto <font class=\"blue\"><b>2(c)</b></font> en respecto a la <font class=\"blue\"><i>Nota de Copyright</i></font>:");
define("ACCEPT","Yo acepto esos terminos");
define("I_READ","He leído esa nota");
define("I_READ_STOP","No has leido la advertencia sobre la nota que será visualizada en el fondo de las paginas web del portal."
		."<br><br>Por favor, haz click sobre el botón <u>back</u> y repites el paso anteriór '<i>" . I_READ . "</i>'.");
define("LICENSE_STOP","No has aceptado la Licencia GNU/GPL, entonces no puedes utilizar ese Software, lo siento."
		."<br><br>Si quieres volver atrás para aceptar la Licencia, haz click sobre <u>back</u>.");
define("LICENSE_OK","<b>OK</b>,<br>has aceptado los terminos de la Licencia GNU/GPL.<br><br><b>Nota Importante</b>:<br>en el fondo de las paginas web generadas del portal instalado, será visualizada una <font class=\"blue\"><i>Nota de Copyright</i></font> (<i>disclaimer</i>) que habla de los autores de ese software y de la licensia GNU/GPL.");
define("COPYRIGHT_POLICY","En coherencia con el email numero 213080 inviada a Dave Turner (GPL Compliance Engineer) desde la Free Software Foundation, "
		."esa nota de copyright es 100% congruente con la licencia GPL punto <font class=\"blue\"><i>2(c)</i></font>."
		."<br><font color=\"#ff0000\">Esa nota de copyright no puede ser removida desde las paginas del portal sin el consenso de los autores</font>; si quieres removerla legalmente tienes que comprar una Licencia Comercial."
		."<br>Puedes encontrar mas detalles sobre esta <i> Politica de Copyright</i> <a href=\"http://php-multishop.com/copyright-policy.php\"><font class=\"blue\">aqui</font></a>.");
define("I_READ_OK","Graciaspor tu elegida,<br>ahora puedes instalar el '<i>lado-portal</i>' de Php-MultiShop.");
define("TITLE_CREATE_DB","Paso 1: Crea el DataBase");
define("TEXT_CREATE_DB","Crea un database llamado, por ejemplo, <i>nuke</i>.<br>"
		."Por medio de una shell en un sistema Unix-like con MySQL (*), por ejemplo, puedes insertar el comando:");
define("AFTER_CREATION_DB","Si has creado con exito el DB, puedes ir al paso siguiente.");
define("PHPMYADMIN","(*): naturalmente puedes utilizar otras maneras para crear el DataBase, por ejemplo utilizando <a href=\"http://www.phpmyadmin.net\">phpMyAdmin</a>.");
define("TITLE_IMPORT_DB","Paso 2: Importa el DataBase");
define("CHANGE_PREFIX","Si quieres utilizar otro <i>Prefix</i> por las tablas, reemplaza todas las palabras '<b>nuke_</b>' con tu prefix elegido en el file");
define("TEXT_IMPORT_DB","Insertar los datos para la conexión al DataBase y la Configuración:");
define("MISSING_DATA","Falta algun dato,<br>vuelve atrás con el botón <i>back</i>.");
define("ERROR_DB","La conexión al DB no ha tenido éxito.<br><br>Vuelve atrás para reinsertar los datos."
		."<br>Si necesitas ayuda con los datos de conexión al DB, contacta el administrator de tu hosting.");
define("ERROR_SQL_FILE","<b>Error</b>: no se encuentra el file SQL.<br>");
define("ERROR_DB_2","<b>Error</b>: la Importación SQL <b>NO</b> ha tenido exito.");
define("IMPORT_DB_OK","Importación echa con <b>Exito</b>: ");
define("IMPORT_PROBLEMS","La operación ha dado algun error: ");
define("TABLES_INSTEAD"," tablas en lugar de ");
define("TABLES_ON"," tablas sobre ");
define("IMPORT_MANUALLY","antes que seguir, hay que <b>instalar manualmente el DataBase</b>, utilizando el file: ");
define("WEB_ADDRESS","Dirección Web del Portal, por ejemplo:<br> <i>http://www.my-portal.com/</i>");
define("FULL_PATH","Directorio en el Servidor donde se encuentra Php-MultiShop, por ejemplo<br> <i>/var/www/html/multishop/</i>");
define("TEXT_ADMIN_FILE","Nombre del file de Admnistración: por default es '<i>admin</i>' por el file '<i>admin.php</i>'. Por mas seguridad, puedes eligir otro nombre de file, insertarlo aqui y renominar el viejo file 'admin.php' del servidor con el nombre elegido, sin '.php'");
define("SECURITY_CODE","Eliges a quien visualizar, al login, la imagen con el Codigo de Seguridad");
define("TITLE_CONFIGURATION","Paso 3: Configuración");
define("TITLE_CREATE_ADMIN","Paso 4: Creación de Super-Administrador");
define("WRITE_CONFIG","(editando el file '<i>config.php</i>')");
define("NOT_WRITABLE","<b>Aviso</b>: el file <i>config.php</i> no es escrivible."
		."<br>Pon <font color=\"red\">chmod 666</font> (escrivible) al file config.php, "
		."pues sigues con el boton <i>next</i>.<br>Por ej en un Sistema Unix-like:");
define("NOT_EXISTS","<b>Aviso</b>: file <i>config.php</i> <b>NO Encontrado</b>.<br>Controla los archivos del servidor, y la ruta del file <i>config.php</i>.<br>Esa ruta tenria que ser:");
define("WRITE_OK","Configuración terminada con <b>exito!</b>");
define("RETRY_CHMOD","ahora vuelve a poner <font color=\"red\"><b>chmod 644</b></font> al file config.php.");
define("WARNING_CHMOD","recuerda de poner chmod 644 al file config.php.");
define("CREATE_ADMIN","Despues, tienes que crear el <i>Super-Administrador</i> del Portal.");
define("CREATE_USER","Creo tambien un Usuario con esa cuenta?");
define("CREATION_ADMIN","Creación del Super-Administrador");
define("TITLE_FINISH","Fin de la Instalación");
define("ADMIN_STOP","Ha pasado algun error.<br>Vuelve a insertar y controlar los datos obligatorios.");
define("ADMIN_CREATED","<b>Felicitaciónes</b>: Super-Administrador creado con <b>Exito!</b><br><br>"
		."Ahora tienes que entrar identificandote con la cuenta apenas creada para cambiar algunas <i>Preferencias</i> en el Panel de Administración, "
		."despued puedes utilizar tu Nuevo Portal.<br>Los cambios mas importante de las <i>Preferencias</i> que <font color=\"red\"><b>debes hacer</b></font> son:");
define("MORE_CONFIGURATION","Nota: en cualquier momento puedes cambiar configuración editando el file config.php.");
define("DELETE_FOLDER","Despues de esa instalación, <font color=\"red\"><b>Elimina</b></font> la carpeta '<b>install</b>' desde el Servidor");
define("TEXT_SUBSCRIPTION","Si quieres gestionar las suscripciónes en el portal, tienes que escrivir aqui el url de la pagina de suscripción/renovación. Eso serà enviado via email.");
define("TEXT_ADVANCED_EDITOR","On/Off el editor textual avanzado WYSIWYG para los administradores.");
define("RENAME_ADMIN_FILE","<font color=\"red\"><b>Importante</b></font>: antes del Login, hay que cambiar nombre a '<b>admin.php</b>' en ");

?>