<?php

namespace backend\controllers;

use framework\core\Controller;
use framework\core\Auth;
use framework\core\Response;
use framework\core\Request;
use common\models\User;

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
        
        $request = Request::getInstance()->request;
        if (isset($request['login']) && isset($request['password'])) {
            if (Auth::auth($request['login'], $request['password'], User::TYPE_ADMIN)) {
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
