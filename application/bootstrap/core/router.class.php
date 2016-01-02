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
			if ( file_exists( CONTROLLERPATH.$controller_class.CONTROLLERFIX.EXT ) )
			{
				$controller_class = $controller_class;
				$controller_name = $controller_class;
			}
			else
			{
				$this->error = TRUE;
			}
		}
		else
		{
			$this->error = TRUE;
		}

		if($this->error)
		{
            $controller_class = self::$handle_error[0];
            $controller_name = self::$handle_error[1];
            $action = self::$handle_error[2];
			$this->error = FALSE;
        }
		include CONTROLLERPATH.$controller_class.CONTROLLERFIX.EXT;
		$controller = new $controller_name();
		call_user_func_array( array($controller, $action), $match['params'] );
		//var_dump([$controller, $action]);

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