<?php

namespace Dalt\Core;

class EventManager 
{

    /**
     *
     * @var array
     */
    public $listeners = [];

    /**
     * 
     * @param string $eventName
     * @param mixed $listener
     */
    public function register($eventName, $listener) 
    {
        $this->listeners[$eventName][] = $listener;
    }

    /**
     * 
     * @param string $eventName
     * @param array $data
     */
    public function trigger($eventName, $data = []) 
    {
        if (!empty($this->listeners[$eventName])) {
            foreach ($this->listeners[$eventName] as $listener) {
                call_user_func([$listener, $eventName], $data);
            }
        }
    }

}
