<?php

use frm\core\Config;
 
class ConfigTest extends PHPUnit_Framework_TestCase
{
    
    protected function setUp()
    {
        $this->configPath = 'application/config/main.php';
        $this->config = require(__DIR__ . '/../../' . $this->configPath);
    }       

    public function testFilesExists()
    {
        $this->assertFileExists($this->configPath);
    }
    
    public function testIsRightType() 
    {
        $this->assertInternalType('array', Config::getInstance($this->config));
    }

}
