<?php

namespace Frm\Exception;

use Frm\Core\Logger;
 
class CoreException extends \Exception 
{

    public function logError() 
    {      
        $logger = new Logger();
        $logger->warning($this->getMessage());
    }

}
