<?php

use frm\core\Router;
 
class RouterTest extends PHPUnit_Framework_TestCase
{

    public function testAddRoute() 
    {
        Router::addRoute('/robots.txt', 'site/robots');
        $this->assertEquals('site/robots', Router::$routes['/robots.txt']);
    } 
  
}
