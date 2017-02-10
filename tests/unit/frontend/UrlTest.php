<?php

use framework\core\Url;
 
class UrlTest extends PHPUnit_Framework_TestCase
{

    public function testCropUrl() 
    {
        $url = '/blog/post/8372/?mode=web';
        $this->assertEquals('/blog/post/8372/', Url::cropUrl($url));
    }    
    

    public function testSplitUrl() 
    {
        $url = '/article/12539.htm';
        $splitUrl = Url::SplitUrl($url);        
        $this->assertEquals('article', $splitUrl[0]);
        $this->assertEquals('12539.htm', $splitUrl[1]);
        $this->assertEquals(2, count($splitUrl));
    }    
}
