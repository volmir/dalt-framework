<?php

namespace Frm\Core;

use Frm\Core\Config;
use Frm\Core\Router;

class Application 
{
    public function run() 
    {     
        Router::addRoute(Config::getInstance('routes'));
        Router::dispatch();
    }

}
