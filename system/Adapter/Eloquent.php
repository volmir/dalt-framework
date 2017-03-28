<?php

namespace Dalt\Adapter;

use Illuminate\Database\Capsule\Manager as Capsule;

class Eloquent {

    protected static $instance = null;

    public static function getInstance() 
    {
        if (self::$instance === null) {
            $capsule = new Capsule;
            $capsule->addConnection([
                'driver' => 'mysql',
                'host' => DB_HOST,
                'database' => DB_DBNAME,
                'username' => DB_USERNAME,
                'password' => DB_PASSWORD,
                'charset' => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix' => '',
            ]);
            $capsule->setAsGlobal();
            $capsule->bootEloquent();
            
            self::$instance = $capsule;
        }
        return self::$instance;
    }
    
    private function __construct() 
    {

    }

    private function __clone() 
    {
        
    }
    
    private function __wakeup() 
    {
        
    }   
}
