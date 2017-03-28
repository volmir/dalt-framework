<?php

namespace Frontend\Controllers;

use Dalt\Core\Controller;

class ContactController extends Controller 
{

    public function indexAction() 
    {        
        $this->view->set([
            'title' => 'Contacts',
        ]);         
        $this->view->render('index');
    }
    
}
