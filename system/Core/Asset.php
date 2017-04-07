<?php

namespace Dalt\Core;

use Dalt\Interfaces\AssetInterface;

class Asset implements AssetInterface
{
    
    /**
     *
     * @var array
     */
    public $css = [];
    /**
     *
     * @var array 
     */
    public $js = [];

    /**
     * 
     * @param array $assets
     */
    public function __construct($assets = []) 
    {
        if (isset($assets['css']) && is_array($assets['css'])) {
            foreach ($assets['css'] as $css) {
                $this->addCss($css);
            }
        }
        if (isset($assets['js']) && is_array($assets['js'])) {
            foreach ($assets['js'] as $js) {
                $this->addJs($js);
            }
        }        
    }    
    
    /**
     * 
     * @param string $css
     */
    public function addCss($css) 
    {
        if (isset($css) && is_string($css)) {
            $this->css[] = $css;
        }
    }
    
    /**
     * 
     * @param string $js
     */
    public function addJs($js) 
    {
        if (isset($js) && is_string($js)) {
            $this->js[] = $js;
        }
    }  
    
    public function outputCss()
    {
        if (count($this->css)) {
            foreach ($this->css as $value) {
                echo '<link rel="stylesheet" href="' . $value . '">' . PHP_EOL;
            }
        }
    }
    
    public function outputJs() 
    {
        if (count($this->js)) {
            foreach ($this->js as $value) {
                echo '<script src="' . $value . '"></script>' . PHP_EOL;
            }
        }
    }     
    
    public function clearCss()
    {
        $this->css = [];
    }
    
    public function clearJs()
    {
        $this->js = [];
    }
    
}
