<?php

namespace framework\exception;

use framework\core\Logger;
 
class CoreException extends \Exception 
{

    public function logError() 
    {      
        $logger = new Logger();
        $logger->warning($this->getMessage());
    }

}
