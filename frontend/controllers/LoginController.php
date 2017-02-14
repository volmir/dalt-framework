<?php

namespace frontend\controllers;

use framework\core\Controller;
use framework\core\Auth;
use framework\core\Response;
use framework\core\Request;

class LoginController extends Controller 
{
    /**
     *
     * @var string 
     */
    public $authStatus = '';

    public function indexAction() 
    {   
        $this->view->set([
            'title' => 'Login',
        ]);        
        
        if (isset($this->request->post['login']) && isset($this->request->post['password'])) {
            if (Auth::auth($this->request->post['login'], $this->request->post['password'])) {
                Response::redirect('/');
            } else {
                $this->authStatus = 'error';
            }            
        }
                
        $this->view->render('index');
    }   
    
    public function logoutAction() 
    {
        Auth::logout();
        Response::redirect('/');
    }    

}
