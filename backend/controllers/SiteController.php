<?php

namespace backend\controllers;

use backend\system\BackendController;

class SiteController extends BackendController 
{
    
    public function __construct() 
    {
        parent::__construct();
    }    
    
    public function error404Action() 
    {        
        $this->view->set([
            'title' => '404: Page not found',
        ]);
        
        $this->view->setLayout('../layout/signin');        
        $this->view->render('error404');
    }        
    
}
