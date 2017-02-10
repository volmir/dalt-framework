<?php

session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);

 
$loader = require(__DIR__ . '/../../vendor/autoload.php');
$loader->addPsr4('framework\\', __DIR__ . '/../../system/');
$loader->addPsr4('frontend\\', __DIR__ . '/../');
$loader->addPsr4('common\\', __DIR__ . '/../../common/');

$config = array_merge(
        require(__DIR__ . '/../config/main.php'),
        require(__DIR__ . '/../../common/config/main.php')
        );

$appication = new \framework\core\Application();
$appication->run($config);
