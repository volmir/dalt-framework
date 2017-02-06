<?php

namespace frm\core;

use frm\core\Config;
use frm\core\Router;

class Application 
{

    public function run() 
    {                 
        Router::addRoute(Config::getInstance('routes'));
        Router::dispatch();
    }

}
