<?php

namespace frm\core;

use frm\core\Config;
use frm\core\Environment;

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
            
            $config = Config::getInstance()['db'][Environment::get()];
             
            $dsn = 'mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'] . ';charset=' . $config['charset'];
            self::$instance = new \PDO($dsn, $config['username'], $config['password'], $opt);
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
