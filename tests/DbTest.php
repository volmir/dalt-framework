<?php

require 'autoload.php';

use Frm\Core\DB;
 
class DbTest extends PHPUnit_Framework_TestCase
{

    public function testIsRightObject() 
    {
        $_SERVER['SERVER_ADDR'] = '127.0.0.1';
        
        $this->assertInstanceOf(PDO::class, DB::getInstance());
    }

}
