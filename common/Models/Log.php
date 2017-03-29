<?php

namespace Common\Models;

use Dalt\Core\Model;

class Log extends Model 
{

    protected $table = 'logs';
    
    protected $primaryKey = 'log_id';
    
    public $timestamps = false;
    
}
