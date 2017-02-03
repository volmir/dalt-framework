<?php

use Frm\Core\Registry;
 
class RegistryTest extends PHPUnit_Framework_TestCase
{

    public function testSetGetVariable() 
    {
        $registry = new Registry();
        $registry->array = [];
        $this->assertInternalType('array', $registry->array);
    } 

}
