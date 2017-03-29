<?php

namespace Dalt\Core;

use SplObjectStorage;
use Dalt\Adapter\DB;
use Dalt\Logger\Logger as SystemLogger;
use Dalt\Logger\routes\FileRoute;
use Dalt\Logger\routes\DatabaseRoute;
use Dalt\Logger\routes\SyslogRoute;

/**
 * 
 * $logger = new Logger();
 * 
 * $logger->emergency("Emergency message"); 
 * $logger->alert("Alert message");
 * $logger->critical("Critical message");
 * $logger->error("Error message");
 * $logger->warning("Warning message");        
 * $logger->notice("Notice message");
 * $logger->info("Info message");
 * $logger->debug("Debug message");
 * 
 */
class Logger extends SystemLogger
{

    public function __construct() 
    {           
        $this->routes = new SplObjectStorage();

        $this->routes->attach(new FileRoute([
            'enabled' => true,
            'filePath' => __DIR__ . '/../../data/logs/',
        ]));

        $this->routes->attach(new DatabaseRoute([
            'enabled' => false,
            'db' => DB::getInstance(),
            'table' => 'logs',
        ]));

        $this->routes->attach(new SyslogRoute([
            'enabled' => false,
        ]));
    }

}
