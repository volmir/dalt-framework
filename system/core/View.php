<?php

namespace Core;

/**
 * 
 * Class for parse and show templates
 */
class View {

    /**
     * 
     * @var header.tpl
     */
    protected $header_templete = '../../theme/layout/header';
    /**
     * 
     * @var footer.tpl
     */
    protected $footer_templete = '../../theme/layout/footer';
    /**
     *
     * @var string
     */
    protected $template_extention = '.tpl';    
    /**
     * 
     * @var Controller
     */
    private $_controller;    
    /**
     *
     * @var string
     */
    private $_path;
    /**
     *
     * @var array
     */
    public $vars = array();    

    public function __construct($controller) {        
        $this->_controller = $controller;
        $path = str_replace('Controller', '', get_class($controller));
        $this->_path = APPLICATION_PATH . '/' . $path . '/';        
    }
    
    public function __get($name)
    {
        if (property_exists($this->_controller,$name))
        {
            return $this->_controller->{$name};
        }
        
        return null;
    }
    
    public function __call($name, $arguments)
    {
        if (method_exists($this->_controller, $name))
        {
            return $this->_controller->{$name}($arguments[0]);
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
        if (file_exists($this->_path . $template)) {
            if (count($this->vars)) {
                extract($this->vars, EXTR_SKIP);
            }

            ob_start();
            include($this->_path . $template);
            $output = ob_get_contents();
            ob_end_clean();

            return $output;
        } else {
            throw new \Exception('The template file "' . $template . '" does not exist');
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

/*

$view = new \Core\View('/templates/');

$view->set('title', 'Title');
$view->set('header', 'Header');
$view->set('menu', $view->parse('menu.tpl'));
$view->set('content', $view->parse('content.tpl'));

$view->render('index.tpl');
 


<!-- begin source of "header.tpl" -->
<html>
<head>
    <title><?php echo $title; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<!-- end source of "header.tpl" -->

<!-- begin source of "index.tpl" -->
    <?php echo $menu; ?>
    <hr />
    <h1><?php echo $header; ?></h1>    
    <?php echo $content; ?>
<!-- end source of "index.tpl" -->

<!-- begin source of "footer.tpl" -->
</body>
</html>
<!-- end source of "footer.tpl" -->

 */


