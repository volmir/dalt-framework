<?php

namespace Frm\Core;

use Frm\Core\Config;
use Frm\Core\Router;

class Application 
{
    public function run() 
    {     
        Router::addRoute(Config::getInstance('routes'));
        Router::dispatch();
    }

    /**
     * 
     * @return boolean
     */
    public static function isProduction() 
    {
        $result = false;     
        if ($_SERVER['SERVER_ADDR'] != '127.0.0.1') {
            $result = true;
        }        
        return $result;
    }
}
