<?php

namespace Frontend\Controllers;

use Frontend\System\FrontendController;

class SiteController extends FrontendController 
{
    
    public function error404Action() 
    {        
        $this->view->set([
            'title' => '404: Page not found',
        ]);
        $this->view->render('error404');
    }   
    
    public function robotsAction() 
    {        
        $this->view->set([
            'request_scheme' => $this->request->server['REQUEST_SCHEME'],
            'server_name' => $this->request->server['SERVER_NAME'],
        ]);
        $this->view->renderPartial('robots.txt');
    }   
    
    public function sitemapAction() 
    {        
        $this->view->set([
            'request_scheme' => $this->request->server['REQUEST_SCHEME'],
            'server_name' => $this->request->server['SERVER_NAME'],
            'date' => date('Y-m-d'),
        ]);
        $this->view->renderPartial('sitemap.xml');
    }      
    
}
