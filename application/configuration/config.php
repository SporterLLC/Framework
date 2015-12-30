<?php
basename($_SERVER["PHP_SELF"]) == "config.php" ? die("No direct script access allowed") : '';

return array(

	/*
	|--------------------------------------------------------------------------
	| Debug Mode Will Be Used Later
	|--------------------------------------------------------------------------
	*/

	'debug' => ENVIRONMENT == 'development' ? true : false,

	/*
	|--------------------------------------------------------------------------
	| Base URL i.e. if full_url is 'www.example.com/client/myapp'
	| Then base is '/client/myapp' 
	|--------------------------------------------------------------------------
	*/

	'base_url' => '/Sporter',

	/*
	|--------------------------------------------------------------------------
	| Application FULL URL
	|--------------------------------------------------------------------------
	*/

	'url' => '//localhost/Sporter/',

	/*
	|--------------------------------------------------------------------------
	| Static URL - where the static content and front-end assets
	|--------------------------------------------------------------------------
	*/

	'static' => '//localhost/Sporter/static/',

	/*
	|--------------------------------------------------------------------------
	| Project Name
	|--------------------------------------------------------------------------
	*/

	'site_name' => 'Sporter ',

	/*
	|--------------------------------------------------------------------------
	| Cookie URL - Hostname for Cookies
	|--------------------------------------------------------------------------
	*/

	'cookie_hostname' => 'localhost',

	/*
	|--------------------------------------------------------------------------
	| Cookie URL - Hostname for Cookies
	|--------------------------------------------------------------------------
	*/

	'cookie_path' => '/',

	/*
	|--------------------------------------------------------------------------
	| Cookie Prefix - Prefix for Cookies
	|--------------------------------------------------------------------------
	*/

	'cookie_prefix' => 'sporter',


	/*
	|--------------------------------------------------------------------------
	| Error Logging Threshold
	|--------------------------------------------------------------------------
	|
	| You can enable error logging by setting a threshold over zero. The
	| threshold determines what gets logged. Threshold options are:
	|
	|	0 = Disables logging, Error logging TURNED OFF
	|	1 = Error Messages (including PHP errors)
	|	2 = Notice & Warning Messages (PHP)
	|	3 = Debug Messages
	|	4 = All Messages
	|
	*/
	'log_threshold' => 4,

	/*
	|--------------------------------------------------------------------------
	| Application Timezone
	|--------------------------------------------------------------------------
	*/

	'timezone' => 'UTC',

	/*
	|--------------------------------------------------------------------------
	| Application Locale Configuration
	|--------------------------------------------------------------------------
	*/

	'locale' => 'en_US',

	/*
	|--------------------------------------------------------------------------
	| Application Fallback Locale
	|--------------------------------------------------------------------------
	*/

	'fallback_locale' => 'en_US'

);