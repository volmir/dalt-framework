<?php

namespace Frm\Core;

use Frm\Core\Config;
use Frm\Core\View;

class Controller {

    /**
     *
     * @var View 
     */
    public $view;
    /**
     *
     * @var array 
     */
    public $config; 

    public function __construct() 
    {
        $this->config = Config::getInstance();
        $this->view = new View($this);
    }

}
