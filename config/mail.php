<?php

return [

    # Mail server
    'host'          => env('MAIL_HOST', 'smtp.gmail.com'),
    'port'          => env('MAIL_PORT', 465),
    'encryption'    => env('MAIL_ENCRYPTION', 'ssl'),

    # User credential
    'username'      => env('MAIL_USERNAME', 'example@gmail.com'),
    'password'      => env('MAIL_PASSWORD', 'yourpassword'),

    # Sender email address & name
    'from' => [

        'email'     => 'admin@example.com',
        'name'      => 'Administrator'

    ],

    # Reply email address & name
    'reply' => [

        'email'     => 'contact@example.com',
        'name'      => 'Information'

    ],

    # Log email
    'log'           => false

];
