<?php
basename($_SERVER["PHP_SELF"]) == "bootstrap.php" ? die("No direct script access allowed") : '';


class Bootstrap
{


		public $config;


		public function __construct()
		{
			$this->settings();
			$this->config = new Config();

			//	TODO: write a 'date' handler to be loaded here
			date_default_timezone_set(
				$this->config->get_conf('timezone')
			);

			$this->database();
			$this->sporter();
			$this->routing();
			$start_route = new Route($this->config);
			$start_route->initiate();
		}


		public function run()
		{}


		// Since it's being called from __constrcut, it will run before run()
		private function settings()
		{

			require BOOTPATH.'core\\config'.CLASSFIX.EXT;

		}


		// Since it's being called from __constrcut, it will run before run()
		private function database()
		{
			require BOOTPATH.'database\\db'.CLASSFIX.EXT;
			require BOOTPATH.'core\\database'.CLASSFIX.EXT;
			return;
		}


		// Since it's being called from __constrcut, it will run before run()
		private function sporter()
		{

			require BOOTPATH.'core\\sporter'.EXT;
			return;

		}


		// Since it's being called from __constrcut, it will run before run()
		private function routing()
		{

			require VENDORPATH.'router'.CLASSFIX.EXT;
			require BOOTPATH.'core\\router'.CLASSFIX.EXT;
			return;

		}


		// Since it's being outputed within __destrcut, it will run after run() and basically last
		public function __destruct()
		{

			$script_end = (float) array_sum( explode( ' ',microtime() ) );

		//	echo 'Welcome to ' . $this->config->get_conf('site_name') . '<br />';
		//	echo 'Processing time: '. sprintf( '%.4f', ( $script_end - APP_START ) ).' seconds';

		}

/*
		function __autoload($class_name){
			require_once VENDORPATH.$class_name.CLASSFIX.EXT;
		}
*/

}