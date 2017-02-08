<?php

namespace frm\core;

use frm\core\Config;
use frm\core\Router;

class Application 
{

    /**
     * 
     * @param array $config
     */
    public function run($config = []) 
    {           
        $this->config = Config::getInstance($config);
        
        Router::addRoute($this->config['routes']);
        Router::dispatch();
        Router::execute();
    }

}
