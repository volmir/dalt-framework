<?php

namespace backend\controllers;

use framework\core\Controller;

class UserController extends Controller 
{

    public function indexAction() 
    {
        $this->view->set([
            'title' => 'Users',
        ]);    
        
        $this->view->render('index');
    }
    
}
