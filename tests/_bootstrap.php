<?php

$loader = require(__DIR__ . '/../vendor/autoload.php');
$loader->addPsr4('frm\\', __DIR__ . '/../system/');
$loader->addPsr4('app\\', __DIR__ . '/../application/');
