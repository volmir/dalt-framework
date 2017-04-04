<?php

namespace Backend\System;

use Dalt\Core\Asset as CoreAsset;

class Asset extends CoreAsset 
{
    
    /**
     *
     * @var array
     */
    public $css = [
        '//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css',
        '/css/styles.css',
    ];
    /**
     *
     * @var array 
     */
    public $js = [
        '//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js',
        '//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js',
        '/js/scripts.js',
    ];

}
