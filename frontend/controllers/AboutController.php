<?php

namespace frontend\controllers;

use framework\core\Controller;

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
