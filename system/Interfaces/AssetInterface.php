<?php

namespace Dalt\Interfaces;

interface AssetInterface
{
    
    /**
     * 
     * @param string $css
     */
    public function addCss($css);
    
    /**
     * 
     * @param string $js
     */
    public function addJs($js);  
    
    public function outputCss();
    
    public function outputJs();   
    
    public function clearCss();
    
    public function clearJs();
    
}
