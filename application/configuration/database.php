<?php
basename($_SERVER["PHP_SELF"]) == "database.php" ? die("No direct script access allowed") : '';

/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the 'Database Connection'
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database driver. e.g.: mysql.
|			Currently supported:
|				 mssql, mysql, sqlite, sqlsrv
|				 All of which utilized as PDOs
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the Query Builder class
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
*/
return array(
	'hostname'  => 'localhost',
	'username'  => 'root',
	'password'  => '',
	'database'  => 'sporter',
	'dbdriver'  => 'mysql',
	'dbcharset' => 'utf8',
	'dbprefix'  => '',
	'port'      => 3306,
	'db_debug'  => (ENVIRONMENT !== 'production')
);
