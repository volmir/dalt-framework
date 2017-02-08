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
        ],
        'production' => [
            'host' => 'localhost',
            'username' => 'root',
            'password' => '',
            'dbname' => 'test',
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
