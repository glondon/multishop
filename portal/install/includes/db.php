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
/* $Id: db.php,v 1.1.1.2 2005/11/21 13:51:18 tropic Exp $ */

switch($DB_TYPE) {

	case 'MySQL':
		@include("includes/db/mysql.php");
    	break;

	case 'mysql4':
		@include("includes/db/mysql4.php");
		break;

	case 'postgres':
		@include("includes/db/postgres7.php");
		break;

	case 'mssql':
		@include("includes/db/mssql.php");
		break;

	case 'oracle':
		@include("includes/db/oracle.php");
		break;

	case 'msaccess':
		@include("includes/db/msaccess.php");
		break;

	case 'mssql-odbc':
		@include("includes/db/mssql-odbc.php");
		break;
	
	case 'db2':
		@include("includes/db/db2.php");
		break;

}

$DB = new sql_db($DB_SERVER, $DB_SERVER_USERNAME, $DB_SERVER_PASSWORD, $DB_DATABASE, false);

if(!$DB->db_connect_id) {
    $problems_DB = 1;
} else {
	$problems_DB = 0;
}

?>