<?php
// class Database 
// {
//     private $_db;
//     static $_instance;

//     private function __construct() {
//         $this->_db = new PDO('mysql:host=localhost;dbname=testguide', 'root', '');
//         $this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     }

//     private function __clone(){}

//     public static function getInstance() {
//         if (!(self::$_instance instanceof self)) {
//             self::$_instance = new self();
//         }
//         return self::$_instance;
//     }

//     public function query($sql) {
//         return $this->_db->query($sql);
//     }


 
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
