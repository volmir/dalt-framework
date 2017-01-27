<?php

namespace Frm\Core;

class View {

    /**
     * 
     * @var string
     */
    protected $header_templete = '../../layout/header';
    /**
     * 
     * @var string
     */
    protected $footer_templete = '../../layout/footer';
    /**
     *
     * @var string
     */
    protected $template_extention = '.tpl';    
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

    public function __construct($controller) {        
        $this->controller = $controller;
        $path = strtolower(str_replace('Controller', '', get_class($controller)));
        $this->path = __DIR__ . '/../../application/controllers/' . $path . '/';        
    }
    
    public function __get($name)
    {
        if (property_exists($this->controller,$name))
        {
            return $this->controller->{$name};
        }
        
        return null;
    }
    
    public function __call($name, $arguments)
    {
        if (method_exists($this->controller, $name))
        {
            return $this->controller->{$name}($arguments[0]);
        }
    }    

    /**
     * Set variables
     *
     * @param variable name $name
     * @param variable value $value
     */
    public function set($name, $value) {
        $this->vars[$name] = $value;
    }

    /**
     * Clear view data
     *
     */
    public function clear() {
        unset($this->vars);
    }

    /**
     * Parse template
     *
     * @param filename $template
     * @return text
     */
    public function parse($template) {
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
            throw new \Exception('The template file "' . $this->path . $template . '" does not exist');
        }
    }

    /**
     * Show template content
     *
     * @param filename $template
     */
    public function render($template) {
        $content = '';       
        $content .= $this->parse($this->header_templete);
        $content .= $this->parse($template);
        $content .= $this->parse($this->footer_templete);
        
        echo $content;
    }
    
    /**
     * Show template content
     *
     * @param filename $template
     */
    public function render_partial($template) {
        echo $this->parse($template);
    }    
}