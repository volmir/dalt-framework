<?php

namespace frontend\controllers;

use framework\core\Controller;

class IndexController extends Controller 
{

    public function indexAction() 
    {
        $this->view->set([
            'title' => 'Index page',
        ]);                
        $this->view->render('index');
    }
    
}
