<?php

namespace Dalt\Core;

class Registry 
{

    /**
     *
     * @var array
     */
    protected $registry = [];

    /**
     * 
     * @param array $registry
     */
    public function __construct($registry = []) 
    {
        $this->registry = $registry;
    }

    /**
     * 
     * @param string $name
     * @return mixes
     */
    public function __get($name) 
    {
        return isset($this->registry[$name]) ? $this->registry[$name] : null;
    }

    /**
     * 
     * @param string $name
     * @param mixed $value
     */
    public function __set($name, $value) 
    {
        $this->registry[$name] = $value;
    }

}
