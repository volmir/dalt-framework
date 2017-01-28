<?php

session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);

 
$loader = require(__DIR__ . '/../vendor/autoload.php');
$loader->addPsr4('Frm\\', __DIR__ . '/../system/');
$loader->addPsr4('App\\', __DIR__ . '/../application/');

$appication = new \Frm\Core\Application();
$appication->run();

