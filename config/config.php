<?php

return [
    
    'doctrine' => [
        'driver' => 'pdo_sqlite',
        'path' => PATH_RESOURCES.'Chinook.db', 
    ],
    'path_entity'=> [PATH_ROOT.DS.'src'.DS.'Entity'],
    'dev_mode'=> true,
    'proxy'=> null,
    'cache'=> null,
    'use_simple_annotation'=> false
];
