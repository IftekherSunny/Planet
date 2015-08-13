<?php

return [

    # Mail server
    'host'          => 'smtp.gmail.com',
    'port'          => 465,
    'encryption'    => 'ssl',

    # User credential
    'username'      => 'example@gmail.com',
    'password'      => 'yourpassword',

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
