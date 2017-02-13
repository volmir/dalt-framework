<?php

return [
    'name' => 'backend',
    'siteName' => 'Backend',
    'version' => 0.9,
    'basePath' => dirname(__DIR__),
    'frontendUrl' => 'http://work.local',
    'routes' => [
         
    ],    
    'assets' => [
        'css' => [
            '//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css',
            '/css/styles.css',
        ],
        'js' => [
            '//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js',
            '//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js',
            '/js/scripts.js',
        ],        
    ],      
];
