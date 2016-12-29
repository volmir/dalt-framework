<?php

namespace Core;

/**
 * 
 */
class Application {

    public static function run() {
        $controller_name = 'index';
        $action_name = 'index';

        $path = explode('?', $_SERVER['REQUEST_URI']);
	$routes = explode('/', $path[0]);
        if (!empty($routes[1])) {
            $controller_name = strtolower($routes[1]);
        }
        if (!empty($routes[2])) {
            $action_name = strtolower($routes[2]);
        }

        $controller_file = $controller_name . 'Controller.php';
        $controller_path = "app/" . $controller_name . "/" . $controller_file;
        if (file_exists($controller_path)) {
            include_once $controller_path;
        } else {
            throw new \Exception('Controller was not exists');
        }

        $controller_class = $controller_name . 'Controller';
        $controller = new $controller_class;
        $action = $action_name . 'Action';
        if (method_exists($controller, $action)) {
            $controller->$action();
        } else {
            throw new \Exception('Action was not exists');
        }
    }

    /**
     * Redirects to $url: sends header "location: $url" and exit
     */
    public static function redirect($url) {
        header('Location: ' . $url);
        exit();
    }

}
