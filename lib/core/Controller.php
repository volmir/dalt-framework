<?php

namespace Core;

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

    public function __construct() {
        $this->config = \Core\Config::getInstance();
        $this->view = new View($this);
    }

    public function __destruct() {

    }

}
