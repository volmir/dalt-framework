<?php

namespace Frm\Core;

class Response 
{

    /**
     * 
     * @param string $url
     */
    public static function redirect($url) 
    {
        header('Location: ' . $url);
        exit();
    }    
    
}
