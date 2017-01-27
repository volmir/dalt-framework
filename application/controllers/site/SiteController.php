<?php

use Frm\Core\Controller;

class SiteController extends Controller 
{

    public function __construct() 
    {
        parent::__construct();        
    }

    public function indexAction() 
    {        

    }
    
    public function error404Action() 
    {        
        $this->view->set('title', '404 Error');
        $this->view->render('error404');
    }    
    
}
