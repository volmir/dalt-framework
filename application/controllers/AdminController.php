<?php

namespace app\controllers;

use frm\core\Controller;
use frm\core\Response;
use frm\core\Auth;

class AdminController extends Controller {
    
    /**
     *
     * @var stdClass
     */
    public $task;  
    /**
     *
     * @var array
     */
    public $tasks;     
    
    public function __construct() 
    {
        parent::__construct();
        
        if (!Auth::isAuth()) {
            Response::redirect('/login/');
        }
    }

    public function indexAction() 
    {
        $this->view->set('title', 'Admin zone');
        $this->view->render('index');
    }
        
}
