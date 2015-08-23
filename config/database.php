<?php

return [

    # Database driver [ mysql, sqlite ]
    'driver' => env('DATABASE_DRIVER', 'sqlite'),

    # Database connection
    'connection' => [
        'mysql' => [
            'host'          => env('DATABASE_HOST', 'localhost'),
            'database'      => env('DATABASE_NAME', 'planet'),
            'username'      => env('DATABASE_USERNAME', 'root'),
            'password'      => env('DATABASE_PASSWORD', ''),
            'charset'       => 'utf8',
            'collation'     => 'utf8_unicode_ci',
            'prefix'        => ''

        ],

        'sqlite' => [
            'database'      => env('DATABASE_NAME', storage_path() .'/database.sqlite'),
            'charset'       => 'utf8',
            'collation'     => 'utf8_unicode_ci',
            'prefix'        => ''

        ]

    ]
];
