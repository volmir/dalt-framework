<?php

use framework\core\View;
use framework\core\Registry;
use framework\exception\CoreException;
 
class ViewTest extends PHPUnit_Framework_TestCase
{
    
    protected function setUp()
    {
        $this->configPath = 'frontend/config/main.php';
        $config = require(__DIR__ . '/../../../' . $this->configPath);
        $this->config = new Registry($config);     

        $stdClass = new stdClass();
        $stdClass->app = new stdClass();
        $stdClass->app->config = new stdClass();
        $stdClass->app->config->basePath = $this->config->basePath;
 
        $this->view = new View($stdClass);
    }     
    
    public function testSetGetClear() 
    {
        $this->view->set(['title' => 'Simlpe PHP Framework']);
        $this->assertEquals('Simlpe PHP Framework', $this->view->get('title'));
        $this->view->clear();
        $this->assertNull($this->view->vars['title']);
    } 

}
