<?php

namespace framework\core;

use framework\core\Response;
use framework\core\Registry;
use framework\core\Router;
use framework\core\Request;
use framework\core\Environment;
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
        $this->config = new Registry($config);
        $this->response = new Response();

        define('DB', $this->config->db[Environment::get()]);    
        
        $this->router = new Router();
        $this->router->addRoute($this->config->routes);
        $this->router->dispatch();

        $this->execute();
    }

    public function execute() 
    {
        $controllerName = $this->router->getControllerName();     
        try {
            $controller_class = '\\' . $this->config->name . '\controllers\\' . $controllerName . 'Controller';
            if (class_exists($controller_class)) {
                $controller = new $controller_class;
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
        
        foreach ($this->response->getHeaders() as $header) {
            header($header);
        }
        
        echo $this->response->getContent();
    }

}
