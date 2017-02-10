<?php

namespace frontend\controllers;

use framework\core\Controller;

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
