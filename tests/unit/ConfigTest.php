<?php

use frm\core\Registry;
 
class ConfigTest extends PHPUnit_Framework_TestCase
{
    
    protected function setUp()
    {
        $this->configPath = 'application/config/main.php';
        $config = require(__DIR__ . '/../../' . $this->configPath);
        $this->config = new Registry($config);        
    }       

    public function testFilesExists()
    {
        $this->assertFileExists($this->configPath);
    }
    
    public function testIsRightType() 
    {
        $this->assertInternalType('array', $this->config->db);
    }

}
