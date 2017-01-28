<?php

namespace Frm\Core;

use Frm\Core\Exception\CoreException;

class Request 
{
    
    private static $instance = null;

    /**
     * 
     * @return Request
     */
    public static function getInstance() 
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

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
                } elseif ($name == 'get') {
                    $this->$name = isset($_GET) ? $_GET : array();
                } elseif ($name == 'post') {
                    $this->$name = isset($_POST) ? $_POST : array();
                } elseif ($name == 'session') {
                    $this->$name = isset($_SESSION) ? $_SESSION : array();
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

    private function __construct() 
    {

    }

    private function __clone() 
    {
        
    }
    
    private function __wakeup() 
    {
        
    }    
}
