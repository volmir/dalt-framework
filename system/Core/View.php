<?php

namespace Dalt\Core;

use Dalt\Exception\CoreException;

class View 
{

    /**
     * 
     * @var string
     */
    protected $templateLayout = '../layout/main';
    /**
     *
     * @var string
     */
    protected $templateExtention = '.htm';    
    /**
     * 
     * @var mixed
     */
    private $object;    
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

    public function __construct($object = null) 
    {        
        $this->object = $object;
    }
    
    /**
     * 
     * @param string $path
     */
    public function setPath($path = '') 
    {        
        $this->path = $path; 
    } 
    
    /**
     * 
     * @param string $templateLayout
     */
    public function setLayout($templateLayout = '') 
    {        
        $this->templateLayout = $templateLayout; 
    }    
    
    /**
     * 
     * @param string $name
     * @return mixed
     */
    public function __get($name)
    {
        if (property_exists($this->object, $name)) {
            return $this->object->$name;
        }  
        if (isset($this->object->application) && property_exists($this->object->application, $name)) {
            return $this->object->application->$name;
        }         
        return null;
    }   
    
    public function __call($method, $params) 
    {
        if (method_exists($this->object, $method)) {
            return call_user_func_array([$this->object, $method], $params);
        } 
    }     

    /**
     * Set variables
     *
     * @param array $values
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
        echo $this->parse($this->templateLayout);
    }
    
    /**
     * Show template content
     *
     * @param filename $template
     */
    public function renderPartial($template) 
    {
        echo $this->parse($template);
    }    
}
