<?php

namespace Dalt\Core;

use Dalt\Core\Request;

class Environment
{

    /**
     * 
     * @return sting
     */
    public static function get() 
    {
        $environment = 'development';     
        if (Request::getInstance()->server['SERVER_ADDR'] != '127.0.0.1') {
            $environment = 'production'; 
        }        
        return $environment;
    }
}
