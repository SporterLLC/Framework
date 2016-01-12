<?php

basename($_SERVER['PHP_SELF']) == 'config.class.php' ? die('No direct script access allowed') : '';

class Config
{
    public $config = [];

    public function __construct()
    {
        $this->get_conf_array();
    }

    public function get_conf($property)
    {
        if (array_key_exists($property, $this->config)) {
            $value = $this->config[$property];
        } else {
            $value = ['error' => 'key not found'];
        }

        return $value;
    }

    private function get_conf_array()
    {
        $this->config = require CONFPATH.'config.php';

    //    return $this->config;
    }
}
