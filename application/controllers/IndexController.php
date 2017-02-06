<?php

namespace app\controllers;

use frm\core\Controller;

class IndexController extends Controller 
{

    public function __construct() 
    {
        parent::__construct();        
    }

    public function indexAction() 
    {
        $this->view->set('title', 'Index page');
        $this->view->render('index');
    }
    
}
