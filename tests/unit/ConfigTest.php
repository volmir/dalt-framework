<?php

require 'autoload.php';

use Frm\Core\Config;
 
class ConfigTest extends PHPUnit_Framework_TestCase
{

    public function testFilesExists()
    {
        $this->assertFileExists('../../application/configs/db.ini');
        $this->assertFileExists('../../application/configs/routes.ini');
        $this->assertFileExists('../../application/configs/main.ini');
    }
    
    public function testIsRightType() 
    {
        $this->assertInternalType('array', Config::getInstance());
    }

}
