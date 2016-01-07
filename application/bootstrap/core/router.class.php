<?php
basename($_SERVER["PHP_SELF"]) == "router.class.php" ? die("No direct script access allowed") : '';


class Route extends Router
{


	protected $route;


	private static $handle_error = [
		'errors/errors',
		'ErrorHandler',
		'not_found'
	];


	private $error = FALSE;



	public function __construct($config)
	{
		$this->get_routes($config);
		return;
	}



	private function handle_route($match)
	{

		if ( $match )
		{
			list( $controller_class, $action ) = explode( '@', $match['target'] );

			/**
			 * If file exist, sets the following
			 * $controller_class - used for retrieving the file that holds the controller class
			 * $controller_name - used as the class name when instantiating the new controller class
			 */
			if ( file_exists( CONTROLLERPATH.$controller_class.CONTROLLERFIX.EXT ) )
			{
				$controller_class = $controller_class;
				$controller_name = $controller_class;
			}
			else
			{
				// Triggers the error controller
				$this->error = TRUE;
			}
		}
		else
		{
			// Triggers the error controller
			$this->error = TRUE;
		}


		if($this->error)
		{
			$controller_class = self::$handle_error[0];
			$controller_name = self::$handle_error[1];
			$action = self::$handle_error[2];
			// Resets $error to default value FALSE.
			$this->error = FALSE;
		}


		try
		{

			$get_file = CONTROLLERPATH.$controller_class.CONTROLLERFIX.EXT;


			if ( file_exists( $get_file ) )
			{
				include $get_file;
				$continue = TRUE;
			}
			else
			{
				$continue = FALSE;
			}


			if ( class_exists( $controller_name ) )
			{
				$controller = new $controller_name();
				$continue = TRUE;
			}
			else
			{
				$continue = FALSE;
			}


			if ( $continue )
			{
				call_user_func_array( [$controller, $action], $match['params'] );
				//var_dump([$controller, $action]);
			}
			else
			{
				header( $_SERVER["SERVER_PROTOCOL"] . ' 500 Internal Server Error', TRUE, 500);
			}
			
		}
		catch (Exception $e)
		{
			header( $_SERVER["SERVER_PROTOCOL"] . ' 500 Internal Server Error', TRUE, 500);
		}

	}



	public function initiate()
	{
		//initiated through __construct
	}



	private function get_routes($config)
	{
		$this->route = require CONFPATH.'router.php';
		$this->handle_route($match);
		//return $route;
	}


}