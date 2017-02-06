<?php

namespace frm\core;

use frm\core\Request;
use frm\core\View;
use frm\core\Benchmark;

class Controller
{

    /**
     *
     * @var View 
     */
    public $view;
    /**
     *
     * @var Request
     */
    public $request;     
    /**
     *
     * @var Benchmark
     */
    public $benchmark; 

    public function __construct() 
    {
        $this->request = Request::getInstance();               
        $this->view = new View($this);
        $this->benchmark = new Benchmark();
    }

}
