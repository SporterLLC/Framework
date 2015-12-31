<?php
basename($_SERVER["PHP_SELF"]) == "home_controller.php" ? die("No direct script access allowed") : '';


class Home //Controller
{

	function __construct()
	{
		$data = array();
	}

	function index()
	{
		echo 'Test Controller ' . __CLASS__ . '<br />';

	}

}