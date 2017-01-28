<?php

namespace App\Controllers;

use Frm\Core\Controller;

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
