<?php

namespace Frontend\Controllers;

use Dalt\Core\Controller;

class BlogController extends Controller 
{

    public function __construct() 
    {
        parent::__construct();        
    }

    public function indexAction() 
    {        
        $this->view->set([
            'title' => 'Blog',
        ]);          
        $this->view->render('index');
    }   
    
    public function viewBlogAction($userName) 
    {        
        echo __FILE__ . ' - ' . __METHOD__ . '<br>';
        var_dump($userName);
    }    
    
    public function viewPostAction($userName, $postId) 
    {        
        echo __FILE__ . ' - ' . __METHOD__ . '<br>';
        var_dump($userName);
        var_dump($postId);
    }        
    
}
