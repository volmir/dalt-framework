<?php

namespace Core;

use Core\Application;

class Config 
{

    /**
     * 
     * @var Config
     */
    protected static $instance = null;
    /**
     *
     * @var string 
     */
    private static $configPath = 'config/';

    /**
     * Returns instance of config
     * @return config
     */
    public static function getInstance() 
    {
        if (is_null(self::$instance)) {
            self::$instance = self::getConfig();
        }

        if (Application::isProduction()) {
            return self::$instance['production'];
        } else {
            return self::$instance['local'];
        }
        
    }
    
    /**
     * Returns instance of config
     * @return confug
     */
    public static function getConfig($filename = 'config.ini') 
    {
        $filepath = self::$configPath . $filename;
        if (file_exists($filepath)) {
            $result = parse_ini_file($filepath, true);
        } else {
            throw new \Exception('File "' . $filepath . '" not exists');
        }
        return $result;
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
