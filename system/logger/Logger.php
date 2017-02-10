<?php

namespace framework\logger;

use Iterator;
use Psr\Log\AbstractLogger;
use Psr\Log\LoggerInterface;
use framework\logger\Route;

/**
 * 
 * Class Logger
 */
class Logger extends AbstractLogger implements LoggerInterface 
{

    /**
     * @var Iterator|Route[]
     */
    protected $routes;

    /**
     *
     * @param Iterator $routes
     */
    public function __construct(Iterator $routes)
    {
        $this->routes = $routes;
    }

    /**
     * @inheritdoc
     */
    public function log($level, $message, array $context = []) 
    {
        foreach ($this->routes as $route) {
            if (!$route instanceof Route) {
                continue;
            }
            if (!$route->enabled) {
                continue;
            }

            $route->log($level, $message, $context);
        }
    }

}
