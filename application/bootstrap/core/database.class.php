<?php
basename($_SERVER["PHP_SELF"]) == "database.class.php" ? die("No direct script access allowed") : '';


class DatabaseInfo
{


	protected $database;



	public function __construct()
	{

		require BOOTPATH.'database\\db'.CLASSFIX.EXT;
		$this->start = $this->get_db_array();
		return;

	}



	public function get_db($property)
	{

		if ( array_key_exists($property, $this->start) )
		{
			$value = $this->start[$property];
		}
		else
		{
			$value = ['error' => 'key not found'];
		}

		return $value;

	}



	private function get_db_array()
	{

		$this->database = require APPPATH.'/configuration/database.php';
		return $this->database;

	}



}