<?php
basename($_SERVER["PHP_SELF"]) == "bootstrap.php" ? die("No direct script access allowed") : '';


class Bootstrap
{


		public function __construct()
		{

			//$query = $this->database();

			$this->settings();
			$this->database();

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
 
				// driver_option for connection, read more from http://www.php.net/manual/en/pdo.setattribute.php
				'option'           => [
					PDO::ATTR_CASE => PDO::CASE_NATURAL
				]
			]);

			$database->insert('site_log', [
				'remote_addr' => '127.0.0.1',
				'request_uri' => '/',
				'log_type'    => 1,
				'message'     => 'Test Query'
			]);

		}


		private function settings()
		{

			require BOOTPATH.'core\\config'.CLASSFIX.EXT;
			$config = new Config();
			echo 'Welcome to ' . $config->get_conf('site_name') . '<br />';

		}


		private function database()
		{

			require BOOTPATH.'core\\database'.CLASSFIX.EXT;
			return;

		}


		public function __destruct()
		{

			$script_end = (float) array_sum( explode( ' ',microtime() ) );

			echo 'Processing time: '. sprintf( '%.4f', ( $script_end - APP_START ) ).' seconds';

		}


}