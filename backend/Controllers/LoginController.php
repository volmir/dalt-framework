<?php

namespace Backend\Controllers;

use Dalt\Core\Controller;
use Dalt\Core\Auth;
use Dalt\Core\Response;
use Common\Models\User;

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
            'title' => 'Sign in',
        ]);        
        
        if (isset($_REQUEST['login']) && isset($_REQUEST['password'])) {
            $auth = $this->di->get('auth');
            if ($auth->auth($_REQUEST['login'], $_REQUEST['password'])) {
                $user = User::where('login', $_REQUEST['login'])
                    ->where('type', User::TYPE_ADMIN)
                    ->where('status', User::STATUS_ACTIVE)
                    ->first();
                if (isset($user) && $user instanceof User) {
                    Response::redirect('/');
                } else {
                    $this->authStatus = 'error';
                }
            } else {
                $this->authStatus = 'error';
            }            
        }
             
        $this->assets->clearCss();     
        $this->assets->addCss('//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css');     
        $this->assets->addCss('/css/signin.css');     
        $this->view->setLayout('../layout/signin');
        $this->view->render('index');
    }   
    
    public function logoutAction() 
    {
        Auth::logout();
        Response::redirect('/login/');
    }    
}
