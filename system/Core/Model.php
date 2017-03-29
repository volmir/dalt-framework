<?php

namespace Dalt\Core;

use Dalt\Adapter\Eloquent;
use Illuminate\Database\Eloquent\Model as EloquentModel;

class Model extends EloquentModel
{

    public function __construct() 
    {
        Eloquent::getInstance();
    }
    
}
