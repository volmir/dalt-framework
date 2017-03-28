<?php

use Dalt\Core\View;
use Dalt\Core\Registry;
use Dalt\Exception\CoreException;
 
class ViewTest extends PHPUnit_Framework_TestCase
{
    
    protected function setUp()
    {
        $this->configPath = 'frontend/config/main.php';
        $config = require(__DIR__ . '/../../../' . $this->configPath);
        $this->config = new Registry($config);     

        $stdClass = new stdClass();
        $stdClass->application = new stdClass();
        $stdClass->application->config = new stdClass();
        $stdClass->application->config->basePath = $this->config->basePath;
 
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
