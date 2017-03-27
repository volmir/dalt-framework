<?php

namespace framework\core;

use framework\core\Response;
use framework\core\Registry;
use framework\core\Router;
use framework\core\Request;
use framework\core\Environment;
use framework\core\DI;
use framework\core\Controller;
use framework\exception\CoreException;

class Application 
{
    /**
     *
     * @var Benchmark 
     */
    public $benchmark;
    /**
     *
     * @var DI
     */
    public $di;    
    /**
     *
     * @var string
     */
    public $environment;
    /**
     *
     * @var Asset 
     */
    public $assets;    
    /**
     *
     * @var Registry 
     */
    public $config;
    /**
     *
     * @var Response 
     */
    public $response;  
    /**
     *
     * @var Request 
     */
    public $request;     
    /**
     *
     * @var Router 
     */
    public $router;
    
    /**
     * 
     * @param array $config
     */
    public function run($config = []) 
    {           
        $this->benchmark = new Benchmark(); 
        $this->environment = Environment::get();
        $this->config = new Registry($config);
        $this->di = new DI();  
        $this->response = new Response();
        $this->request = Request::getInstance();
        $this->assets = new Asset($this->config->assets); 
        $this->setParams();  
        $this->router = new Router($this->config->routes);
        $this->execute();
    }

    public function execute() 
    {
        $controllerName = $this->router->getControllerName();     
        try {
            $controllerClass = '\\' . $this->config->name . '\controllers\\' . $controllerName . 'Controller';
            if (class_exists($controllerClass)) {
                $controller = new $controllerClass;
                if ($controller instanceof Controller) {
                    $controller->setApplication($this)->run();
                }
            } else {
                throw new CoreException('Controller "' . $controllerName . '" not exists: ' . Request::getInstance()->server["REQUEST_URI"]);
            }
        } catch (CoreException $e) {
            $e->logError();
            $this->response->setHeader("HTTP/1.1 404 Not Found");
            $this->router->error404(); 
            $this->execute();
            exit();
        }        
        
        $this->response->sendHeaders();
        
        echo $this->response->getContent();
    }

    protected function setParams()
    {
        define('APP_NAME', $this->config->name);   
        
        define('DB_HOST', $this->config->db[$this->environment]['host']);    
        define('DB_DBNAME', $this->config->db[$this->environment]['dbname']);    
        define('DB_USERNAME', $this->config->db[$this->environment]['username']);    
        define('DB_PASSWORD', $this->config->db[$this->environment]['password']);          
    }
}
