<?php
basename($_SERVER["PHP_SELF"]) == "errors_controller.php" ? die("No direct script access allowed") : '';

/**
 * Sporter class added, it will handle all the core
 * functionalities needed for getting config items, creating
 * new SQL queries, loading views, switching languages, etc.
 * It will serve as a safe bridge to provide the developer
 * with tools for developing the application safely without
 * opening holes in application's security. All controllers
 * should extend Sporter class for this to work!
 */

class ErrorController extends Sporter
{


    //public $sporter;
    //protected $header;
   // protected $message;


    public function __construct()
    {
     //   $this->sporter = new Sporter;
    }


    public function not_found($code, $name)
    {
        header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found', TRUE, 404);
        $file = VIEWPATH . 'errors/' . ERRORFIX . '404' . EXT;
        if ( file_exists( $file ) )
        {
            include $file;
        }
        else
        {
        }
    //  var_dump($code, $name);
    }


}