<?php

namespace frm\core;

class DB 
{

    protected static $instance = null; 

    public static function getInstance() 
    {
        if (self::$instance === null) {
            $opt = array(
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
                \PDO::ATTR_EMULATE_PREPARES => TRUE
            );
            $dsn = 'mysql:host=' . DB['host'] . ';dbname=' . DB['dbname'] . ';charset=utf8';
            self::$instance = new \PDO($dsn, DB['username'], DB['password'], $opt);
        }
        return self::$instance;
    }

    public static function __callStatic($method, $args) 
    {
        return call_user_func_array(array(self::instance(), $method), $args);
    }
    
    private function __construct() 
    {

    }

    private function __clone() 
    {
        
    }
    
    private function __wakeup() 
    {
        
    }         
}
