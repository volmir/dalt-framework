<?php

namespace App\Controllers;

use Frm\Core\Controller;
use Frm\Core\Response;
use Frm\Core\Auth;
use Frm\Core\DB;

class IndexController extends Controller 
{

    public function __construct() 
    {
        parent::__construct();        
    }

    public function indexAction() 
    {
        $this->view->set('title', 'Index page');
        $this->view->render('index');
        
        DB::getInstance();
    }
    
}
