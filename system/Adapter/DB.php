<?php

namespace Dalt\Adapter;

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
            $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_DBNAME . ';charset=utf8';
            self::$instance = new \PDO($dsn, DB_USERNAME, DB_PASSWORD, $opt);
        }
        return self::$instance;
    }

    public static function __callStatic($method, $args) 
    {
        return call_user_func_array(array(self::instance(), $method), $args);
    }
    
    public static function parceSql($sql, $params) 
    {
        $keys = [];
        foreach ($params as $key => $value) {
            if (is_string($key)) {
                $keys[] = '/:' . $key . '/';
            } else {
                $keys[] = '/[?]/';
            }
        }
        $query = preg_replace($keys, $params, $sql, 1, $count);
        return $query;
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
