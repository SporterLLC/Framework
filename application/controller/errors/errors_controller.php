<?php
basename($_SERVER["PHP_SELF"]) == "errors_controller.php" ? die("No direct script access allowed") : '';

class ErrorHandler
{


    //protected $header;
   // protected $message;


    public function __construct(){}


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