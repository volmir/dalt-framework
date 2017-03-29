<?php

namespace Dalt\Core;

class Config 
{

    /**
     * 
     * @var Config
     */
    private static $instance = null;

    /**
     * Returns instance of config
     * 
     * @param array $config
     * @return array
     */
    public static function getInstance($config = '') 
    {
        if (!isset(self::$instance)) {
            self::$instance = $config;
        }    
        
        return self::$instance;
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
