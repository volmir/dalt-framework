<?php

namespace Dalt\Exception;

use Dalt\Core\Logger;
 
class CoreException extends \Exception 
{

    public function logError() 
    {      
        $logger = new Logger();
        $logger->warning($this->getMessage());
    }

}
