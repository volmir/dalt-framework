<?php

namespace Backend\Controllers;

use Backend\System\BackendController;

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
