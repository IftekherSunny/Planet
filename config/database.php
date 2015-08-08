<?php

return [
    'driver' => 'sqlite',

    'connection' => [
        'mysql' => [
            'host' => 'localhost',
            'database' => 'planet',
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => ''

        ],

        'sqlite' => [
            'database' => storage_path() .'/database.sqlite',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => ''

        ]

    ]
];
