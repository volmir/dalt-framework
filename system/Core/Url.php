<?php

namespace Dalt\Core;

class Url
{

    /**
     * Divide the URL submitted to the components
     */
    public static function splitUrl($url) 
    {
        return preg_split('/\//', $url, -1, PREG_SPLIT_NO_EMPTY);
    }    
    
    /**
     * Crop URL
     */
    public static function cropUrl($url) 
    {
        $uri = explode('?', $url);
        return urldecode($uri[0]);
    } 

}
