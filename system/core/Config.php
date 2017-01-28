<?php

namespace Frm\Core;

use Frm\Exception\CoreException;

class Config 
{

    /**
     * 
     * @var Config
     */
    private static $instance = null;
    /**
     *
     * @var string 
     */
    private static $configPath = '/../../application/configs/';

    /**
     * Returns instance of config
     * @return config
     */
    public static function getInstance($config = 'db') 
    {
        if (!isset(self::$instance[$config])) {
            self::$instance[$config] = self::parce($config);
        }    
        
        return self::$instance[$config];
    }
    
    /**
     * Returns instance of config
     * @return config filename
     */
    private static function parce($filename) 
    {
        try {
            $filepath = __DIR__ . self::$configPath . $filename . '.ini';
            if (file_exists($filepath)) {
                $result = parse_ini_file($filepath, true);
            } else {
                throw new CoreException('File "' . $filepath . '" not exists');
            }
        } catch (CoreException $e) {
            $e->logError();
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
