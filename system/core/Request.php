<?php

namespace Core;

class Request 
{

    /**
     * Divide the URL submitted to the components
     */
    public static function splitUrl($url) 
    {
        return preg_split('/\//', $url, -1, PREG_SPLIT_NO_EMPTY);
    }    
    
}
