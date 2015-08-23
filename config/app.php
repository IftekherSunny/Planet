<?php

return [

    # Debug mode set to false in production
    'debug'     => env('DEBUG_MODE', false),

    # Your application key
    'key'       => env('APP_KEY', 'App Key'),

    # Your application name
    'name'      =>  env('APP_NAME', 'App'),

    # Your application url
    'url'       =>  env('APP_URL', 'http://localhost:8000'),

    # Timezone
    'timezone'  => 'UTC'

];