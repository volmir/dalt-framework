<?php

namespace frm\exception;

use frm\core\Logger;
 
class CoreException extends \Exception 
{

    public function logError() 
    {      
        $logger = new Logger();
        $logger->warning($this->getMessage());
    }

}
