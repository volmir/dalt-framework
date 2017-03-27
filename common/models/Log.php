<?php

namespace common\models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model 
{

    protected $table = 'log';
    
    protected $primaryKey = 'log_id';
    
    public $timestamps = false;

}
