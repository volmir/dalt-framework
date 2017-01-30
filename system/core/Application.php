<?php

namespace Frm\Core;

use Frm\Core\Config;
use Frm\Core\Router;
use Frm\Core\Benchmark;

class Application 
{
    
    /**
     *
     * @var Benchmark
     */
    public $benchmark;


    public function run() 
    {           
        $this->benchmark = new Benchmark();
        
        Router::addRoute(Config::getInstance('routes'));
        Router::dispatch();
    }

}
