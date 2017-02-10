<?php

namespace frm\core;

use frm\exception\CoreException;

class View {

    /**
     * 
     * @var string
     */
    protected $layout_template = '../../views/layouts/main';
    /**
     *
     * @var string
     */
    protected $template_extention = '.htm';    
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
    public $vars = array();    

    public function __construct($controller) 
    {        
        $this->controller = $controller;
        $controller_path = explode('\\', get_class($controller));
        $path = strtolower(str_replace('Controller', '', array_pop($controller_path)));
        $this->path = __DIR__ . '/../../application/views/' . $path . '/';        
    }
    
    public function __get($name)
    {
        if (property_exists($this->controller,$name)) {
            return $this->controller->{$name};
        }
        
        return null;
    }
    
    public function __call($name, $arguments)
    {
        if (method_exists($this->controller, $name)) {
            return $this->controller->{$name}($arguments[0]);
        }
    }    

    /**
     * Set variables
     *
     * @param variable name $name
     * @param variable value $value
     */
    public function set($name, $value) 
    {
        $this->vars[$name] = $value;
    }
    
    /**
     * 
     * @param string $name
     * @return mixed
     */
    public function getVar($name) 
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
        $template = $template . $this->template_extention;
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
            throw new \CoreException('The template file "' . $this->path . $template . '" does not exist');
        }
    }

    /**
     * Show template content
     *
     * @param filename $template
     */
    public function render($template) 
    {
        $this->set('content', $this->parse($template));
        echo $this->parse($this->layout_template);
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
