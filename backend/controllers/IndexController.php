<?php

namespace backend\controllers;

use backend\system\BackendController;
use framework\core\Auth;

class IndexController extends BackendController 
{
    
    public function __construct() 
    {
        parent::__construct();
    }
    
    public function indexAction() 
    {
        $this->view->set([
            'title' => 'Backend dashboard',
        ]); 
        
        $this->view->render('index');
    }
    
}
