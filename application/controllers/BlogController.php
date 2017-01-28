<?php

namespace App\Controllers;

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
    
    public function alexanderAction($id) 
    {        
        echo __FILE__ . ' - ' . __METHOD__ . '<br>';
        var_dump($id);
    }    

    public function julianAction($id) 
    {        
        echo __FILE__ . ' - ' . __METHOD__ . '<br>';
        var_dump($id);
    }    
    
    public function viewPostAction($id) 
    {        
        echo __FILE__ . ' - ' . __METHOD__ . '<br>';
        var_dump($id);
    }        
    
}
