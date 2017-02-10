<?php

use framework\core\Registry;
 
class ConfigTest extends PHPUnit_Framework_TestCase
{
    
    protected function setUp()
    {
        $this->configPathFrontend = 'frontend/config/main.php';
        $this->configPathCommon = 'common/config/main.php';
        $configFrontend = require($this->configPathFrontend);
        $configCommon = require($this->configPathCommon);        
        $config = array_merge($configFrontend, $configCommon );
        $this->config = new Registry($config);
    }       

    public function testFilesExists()
    {
        $this->assertFileExists($this->configPathFrontend);
        $this->assertFileExists($this->configPathCommon);
    }
    
    public function testIsRightType() 
    {
        $this->assertInternalType('array', $this->config->db);
    }

}
