<?php

namespace framework\core;

use framework\core\Request;
use framework\core\View;
use framework\core\Benchmark;
use framework\core\Application;
use framework\exception\CoreException;

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
        
    }    

    /**
     * 
     * @param Application $app
     * @return $this
     */
    public function setApplication(Application $app)
    {
        $this->app = $app;
        $this->view = new View($this);

        return $this;
    }    
    
    /**
     * 
     * @param string $name
     * @return mixed
     */
    public function __get($name) 
    {
        if (isset($this->app->$name)) {
            return $this->app->$name;
        }
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
