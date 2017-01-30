<?php

require 'autoload.php';

use Frm\Core\Environment;
 
class EnvironmentTest extends PHPUnit_Framework_TestCase
{

    public function testDevelopmentEnvironment() 
    {
        $_SERVER['SERVER_ADDR'] = '127.0.0.1';
        $this->assertEquals('development', Environment::get());
    } 

}
