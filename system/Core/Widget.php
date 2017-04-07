<?php

namespace Dalt\Core;

use Dalt\Core\View;

class Widget 
{
    /**
     *
     * @var View 
     */
    public $view;

    protected function configure($config = [])
    {
        $this->view = new View($this);
        $path = __DIR__ . '/../../' . strtolower(APP_NAME) . '/Views/widgets/';
        $this->view->setPath($path);
        
        if (is_array($config) && count($config)) {
            foreach ($config as $name => $value) {
                $this->$name = $value;
            }
        }
    }     

    /**
     * Executes the widget
     * @return string the result of widget execution to be outputted
     */
    public function run()
    {
        
    }    
    
    /**
     * Creates a widget instance and runs it
     * The widget rendering result is returned by this method
     * @param array $config name-value pairs that will be used to initialize the object properties
     * @return string the rendering result of the widget
     * @throws \Exception
     */
    public static function widget($config = [])
    {
        ob_start();
        ob_implicit_flush(false);
        try {          
            $widgetClass = get_called_class();
            if (class_exists($widgetClass)) {
                $widget = new $widgetClass;                
                $widget->configure($config);
                $out = $widget->run();
            }            
        } catch (\Exception $e) {
            if (ob_get_level() > 0) {
                ob_end_clean();
            }
            throw $e;
        }
        return ob_get_clean() . $out;
    }    
    
    /**
     * Show template content
     *
     * @param filename $template
     */
    public function render($template, $vars = []) 
    {
        $this->view->set($vars);
        $this->view->renderPartial($template);
    } 
}
