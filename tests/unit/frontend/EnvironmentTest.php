<?php

use framework\core\Environment;
 
class EnvironmentTest extends PHPUnit_Framework_TestCase
{
    
    protected function setUp()
    {
        $_SERVER['SERVER_ADDR'] = '127.0.0.1';
    }    

    public function testDevelopmentEnvironment() 
    {        
        $this->assertEquals('development', Environment::get());
    } 

}
