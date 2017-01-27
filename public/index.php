<?php

set_time_limit(90);

ini_set('display_errors', 1);
error_reporting(E_ALL);

define('ROOT_PATH', dirname(__FILE__));
define('APPLICATION_PATH', ROOT_PATH . '/app');
define('LIBRARY_PATH', ROOT_PATH . '/lib');

set_include_path(
        APPLICATION_PATH . PATH_SEPARATOR .
        LIBRARY_PATH . PATH_SEPARATOR .
        get_include_path()
);

include_once 'lib/init.php';
