<?php

basename($_SERVER['PHP_SELF']) == 'database.class.php' ? die('No direct script access allowed') : '';

class DatabaseInfo
{
    private $database;

    public function __construct()
    {
        $this->get_db_array();
    }

    public function get_db($property)
    {
        if (array_key_exists($property, $this->database)) {
            $value = $this->database[$property];
        } else {
            $value = ['error' => 'key not found'];
        }

        return $value;
    }

    private function get_db_array()
    {
        $this->database = require CONFPATH.'database.php';

    //    return $this->database;
    }
}
