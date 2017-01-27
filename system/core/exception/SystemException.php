<?php

namespace Core\Exception;
 
class SystemException extends \Exception 
{

    public function logError() 
    {
        echo $this->getMessage();
    }

}
