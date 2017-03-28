<?php

namespace Frontend\Controllers;

use Dalt\Core\Controller;

class AboutController extends Controller 
{

    public function indexAction() 
    {        
        $this->view->set([
            'title' => 'About',
        ]);
        $this->view->render('index');
    }
    
}
