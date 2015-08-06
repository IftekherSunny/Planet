<?php

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Sun\Application([
            'path' => realpath(__DIR__ . '/../')
        ]);

$app->loadAlien();

$app->bootDatabase();

$app->group(['namespace' => 'App\Controllers'], function () use ($app) {

    require_once __DIR__ . '/../app/routes.php';
});

return $app;
