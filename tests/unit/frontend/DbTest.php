<?php

use framework\core\DB;
use framework\core\Registry;
use framework\core\Environment;
 
class DbTest extends PHPUnit_Framework_TestCase
{
    
    protected function setUp()
    {
        $_SERVER['SERVER_ADDR'] = '127.0.0.1';
        
        $this->configPathFrontend = 'frontend/config/main.php';
        $this->configPathCommon = 'common/config/main.php';
        $configFrontend = require($this->configPathFrontend);
        $configCommon = require($this->configPathCommon);        
        $config = array_merge($configFrontend, $configCommon );
        $this->config = new Registry($config);
        
        define('DB', $this->config->db[Environment::get()]);
    }      

    public function testIsRightObject() 
    {       
        $this->assertInstanceOf(PDO::class, DB::getInstance());
    }

}
