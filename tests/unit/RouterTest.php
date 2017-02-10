<?php

use frm\core\Router;
 
class RouterTest extends PHPUnit_Framework_TestCase
{

    protected function setUp()
    {
        $this->router = new Router();        
    }  
    
    public function testAddRoute() 
    {
        $this->router->addRoute('/robots.txt', 'site/robots');
        $this->assertEquals('site/robots', $this->router->routes['/robots.txt']);
    } 
  
}
