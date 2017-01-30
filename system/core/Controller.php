<?php

namespace Frm\Core;

use Frm\Core\View;
use Frm\Core\Request;

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
