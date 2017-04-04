<?php

namespace Frontend\Controllers;

use Frontend\System\FrontendController;

class AboutController extends FrontendController 
{

    public function indexAction() 
    {        
        $this->view->set([
            'title' => 'About',
        ]);
        $this->view->render('index');
    }
    
}
