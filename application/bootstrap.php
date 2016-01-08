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
		{

			$db_info = new DatabaseInfo();

			$database = new Database([
				'database_type'    => $db_info->get_db('dbdriver'),
				'database_name'    => $db_info->get_db('database'),
				'server'           => $db_info->get_db('hostname'),
				'username'         => $db_info->get_db('username'),
				'password'         => $db_info->get_db('password'),
				'charset'          => $db_info->get_db('dbcharset'),

				'port'             => $db_info->get_db('port'),
				'prefix'           => $db_info->get_db('dbprefix'),
 
				// driver_option for connection, read more from
				// http://www.php.net/manual/en/pdo.setattribute.php
				'option'           => [
					PDO::ATTR_CASE => PDO::CASE_NATURAL
				]
			]);

			/*
			 *
			 * Read is much faster than Write,
			 * while INSERT will increase load time by ~40ms per each query,
			 * COUNT will only increase by ~2ms
			 *
			 */
			$count = $database->count('site_log', [
				'log_type' => 1
			]);
/*
			$database->insert('site_log', [
				'remote_addr' => '127.0.0.1',
				'request_uri' => '/',
				'log_type'    => 1,
				'message'     => 'Test Query'
			]);
*/
		//	echo 'The are ' . $count . ' rows in log with severity level of 1!<br />';

		}


		// Since it's being called from __constrcut, it will run before run()
		private function settings()
		{

			require BOOTPATH.'core\\config'.CLASSFIX.EXT;

		}


		// Since it's being called from __constrcut, it will run before run()
		private function database()
		{

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


}