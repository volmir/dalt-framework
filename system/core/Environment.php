<?php

namespace Frm\Core;

class Environment
{
    public function run() 
    {     
        Router::addRoute(Config::getInstance('routes'));
        Router::dispatch();
    }

    /**
     * 
     * @return sting
     */
    public static function get() 
    {
        $environment = 'local';     
        if ($_SERVER['SERVER_ADDR'] != '127.0.0.1') {
            $environment = 'production'; 
        }        
        return $environment;
    }
}
