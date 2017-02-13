<?php

return [
    'name' => 'frontend',    
    'siteName' => 'Simple Framework',
    'version' => 0.9,
    'basePath' => dirname(__DIR__),
    'backendUrl' => 'http://backend.work.local',
    'routes' => [
        '/robots.txt' => 'site/robots',        
        '/sitemap.xml' => 'site/sitemap',        
        '/blog' => 'blog/index',   
        '/blog/:num.html' => 'blog/viewBlog/$1',           
        '/blog/:any/:num.html' => 'blog/viewPost/$1/$2',           
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
