<?php

namespace Frm\Core;

class Response 
{
    /**
     *
     * @var array
     */
    private $headers = [];

    /**
     * 
     * @param string $name
     * @param string $value
     */
    public function addHeader($name, $value)
    {
        $this->headers[$name][] = $value;
    }

    /**
     * 
     * @param string $name
     * @param string $value
     */    
    public function setHeader($name, $value)
    {
        $this->headers[$name] = [
            (string) $value,
        ];
    }
    
    /**
     * 
     * @param string $header
     */
    public static function sendHeader($header) 
    {
        header($header);
    } 
    
    /**
     * 
     * @param string $url
     */
    public static function redirect($url) 
    {
        self::sendHeader('Location: ' . $url);
    }    
    
}
