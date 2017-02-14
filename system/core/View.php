<?php

namespace framework\core;

use framework\exception\CoreException;

class View 
{

    /**
     * 
     * @var string
     */
    protected $layoutTemplate = '../layout/main';
    /**
     *
     * @var string
     */
    protected $templateExtention = '.htm';    
    /**
     * 
     * @var Controller
     */
    private $controller;    
    /**
     *
     * @var string
     */
    private $path;
    /**
     *
     * @var array
     */
    public $vars = [];    

    public function __construct($controller) 
    {        
        $this->controller = $controller;
        $controllerPath = explode('\\', get_class($controller));
        $controllerName = strtolower(str_replace('Controller', '', array_pop($controllerPath)));
        $this->path = $this->config->basePath . '/views/' . $controllerName . '/'; 
    }
    
    /**
     * 
     * @param string $name
     * @return mixed
     */
    public function __get($name)
    {
        if (property_exists($this->controller, $name)) {
            return $this->controller->$name;
        }  
        if (property_exists($this->controller->application, $name)) {
            return $this->application->$name;
        }         
        return null;
    }    

    /**
     * Set variables
     *
     * @param array $name
     */
    public function set(array $values) 
    {
        foreach ($values as $name => $value) {
            $this->vars[$name] = $value;
        }
    }
    
    /**
     * 
     * @param string $name
     * @return mixed
     */
    public function get($name) 
    {
        if (isset($this->vars[$name])) {
            return $this->vars[$name];
        }
        return null;        
    }    

    /**
     * Clear view data
     *
     */
    public function clear() 
    {
        unset($this->vars);
    }

    /**
     * Parse template
     *
     * @param filename $template
     * @return text
     */
    public function parse($template) 
    {
        $template = $template . $this->templateExtention;
        if (file_exists($this->path . $template)) {
            if (count($this->vars)) {
                extract($this->vars, EXTR_SKIP);
            }

            ob_start();
            include($this->path . $template);
            $output = ob_get_contents();
            ob_end_clean();

            return $output;
        } else {
            throw new CoreException('The template file "' . $this->path . $template . '" does not exist');
        }
    }

    /**
     * Show template content
     *
     * @param filename $template
     */
    public function render($template) 
    {
        $this->set([
            'content' => $this->parse($template)
        ]);
        echo $this->parse($this->layoutTemplate);
    }
    
    /**
     * Show template content
     *
     * @param filename $template
     */
    public function render_partial($template) 
    {
        echo $this->parse($template);
    }    
}
