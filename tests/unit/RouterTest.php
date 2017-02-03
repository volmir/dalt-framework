<?php

use Frm\Core\Router;
 
class RouterTest extends PHPUnit_Framework_TestCase
{

    public function testAddRoute() 
    {
        Router::addRoute('/robots.txt', 'site/robots');
        $this->assertEquals('site/robots', Router::$routes['/robots.txt']);
    } 

    public function testCropUrl() 
    {
        $url = '/blog/post/8372/?mode=web';
        $this->assertEquals('/blog/post/8372/', Router::cropUrl($url));
    }    
    

    public function testSplitUrl() 
    {
        $url = '/article/12539.htm';
        $splitUrl = Router::SplitUrl($url);        
        $this->assertEquals('article', $splitUrl[0]);
        $this->assertEquals('12539.htm', $splitUrl[1]);
        $this->assertEquals(2, count($splitUrl));
    }    
}
