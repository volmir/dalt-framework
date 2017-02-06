<?php

namespace app\controllers;

use frm\core\Controller;

class ContactController extends Controller 
{

    public function __construct() 
    {
        parent::__construct();        
    }

    public function indexAction() 
    {        
        $this->view->set('title', 'Contacts');
        $this->view->render('index');
    }
    
}
