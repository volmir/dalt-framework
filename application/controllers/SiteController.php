<?php

namespace app\controllers;

use frm\core\Controller;

class SiteController extends Controller 
{

    public function __construct() 
    {
        parent::__construct();        
    }

    public function indexAction() 
    {        

    }
    
    public function error404Action() 
    {        
        $this->view->set('title', '404 Error');
        $this->view->render('error404');
    }   
    
    public function robotsAction() 
    {        
        $this->view->set('request_scheme', $this->request->server['REQUEST_SCHEME']);
        $this->view->set('server_name', $this->request->server['SERVER_NAME']);
        $this->view->render_partial('robots.txt');
    }   
    
    public function sitemapAction() 
    {        
        $this->view->set('request_scheme', $this->request->server['REQUEST_SCHEME']);
        $this->view->set('server_name', $this->request->server['SERVER_NAME']);
        $this->view->set('date', date('Y-m-d'));
        $this->view->render_partial('sitemap.xml');
    }      
    
}
