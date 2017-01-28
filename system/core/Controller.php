<?php

namespace Frm\Core;

use Frm\Core\Application;
use Frm\Core\View;

class Controller
{

    /**
     *
     * @var View 
     */
    public $view;

    public function __construct() 
    {
        $this->request = Request::getInstance();               
        $this->view = new View($this);
    }

}
