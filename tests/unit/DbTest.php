<?php

use frm\core\DB;
use frm\core\Registry;
use frm\core\Environment;
 
class DbTest extends PHPUnit_Framework_TestCase
{
    
    protected function setUp()
    {
        $_SERVER['SERVER_ADDR'] = '127.0.0.1';
        
        $this->configPath = 'application/config/main.php';
        $config = require(__DIR__ . '/../../' . $this->configPath);
        $this->config = new Registry($config);         
        define('DB', $this->config->db[Environment::get()]);
    }      

    public function testIsRightObject() 
    {       
        $this->assertInstanceOf(PDO::class, DB::getInstance());
    }

}
