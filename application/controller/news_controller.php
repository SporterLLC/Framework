<?php
basename($_SERVER["PHP_SELF"]) == "news_controller.php" ? die("No direct script access allowed") : '';


class News //Controller
{

	function __construct()
	{
		$data = array();
	}

	function index()
	{
		//
	}

	function article($id = array())
	{
		$lol = 'Controller: '.get_class($this).'<br />Method: '.__FUNCTION__.'<br />Parameter: '.$id.'<br />';
		echo $lol;
	}

	function test()
	{
		//
	}

}