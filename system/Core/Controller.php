<?php

namespace Dalt\Core;

use Dalt\Core\View;
use Dalt\Core\Application;
use Dalt\Exception\CoreException;

abstract class Controller
{
    /** 
     * 
     * @var Application 
     */
    public $application;
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
     * @param Application $application
     * @return $this
     */
    public function setApplication(Application $application)
    {
        $this->application = $application;  
        
        $controllerPath = explode('\\', get_called_class());
        $controllerName = strtolower(str_replace('Controller', '', array_pop($controllerPath)));
        $this->view = new View($this);
        $this->view->setPath($this->config->basePath . '/Views/' . $controllerName . '/');        
       
        return $this;
    }    
    
    /**
     * 
     * @param string $name
     * @return mixed
     */
    public function __get($name) 
    {
        if (property_exists($this->application, $name)) {
            return $this->application->$name;
        }        
    }

    public function run()
    {
        $action = $this->router->getActionName();
        try {
            if (method_exists($this, $action)) {
                ob_start();
                call_user_func_array(array($this, $action), $this->router->getActionParams());
                $output = ob_get_contents();
                ob_end_clean();
                
                $this->response->setContent($output);
            } else {
                throw new CoreException('Action "' . $action . '" not exists: ' . $_SERVER["REQUEST_URI"]);                
            }
        } catch (CoreException $e) {
            $e->logError();
            $this->response->setHeader("HTTP/1.1 404 Not Found");
            $this->router->error404();
            $this->application->execute();
            exit();
        }       
    }    
}
