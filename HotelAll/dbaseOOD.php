<?php

class Database
{
    public $connect;
    private static $instance;
 
    private function __construct()
    {
        $this -> connect= new PDO('mysql:host=localhost;dbname=testguide', "root", "");
    }
 
    //singleton pattern
    public static function getInstance()
    {
        if (!isset(self::$instance))
        {
            $object = __CLASS__;
            self::$instance = new $object;
        }
        return self::$instance;
    }
}
 
?>
