<?php

return [
    'sitename' => 'Simple Framework',
    'version' => 0.9,
    'basePath' => dirname(__DIR__),
    'db' => [
        'development' => [
            'host' => 'localhost',
            'username' => 'root',
            'password' => 'asjD843Kmlf',
            'dbname' => 'test',
            'charset' => 'utf8',
        ],
        'production' => [
            'host' => 'localhost',
            'username' => 'root',
            'password' => '',
            'dbname' => '',
            'charset' => 'utf8',
        ],        
    ],
    'routes' => [
        '/robots.txt' => 'site/robots',        
        '/sitemap.xml' => 'site/sitemap',        
        '/blog' => 'blog/index',   
        '/blog/:num.html' => 'blog/viewBlog/$1',           
        '/blog/:any/:num.html' => 'blog/viewPost/$1/$2',           
    ],    
];
