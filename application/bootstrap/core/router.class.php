<?php
basename($_SERVER["PHP_SELF"]) == "router.class.php" ? die("No direct script access allowed") : '';


class Route extends Router
{


	protected $route;



	public function __construct($config)
	{

		$this->start = $this->get_routes($config);
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
				$lolwat = ['errors/errors', 'ErrorHandler', 'not_found'];
				$controller_class = $lolwat[0];
				$controller_name = $lolwat[1];
				$action = $lolwat[2];
			}
		}
		else
		{
			$lolwat = ['errors/errors', 'ErrorHandler', 'not_found'];
			$controller_class = $lolwat[0];
			$controller_name = $lolwat[1];
			$action = $lolwat[2];
			$match['params'] = array();
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

		$route = require CONFPATH.'router.php';
		$this->handle_route($match);
		//return $route;

	}



}