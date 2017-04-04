<?php

namespace Frontend\Controllers;

use Frontend\System\FrontendController;

class ContactController extends FrontendController 
{

    public function indexAction() 
    {        
        $this->view->set([
            'title' => 'Contacts',
        ]);         
        $this->view->render('index');
    }
    
}
