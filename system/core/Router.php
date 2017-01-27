<?php

namespace Frm\Core;

use Frm\Core\Request;
use Frm\Core\Application;
use Frm\Core\Exception\SystemException;

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
            self::$params = self::splitUrl($requestedUrl);
        }

        if (isset(self::$routes[$requestedUrl])) {
            self::$params = self::splitUrl(self::$routes[$requestedUrl]);
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
                self::$params = self::splitUrl($uri);

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
        $controller_path = __DIR__ . "/../../application/controllers/" . strtolower($controller_name) . "/" . $controller_name . 'Controller.php';
        try {
            if (file_exists($controller_path)) {
                include_once $controller_path;
            } else {
                throw new SystemException('Controller "' . $controller_name . '" not exists');
            }
        } catch (SystemException $e) {
            $e->logError();
            header("HTTP/1.0 404 Not Found");
            Router::addRoute($_SERVER["REQUEST_URI"], 'site/error404');
            Router::dispatch();
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
            Router::addRoute($_SERVER["REQUEST_URI"], 'site/error404');
            Router::dispatch();
        }
    }

    /**
     * Divide the URL submitted to the components
     */
    public static function splitUrl($url) 
    {
        return preg_split('/\//', $url, -1, PREG_SPLIT_NO_EMPTY);
    }    
}
