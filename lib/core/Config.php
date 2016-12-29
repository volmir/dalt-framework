<?php

namespace Core;

class Config {

    /**
     * 
     * @var Config
     */
    protected static $instance = null;

    const config_file = 'config/config.ini';

    private function __construct() {
        ;
    }

    /**
     * Returns instance of config
     * @return confug
     */
    public static function getInstance() {
        if (is_null(self::$instance)) {
            self::$instance = parse_ini_file(self::config_file);
        }

        return self::$instance;
    }

}
