<?php

use Frm\Core\Controller;

class AboutController extends Controller 
{

    public function __construct() 
    {
        parent::__construct();        
    }

    public function indexAction() 
    {        
        $this->view->set('title', 'About');
        $this->view->render('index');
    }
    
}
