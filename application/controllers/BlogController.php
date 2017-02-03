<?php

namespace App\controllers;

use Frm\Core\Controller;

class BlogController extends Controller 
{

    public function __construct() 
    {
        parent::__construct();        
    }

    public function indexAction() 
    {        
        $this->view->set('title', 'Blog');
        $this->view->render('index');
    }   
    
    public function viewBlogAction($userId) 
    {        
        echo __FILE__ . ' - ' . __METHOD__ . '<br>';
        var_dump($userId);
    }    
    
    public function viewPostAction($id) 
    {        
        echo __FILE__ . ' - ' . __METHOD__ . '<br>';
        var_dump($id);
    }        
    
}
