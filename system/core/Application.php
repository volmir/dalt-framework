<?php

namespace frm\core;

use frm\core\Registry;
use frm\core\Router;
use frm\core\Environment;

class Application 
{

    /**
     * 
     * @param array $config
     */
    public function run($config = []) 
    {           
        $this->config = new Registry($config);
        
        define('DB', $this->config->db[Environment::get()]);
        
        Router::addRoute($this->config->routes);
        Router::dispatch();
        Router::execute();
    }

}
