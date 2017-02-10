<?php

session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);

 
$loader = require(__DIR__ . '/../../vendor/autoload.php');
$loader->addPsr4('frm\\', __DIR__ . '/../../system/');
$loader->addPsr4('app\\', __DIR__ . '/../');

$config = require(__DIR__ . '/../config/main.php');

$appication = new \frm\core\Application();
$appication->run($config);
