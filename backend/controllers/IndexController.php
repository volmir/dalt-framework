<?php

namespace backend\controllers;

use framework\core\Controller;
use framework\core\Auth;
use framework\core\Response;

class IndexController extends Controller 
{

    public function indexAction() 
    {
        $this->view->set([
            'title' => 'Backend index page',
        ]); 
        
        if (!Auth::isAuth()) { 
            $this->view->render('../login/index');
        } else {
            $this->view->render('index');
        }
    }
    
}
