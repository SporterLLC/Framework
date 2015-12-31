<?php

session_start();

// Define the time application started
define('APP_START', (float) array_sum(explode(' ',microtime())));

// Set file extension and postfixes
$extension = 'php';
$classfix = 'class';
$controllerfix = 'controller';

// Set directory names and their paths
$application = 'application';
$bootstrap   = 'bootstrap';
$config      = 'configuration';
$vendor      = 'vendor';
$controller  = 'controller';
$model       = 'model';
$view        = 'view';

/*
 *---------------------------------------------------------------
 * DEFINE CURRENT ENVIRONMENT
 *---------------------------------------------------------------
 *
 * The environment the application is running off.
 * There are currently three (3) environments you can set here;
 *
 *	development: If the application is in development phase.
 *	testing: If the application is being tested live.
 *	production: If the application is in production mode.
 *
 */

define('ENVIRONMENT', 'development');


/*
 *---------------------------------------------------------------
 * ERROR REPORTING
 *---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */

switch (ENVIRONMENT)
{
	case 'development':
		error_reporting(-1);
		ini_set('display_errors', 1);
	break;

	case 'testing':
	case 'production':
		ini_set('display_errors', 0);
		if (version_compare(PHP_VERSION, '5.3', '>='))
		{
			error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
		}
		else
		{
			error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_USER_NOTICE);
		}
	break;

	default:
		header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
		echo 'The application environment is not set correctly.';
		exit(1); // EXIT_ERROR
}


// Define EVNs
define('ROOTPATH', __DIR__);
define('APPPATH', ROOTPATH.'\\'.$application.'\\');
define('BOOTPATH', APPPATH.$bootstrap.'\\');
define('CONFPATH', APPPATH.$config.'\\');
define('VENDORPATH', BOOTPATH.$vendor.'\\');
define('CONTROLLERPATH', APPPATH.$controller.'\\');
define('MODELPATH', APPPATH.$model.'\\');
define('VIEWPATH', APPPATH.$view.'\\');
define('EXT', '.'.$extension);
define('CLASSFIX', '.'.$classfix);
define('CONTROLLERFIX', '_'.$controllerfix);


require APPPATH.'bootstrap.php';

/*
|--------------------------------------------------------------------------
| Turn the lights on
|--------------------------------------------------------------------------
*/

$start = new Bootstrap();

$start->run();