<?php

class LoginController extends \Core\Controller 
{
    /**
     *
     * @var string 
     */
    public $auth_status = '';

    public function __construct() {
        parent::__construct();        
    }

    public function indexAction() {
        $this->view->set('title', 'Login');
        
        if (isset($_REQUEST['login']) && isset($_REQUEST['password'])) {
            if (\Core\Auth::auth($_REQUEST['login'], $_REQUEST['password'])) {
                \Core\Application::redirect('/admin/');
            } else {
                $this->auth_status = 'error';
            }            
        }
        
        $this->view->render('index');
    }   
    
    public function logoutAction() {
        \Core\Auth::logout();
        \Core\Application::redirect('/');
    }    
}
