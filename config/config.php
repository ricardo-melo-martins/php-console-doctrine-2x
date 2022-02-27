<?php

return [
    'doctrine' => [
        'dbname' => 'sakila',
        'user' => 'sakila',
        'password' => 'sakila',
        'host' => 'localhost',
        'driver' => 'pdo_mysql',    
    ],
    'path_entity'=> [PATH_ROOT.DS.'src'.DS.'Entity'],
    'dev_mode'=> true,
    'proxy'=> null,
    'cache'=> null,
    'use_simple_annotation'=> false
];
