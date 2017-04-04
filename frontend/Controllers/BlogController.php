<?php

namespace Frontend\Controllers;

use Frontend\System\FrontendController;

class BlogController extends FrontendController 
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
