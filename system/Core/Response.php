<?php

namespace Dalt\Core;

use Dalt\Interfaces\ResponseInterface;

class Response implements ResponseInterface
{
    /**
     *
     * @var array
     */
    protected $headers = [];
    /** 
     * 
     * @var mixed 
     */
    protected $content;
  

    /**
     * @param string $content
     */
    public function setContent($content = '')
    {
        $this->content = $content;
    }    
    
    /**
     * 
     * @param string $value
     */    
    public function setHeader($value)
    {
        $this->headers[] = (string) $value;
    }  
    
    /**
     * 
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * 
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * 
     * @return void
     */
    public function sendHeaders()
    {
        foreach ($this->headers as $header) {
            header($header);
        }
    }      

    /**
     * 
     * @param string $url
     */
    public static function redirect($url) 
    {
        $responce = new self();
        $responce->setHeader('Location: ' . $url);
        $responce->sendHeaders();
    }     
}
