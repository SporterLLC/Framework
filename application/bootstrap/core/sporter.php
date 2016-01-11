<?php
basename($_SERVER["PHP_SELF"]) == "sporter.php" ? die("No direct script access allowed") : '';

/**
 * Sporter class added, it will handle all the core
 * functionalities needed for getting config items, creating
 * new SQL queries, loading views, switching languages, etc.
 * It will serve as a safe bridge to provide the developer
 * with tools for developing the application safely without
 * opening holes in application's security. All controllers
 * should extend Sporter class for this to work!
 */

/**
 * ############## 10.01.16 ##############
 * Build contains errors.
 * Trying to change: public $config value from
 * within the constructor to $this->config = new Config;
 * doesn't work, need to debug this!
 */

class Sporter
{


	private $config;


	private $db_info;


	public $database;



	public function __construct()
	{

		$this->config  = new Config;

		$this->db_info = new DatabaseInfo;

		$this->database = new Database([
			'database_type'    => $this->db_info->get_db('dbdriver'),
			'database_name'    => $this->db_info->get_db('database'),
			'server'           => $this->db_info->get_db('hostname'),
			'username'         => $this->db_info->get_db('username'),
			'password'         => $this->db_info->get_db('password'),
			'charset'          => $this->db_info->get_db('dbcharset'),

			'port'             => $this->db_info->get_db('port'),
			'prefix'           => $this->db_info->get_db('dbprefix'),
 
			// driver_option for connection, read more from
			// http://www.php.net/manual/en/pdo.setattribute.php
			'option'           => [
				PDO::ATTR_CASE => PDO::CASE_NATURAL
			]
		]);

	}


	public function config_item( $args = '' )
	{

		// Add slashes to escape any chars
		// that may affect script behavior
		$args = addslashes( $args );

		$search = [
					'{',
					'[',
					'(',
					"\\",
					';',
					'&',
					')',
					']',
					'}',
					NULL,
					TRUE,
					FALSE
		];

		$replace = [
					'',
					'',
					'',
					'',
					'',
					'',
					'',
					'',
					'',
					'',
					'',
					''
		];

		// Removes all special chars that
		// may affect script behavior
		$output = str_replace( $search, $replace, $args );

		if ( !empty( $output ) )
		{
			// if not empty, call private func config_prop
			$return = $this->config_prop($output);
		}
		else
		{
			// if empty, return array with Error key
			$return = ['error' => 'no key specified'];
		}


		return $return;
	}


	private function config_prop($property = '')
	{

		// New instance of Sporter to access property config
		$sporter = new Sporter;
		$config = $sporter->config;

		/**
		 * Check whether the provided key is an array
		 * if it is an array, check if provided key
		 * name is 'error'
		 */
		if ( is_array( $property ) )
		{
			if ( array_key_exists( 'error', $property ) )
			{
				$continue = FALSE;
			}
			else
			{
				$continue = TRUE;
			}
		}
		else
		{
			$continue = TRUE;
		}


		if ( $continue )
		{
			// Check whether the provided key exists in config array
			if ( array_key_exists($property, $config->start) )
			{
				$value = $config->start[$property];
			}
			else
			{
				$value = ['error' => 'key not found'];
			}

		}

		return $value;

	}


	public function view()
	{}

}
