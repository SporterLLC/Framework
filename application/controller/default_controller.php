<?php

basename($_SERVER['PHP_SELF']) == 'home_controller.php' ? die('No direct script access allowed') : '';

class DefaultController extends Sporter //Controller
{
    public function __construct()
    {
        $data = [];
    }

    public function index()
    {
        $lol = 'Controller: '.get_class($this).'<br />Method: '.__FUNCTION__.'<br />';
        echo $lol;
    }
}
