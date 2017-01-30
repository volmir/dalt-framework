<?php

$loader = require(__DIR__ . '/../../vendor/autoload.php');
$loader->addPsr4('Frm\\', __DIR__ . '/../../system/');
$loader->addPsr4('App\\', __DIR__ . '/../../application/');
