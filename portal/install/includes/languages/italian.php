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
/* $Id: italian.php,v 1.2 2005/11/22 16:49:18 tropic Exp $ */


define('CHARSET', 'iso-8859-1');
define("FEEDBACK","Note: please, contact me for any feedback, suggestions or report of bug");
define("INSTALLATION_PHPMULTISHPOP","Installazione di Php-MultiShop");
define("SELECT_LANGUAGE","Scegli la lingua");
define("NEW_INSTALLATION","Nuova Installazione");
define("TEXT_NEW_INSTALLATION","Php-MultiShop è un pacchetto di Software Libero per realizzare un portale con uno o più siti e-commerce nella stessa piattaforma: un <i>Centro Commerciale Virtuale</i>."
		."<br><br>In questa fase potrai installare il <font class=\"blue\"><i>lato-portale</i></font> di <b>Php-MultiShop</b>, utilizzando uno trai più popolari e supportati CMS: <b>PHPNuke</b>."
		."<br>Tramite questo strumento potrai personalizzare e gestire la tua <font class=\"blue\"><i>Community</i></font> per trattare ogni tipo di contenuto: "
		."notizie, forum, newsletter, chat, curiosità, consigli su determinati argomenti, recensioni, eventi culturali e commerciali, fiere, ricette, itinarari turistici, ..."
		."<br><br>Inoltre, se vorrai utilizzare il portale per attività di <font class=\"blue\"><i>e-commerce</i></font>, potrai "
		."installare successivamente il <font class=\"blue\"><i>lato-negozi</i></font> mediante "
		."<b>osCommerce</b>, uno strumento presente in questo pacchetto. "
		."Per ogni negozio che vorrai installare, non dovrai fare altro che replicare questo secondo strumento (o '<i>modulo</i>') in cartelle distinte.<br><br>"
		."Per procedere clicca su <i><u>Start</u></i> e segui le istruzioni: "
		."prima di tutto, se vorrai utilizzare questo programma, dovrai accettare i termini della Licenza GNU/GPL, "
		."quindi inserire le informazioni richieste per la connessione al DataBase e la tua configurazione."
		."<br><br>Buon lavoro,<br>&nbsp;&nbsp;<i>Piero Trono</i>.");
define("READ_LICENSE","Sei pregato di leggere la seguente Licenza (per aiutarti a comprenderla, potrai trovare in rete una traduzione in italiano), e tenere in mente per il passo successivo quanto riportato nel punto <font class=\"blue\"><b>2(c)</b></font> della stessa, dove si parla della <font class=\"blue\"><i>Nota di Copyright</i></font>:");
define("ACCEPT","Ho letto e accetto i Termini della Licenza");
define("I_READ","Ho letto questa Nota");
define("I_READ_STOP","You don't have read the notice about the Disclaimer that will be displayed at the footer of the portal."
		."<br><br>Please, click on the <u>back</u> button and chek the checkbox with the label '<i>" . I_READ . "</i>'.");
define("LICENSE_STOP","You don't have accepted the GNU/GPL License then cannot use this Software, sorry."
		."<br><br>If you want to back to accept the License, click on the <u>back</u> button.");
define("LICENSE_OK","<b>OK</b>,<br>hai accettato i termini della Licenza GNU/GPL.<br><br><b>Nota Importante</b>:<br>al fondo delle pagine web del portale che stai installando, sarà visualizzata una <font class=\"blue\"><i>Nota di Copyright</i></font> (<i>disclaimer</i>) riguardante gli autori del Software e la Licenza GNU/GPL.");
define("COPYRIGHT_POLICY","In conformità con quanto riportato nell'email numero 213080 a Dave Turner (GPL Compliance Engineer) dalla Free Software Foundation, "

		."questa nota di copyright è al 100% conforme con la Licenza GPL, lettera <font class=\"blue\"><i>2(c)</i></font>."
		."<br><font color=\"#ff0000\">Questa nota di copyright non può essere rimossa dalle pagine web generate da questa piattaforma</font>; per poterla rimuovere legalmente occorre acquistare una Licenza Commerciale."
		."<br>Ulteriori dettagli su queste <i>Copyright Policy</i> sono disponibili <a href=\"http://php-multishop.com/copyright-policy.php\"><font class=\"blue\">qui</font></a>.");
define("I_READ_OK","Grazie per la tua scelta,<br>ora puoi installare il '<i>lato-portale</i>' di Php-MultiShop.");
define("TITLE_CREATE_DB","Passo 1: Creare il DataBase");
define("TEXT_CREATE_DB","Crea un database nominandolo, per esempio, <i>nuke</i>.<br>"
		."Per esempio, mediante una shell di un sistema Unix-like avente MySQL (*), puoi usare il comando:");
define("AFTER_CREATION_DB","Se hai creato con successo il DB, puoi passare al passo successivo.");
define("PHPMYADMIN","(*): naturalmente puoi utilizzare altri modi per creare il tuo DataBase, per esempio mediante <a href=\"http://www.phpmyadmin.net\">phpMyAdmin</a>.");
define("TITLE_IMPORT_DB","Passo 2: Importazione nel DataBase");
define("CHANGE_PREFIX","Se vuoi utilizzare un altro <i>Prefix</i> per le tue tabelle, sostituisci tutte le occorrenze della parola '<b>nuke_</b>' con il tuo nuovo Prefix nel file");
define("TEXT_IMPORT_DB","Inserisci le informazioni per il DB e la Configurazione:");
define("MISSING_DATA","Alcuni dati mancanti,<br>clicca il tasto <i>back</i> e riprova.");
define("ERROR_DB","Tentativo di connessione al DB <b>Fallito</b>.<br><br>Clicca il tasto <i>back</i> per reinserire i dati della connessione al DB."
		."<br>Se ti occorre aiuto, consulta il tuo fornitore di hosting.");
define("ERROR_SQL_FILE","<b>Errore</b>: il file SQL non esiste.<br>");
define("ERROR_DB_2","<b>Errore</b>: Importazione DB non <b>fallita</b>.");
define("IMPORT_DB_OK","Importazione avvenuta con <b>successo</b>: ");
define("IMPORT_PROBLEMS","Si sono verificati alcuni errori: ");
define("TABLES_INSTEAD"," tabelle invece di ");
define("TABLES_ON"," tabelle su ");
define("IMPORT_MANUALLY","Prima di seguire col passo successivo, dovresti <b>installare manualmente il DataBase</b>, usando il file: ");
define("WEB_ADDRESS","Indirizzo Web del Portale, per esempio:<br> <i>http://www.mio-portale.com/</i>");
define("FULL_PATH","Directory sul Server dove Php-MultiShop è installato, per esempio<br> <i>/var/www/html/multishop/</i>");
define("TEXT_ADMIN_FILE","Nome-File del Pannello di Amministrazione, default: '<i>admin</i>' per '<i>admin.php</i>'. Per una maggiore sicurezza, scelgi un nuovo nome-file, inseriscilo in questo campo e poi rinomina il file 'admin.php' sul server, senza l'estensione .php");
define("SECURITY_CODE","Imposta a chi visualizzare, al login, l'immagine col Codice di Sicurezza");
define("TITLE_CONFIGURATION","Passo 3: Configurazione");
define("TITLE_CREATE_ADMIN","Passo 4: Creazione del Super-Administrator");
define("WRITE_CONFIG","(scrittura del file '<i>config.php</i>')");
define("NOT_WRITABLE","<b>Avvetimento</b>: il file <i>config.php</i> attualmente non è scrivibile."
		."<br>Imposta <font color=\"red\">chmod 666</font> (attributo di scrittura) al file config.php, "
		."quindi clicca il bottone <i>next</i>.<br>Per esempio, in un sistema Unix-like:");
define("NOT_EXISTS","<b>Avvetimento</b>: file <i>config.php</i> <b>NON trovato</b>.<br>Controlla sul tuo server il percorso completo del file <i>config.php</i>, che dovrebbe essere:");
define("WRITE_OK","Configurazione avvenuta con <b>successo!</b>");
define("RETRY_CHMOD","ora reimposta <font color=\"red\"><b>chmod 644</b></font> al file config.php.");
define("WARNING_CHMOD","ricorda di impostare chmod 644 al file config.php.");
define("CREATE_ADMIN","Quindi puoi creare il <i>Super-Administrator</i> del tuo Portale.");
define("CREATE_USER","Creo anche un Utente con questo Account?");
define("CREATION_ADMIN","Creazione Super-Administrator");
define("TITLE_FINISH","Fine dell'Installazione");
define("ADMIN_STOP","Errore nei dati inseriti.<br>Riprova e controlla i dati inseriti.");
define("ADMIN_CREATED","<b>Congratulazioni</b>: Super-Administrator creato con <b>Successo!</b><br><br>"
		."Ora devi loggarti con l'account appena creato per impostare alcune <i>Preferenze</i> nel Pannello di Amministrazione, "
		."in seguito potrai utilizzare il tuo Nuovo Portale.<br>Le impostazioni più importanti che <font color=\"red\"><b>dovrai modificare</b></font> sono:");
define("MORE_CONFIGURATION","Nota: potrai sempre modificare la configurazione editando il file config.php.");
define("DELETE_FOLDER","Dopo questo processo, <font color=\"red\"><b>Cancella</b></font> la directory '<b>install</b>' dal tuo Server.");
define("TEXT_SUBSCRIPTION","Se abiliti le sottoscrizioni nel tuo sito, devi scrivere qui l'url della pagina per sottoscrizioni/rinnovi. Se impostato, sarà inviato via email.");
define("TEXT_ADVANCED_EDITOR","On/Off il text editor avanzato WYSIWYG per gli amministratori.");
define("RENAME_ADMIN_FILE","<font color=\"red\"><b>Importante</b></font>: prima del Login, devi rinominare il file '<b>admin.php</b>' in ");

?>
