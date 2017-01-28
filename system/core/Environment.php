<?php

namespace Frm\Core;

class Environment
{

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
