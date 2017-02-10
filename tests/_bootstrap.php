<?php

$loader = require(__DIR__ . '/../vendor/autoload.php');
$loader->addPsr4('framework\\', __DIR__ . '/../system/');
$loader->addPsr4('frontend\\', __DIR__ . '/../frontend/');
$loader->addPsr4('common\\', __DIR__ . '/../../common/');
