<?php

basename($_SERVER['PHP_SELF']) == 'news_controller.php' ? die('No direct script access allowed') : '';

class NewsController extends Sporter //Controller
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

    public function article($id = [])
    {
        $lol = 'Controller: '.get_class($this).'<br />Method: '.__FUNCTION__.'<br />Parameter: '.$id.'<br />';
        echo $lol;
    }

    public function test()
    {
        $lol = 'Controller: '.get_class($this).'<br />Method: '.__FUNCTION__.'<br />';
        echo $lol;
    }
}
