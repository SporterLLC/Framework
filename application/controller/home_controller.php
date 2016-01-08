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
		$lol = 'Controller: '.get_class($this).'<br />Method: '.__FUNCTION__.'<br />';
		echo $lol;
	}

}