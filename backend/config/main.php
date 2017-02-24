<?php

return [
    'name' => 'backend',
    'siteName' => 'Backend',
    'version' => '1.0.0',
    'basePath' => dirname(__DIR__),
    'frontendUrl' => 'http://work.local',
    'routes' => [
         
    ],    
    'assets' => [
        'css' => [
            '//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css',
            '/css/styles.css',
        ],
        'js' => [
            '//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js',
            '//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js',
            '/js/scripts.js',
        ],       
    ],      
];
