<?php

namespace Core;

use Core\Config;
use Core\Router;

class Application 
{
    public static function run() 
    {     
        Router::addRoute(Config::getConfig('routes.ini'));
        Router::dispatch();
    }

    /**
     * 
     * @param string $url
     */
    public static function redirect($url) 
    {
        header('Location: ' . $url);
        exit();
    }

    /**
     * 
     * @return boolean
     */
    public static function isProduction() 
    {
        $result = false;        
        if ($_SERVER['SERVER_NAME'] != 'localhost') {
            $result = true;
        }        
        return $result;
    }
}
