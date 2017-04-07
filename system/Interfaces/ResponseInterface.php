<?php

namespace Dalt\Interfaces;

interface ResponseInterface
{
    
    /**
     * @param string $content
     */
    public function setContent($content = '');   
    
    /**
     * 
     * @param string $value
     */    
    public function setHeader($value);
    
    /**
     * 
     * @return mixed
     */
    public function getContent();

    /**
     * 
     * @return array
     */
    public function getHeaders();

    /**
     * 
     * @return void
     */
    public function sendHeaders();
    
}
