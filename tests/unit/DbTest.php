<?php

use frm\core\DB;
use frm\core\Config;
 
class DbTest extends PHPUnit_Framework_TestCase
{
    
    protected function setUp()
    {
        $_SERVER['SERVER_ADDR'] = '127.0.0.1';
        
        $this->configPath = 'application/config/main.php';
        $this->config = require(__DIR__ . '/../../' . $this->configPath);        
        Config::getInstance($this->config);
    }      

    public function testIsRightObject() 
    {       
        $this->assertInstanceOf(PDO::class, DB::getInstance());
    }

}
