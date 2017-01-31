<?php

namespace Frm\Core;

use Frm\Core\Request;
use Frm\Core\View;
use Frm\Core\Benchmark;

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
