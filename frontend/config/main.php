<?php

return [
    'name' => 'frontend',    
    'siteName' => 'Dalt Framework',
    'version' => '1.0.0',
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
