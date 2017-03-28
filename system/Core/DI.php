<?php

namespace Dalt\Core;

/**
 *  Example of usage:
 * 
 *  $this->di->set('db', function() use ($config) {
 *      return \framework\adapter\DB::getInstance(array(
 *          "host" => $config["host"],
 *          "username" => $config["username"],
 *          "password" => $config["password"],
 *          "dbname" => $config["dbname"]
 *      ));
 *  });
 *  ...    
 *  $this->di->get('db');
 * 
 */

class DI
{
    
    /**
     *
     * @var array
     */
    protected $registry = [];

    /**
     * 
     * @param string $name
     * @return mixes
     */
    public function get($name) 
    {
        return $this->registry[$name]($this);
    }

    /**
     * 
     * @param string $name
     * @param mixed $value
     */
    public function set($name, $value) 
    {
        $this->registry[$name] = $value;
    } 
    
}
