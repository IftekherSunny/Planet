<?php

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Sun\Application([
    'path' => __DIR__ . '/../'
]);

Sun\AlienLoader::load();

$app->group(['namespace' => 'App\Controllers'], function () use ($app) {

    require_once __DIR__ . '/../app/routes.php';
});

$app->run();
