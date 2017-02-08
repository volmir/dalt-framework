<?php

namespace frm\core;

use frm\core\Request;
use frm\core\Response;
use frm\core\Application;
use frm\core\Url;
use frm\exception\CoreException;

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
            $requestedUrl = Url::cropUrl(Request::getInstance()->server["REQUEST_URI"]);
            self::$params = Url::splitUrl($requestedUrl);
        }

        if (isset(self::$routes[$requestedUrl])) {
            self::$params = Url::splitUrl(self::$routes[$requestedUrl]);
            return true;
        }       
        
        foreach (self::$routes as $route => $uri) {
            if (strpos($route, ':') !== false) {
                $route = str_replace(':any', '(.+)', str_replace(':num', '([0-9]+)', $route));
            }

            if (preg_match('#^' . $route . '$#', $requestedUrl)) {
                if (strpos($uri, '$') !== false && strpos($route, '(') !== false) {
                    $uri = preg_replace('#^' . $route . '$#', $uri, $requestedUrl);
                }
                self::$params = Url::splitUrl($uri);

                break; 
            }
        }
    }

    /**
     * Run the application controller/action/parameters
     */
    public static function execute() 
    {     
        $controller_name = isset(self::$params[0]) ? self::$params[0] : self::DEFAULT_CONTROLLER;      
        $controller_name = ucfirst($controller_name);      
        try {
            $controller_class = '\app\controllers\\' . $controller_name . 'Controller';
            if (class_exists($controller_class)) {
                $controller = new $controller_class;
            } else {
                throw new CoreException('Controller "' . $controller_name . '" not exists');
            }
        } catch (CoreException $e) {
            $e->logError();
            self::error404();            
            return false;
        }      

        $action = (isset(self::$params[1]) ? self::$params[1] : self::DEFAULT_ACTION) . 'Action';
        $params = array_slice(self::$params, 2);

        try {
            if (method_exists($controller, $action)) {
                call_user_func_array(array($controller, $action), $params);
            } else {
                throw new CoreException('Action "' . $action . '" not exists');                
            }
        } catch (CoreException $e) {
            $e->logError();
            self::error404();
        }
    }
    
    /**
     * 
     */
    public static function error404()
    {
        Response::sendHeader("HTTP/1.1 404 Not Found");
        Router::addRoute(Url::cropUrl(Request::getInstance()->server["REQUEST_URI"]), 'site/error404');
        Router::dispatch();
        Router::execute();
    }

}
