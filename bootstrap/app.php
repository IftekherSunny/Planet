<?php

require_once __DIR__ . '/../vendor/autoload.php';

# Create The Application
$app = new Sun\Application(
    realpath(__DIR__ . '/../')
);

$app->loadAlien();

$app->bootEloquent();

$app->group(['namespace' => 'App\Controllers'], function () use ($app) {

    require_once __DIR__ . '/../app/routes.php';

});

return $app;
