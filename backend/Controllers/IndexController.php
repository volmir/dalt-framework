<?php

namespace Backend\Controllers;

use Backend\System\BackendController;
use Dalt\Core\Auth;

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
