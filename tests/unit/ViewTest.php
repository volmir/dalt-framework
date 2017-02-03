<?php

use Frm\Core\View;
use Frm\Exception\CoreException;
 
class ViewTest extends PHPUnit_Framework_TestCase
{
    
    public function testSetGetClear() 
    {
        $view = new View(new stdClass());
        $view->set('title', 'Simlpe PHP Framework');
        $this->assertEquals('Simlpe PHP Framework', $view->getVar('title'));
        $view->clear('title');
        $this->assertNull($view->vars['title']);
    } 

}
