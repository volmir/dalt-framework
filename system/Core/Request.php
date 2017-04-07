<?php

namespace Dalt\Core;

use Dalt\Exception\CoreException;

class Request 
{

    /**
     * 
     * @param string $name
     */
    public function __get($name) 
    {      
        if (!isset($this->$name)) {
            try {
                if ($name == 'server') {
                    $this->$name = isset($_SERVER) ? $_SERVER : array();
                } elseif ($name == 'request') {
                    $this->$name = isset($_REQUEST) ? $_REQUEST : array();                    
                } elseif ($name == 'get') {
                    $this->$name = isset($_GET) ? $_GET : array();
                } elseif ($name == 'post') {
                    $this->$name = isset($_POST) ? $_POST : array();
                } elseif ($name == 'cookie') {
                    $this->$name = isset($_COOKIE) ? $_COOKIE : array();
                } elseif ($name == 'files') {
                    $this->$name = isset($_FILES) ? $_FILES : array();
                } else {
                    throw new CoreException('Incorrect global variable name');
                }
            } catch (CoreException $e) {
                $e->logError();
                return;
            }
        }

        return $this->$name;
    }
    
}
