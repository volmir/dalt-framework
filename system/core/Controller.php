<?php

namespace frm\core;

use frm\core\Request;
use frm\core\View;
use frm\core\Benchmark;
use frm\core\Application;
use frm\exception\CoreException;

abstract class Controller
{
    /** 
     * 
     * @var Application 
     */
    public $app;
    /**
     *
     * @var View 
     */
    public $view;

    public function __construct() 
    {            
        $this->view = new View($this);
    }

    /**
     * 
     * @param Application $app
     * @return $this
     */
    public function setApplication(Application $app)
    {
        $this->app = $app;
        return $this;
    }    
    
    public function run()
    {
        $action = $this->app->router->getActionName();
        try {
            if (method_exists($this, $action)) {
                ob_start();
                call_user_func_array(array($this, $action), $this->app->router->getActionParams());
                $output = ob_get_contents();
                ob_end_clean();
                
                $this->app->response->setContent($output);
            } else {
                throw new CoreException('Action "' . $action . '" not exists: ' . Request::getInstance()->server["REQUEST_URI"]);                
            }
        } catch (CoreException $e) {
            $e->logError();
            $this->app->response->setHeader("HTTP/1.1 404 Not Found");
            $this->app->router->error404();
            $this->app->execute();
            exit();
        }       
    }    
}
