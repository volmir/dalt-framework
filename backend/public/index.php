<?php

session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);

 
$loader = require(__DIR__ . '/../../vendor/autoload.php');


$config = array_merge(
        require(__DIR__ . '/../config/main.php'),
        require(__DIR__ . '/../../common/config/main.php')
        );

$appication = new \Dalt\Core\Application();
$appication->run($config);
