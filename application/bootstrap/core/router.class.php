<?php

basename($_SERVER['PHP_SELF']) == 'router.class.php' ? die('No direct script access allowed') : '';

class Route extends Router
{
    protected $route;

    private static $error_array = [
        'errors/errors',
        'Error',
        'not_found',
        [
            'code' => 404,
            'name' => 'Not Found',
        ],
    ];

    private $error = false;

    public function __construct($config)
    {
        $this->get_routes($config);

        return;
    }

    private function handle_route($match)
    {
        if ($match) {
            $search = 'Controller';
            $replace = '';
            $var = $match['target'];

            $match['target'] = str_replace($search, $replace, $var);
            list($controller_class, $action) = explode('@', $match['target']);

            /**
             * $controller_class - used for retrieving the file that holds the controller class
             * $controller_name - used as the class name when instantiating the new controller class.
             */
            $controller_class = $controller_class;
            $controller_name = $controller_class;

            if (!file_exists(CONTROLLERPATH.$controller_class.CONTROLLERFIX.EXT)) {
                $this->error = true;
            }
        } else {
            // Triggers the error controller
            $this->error = true;
        }

        //var_dump($match);

        if ($this->error) {
            $controller_class = self::$error_array[0];
            $controller_name = self::$error_array[1];
            $action = self::$error_array[2];
            $match['params'] = self::$error_array[3];
            // Resets $error to default value FALSE.
            $this->error = false;
        }

        try {
            $controller_name .= 'Controller';

            $get_file = CONTROLLERPATH.$controller_class.CONTROLLERFIX.EXT;

            if (file_exists($get_file)) {
                include $get_file;
                $continue = true;
            } else {
                $continue = false;
            }

            if (class_exists($controller_name)) {
                $controller = new $controller_name();
                $continue = true;
            } else {
                $continue = false;
            }

            if ($continue) {
                call_user_func_array([$controller, $action], $match['params']);
            //	var_dump($match['params']);
            } else {
                header($_SERVER['SERVER_PROTOCOL'].' 500 Internal Server Error', true, 500);
            }
        } catch (Exception $e) {
            header($_SERVER['SERVER_PROTOCOL'].' 500 Internal Server Error', true, 500);
        }
    }

    public function initiate()
    {
        //initiated through __construct
    }

    private function get_routes($config)
    {
        $this->route = require_once CONFPATH.'router.php';
        $this->handle_route($match);
        //return $route;
    }
}
