<?php

namespace Core;

use Core\Request;
use Core\Application;
use Core\Exception\SystemException;

class Router
{
    /**
     * string
     */
    const DEFAULT_CONTROLLER = 'Index';
    /**
     * string
     */
    const DEFAULT_ACTION = 'index';
    /**
     *
     * @var array
     */
    public static $routes = array();
    /**
     *
     * @var array
     */
    private static $params = array();

    /**
     * Add routes
     */
    public static function addRoute($route, $destination = null) 
    {
        if ($destination != null && !is_array($route)) {
            $route = array($route => $destination);
        }
        self::$routes = array_merge(self::$routes, $route);
    }

    /**
     * Processing the transferred URL
     * 
     * @param string $requestedUrl
     */
    public static function dispatch($requestedUrl = null) 
    {
        if ($requestedUrl === null) {
            $uri = explode('?', $_SERVER["REQUEST_URI"]);
            $requestedUrl = urldecode($uri[0]);
            self::$params = Request::splitUrl($requestedUrl);
        }

        if (isset(self::$routes[$requestedUrl])) {
            self::$params = Request::splitUrl(self::$routes[$requestedUrl]);
            return self::executeAction();
        }       
        
        foreach (self::$routes as $route => $uri) {
            if (strpos($route, ':') !== false) {
                $route = str_replace(':any', '(.+)', str_replace(':num', '([0-9]+)', $route));
            }

            if (preg_match('#^' . $route . '$#', $requestedUrl)) {
                if (strpos($uri, '$') !== false && strpos($route, '(') !== false) {
                    $uri = preg_replace('#^' . $route . '$#', $uri, $requestedUrl);
                }
                self::$params = Request::splitUrl($uri);

                break; 
            }
        }
        
        return self::executeAction();
    }

    /**
     * Run the application controller/action/parameters
     */
    public static function executeAction() 
    {     
        $controller_name = isset(self::$params[0]) ? self::$params[0] : self::DEFAULT_CONTROLLER;      
        $controller_path = "app/" . strtolower($controller_name) . "/" . $controller_name . 'Controller.php';
        try {
            if (file_exists($controller_path)) {
                include_once $controller_path;
            } else {
                throw new SystemException('Controller "' . $controller_name . '" not exists');
            }
        } catch (SystemException $e) {
            $e->logError();
            header("HTTP/1.0 404 Not Found");
        }

        $controller_class = $controller_name . 'Controller';
        $controller = new $controller_class;        
        
        $action = (isset(self::$params[1]) ? self::$params[1] : self::DEFAULT_ACTION) . 'Action';
        $params = array_slice(self::$params, 2);

        try {
            if (method_exists($controller, $action)) {
                call_user_func_array(array($controller, $action), $params);
            } else {
                throw new SystemException('Action "' . $action . '" not exists');                
            }
        } catch (SystemException $e) {
            $e->logError();
            header("HTTP/1.0 404 Not Found");         
        }
    }

}
