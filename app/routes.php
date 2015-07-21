<?php

/**
 * This route you can access before & after login
 */
$app->get('/', function () {
    return View::render('index');
});


/**
 * This route you can access before login
 */
$app->group(['filter' => 'Guest'], function () use($app) {

    $app->get('/auth/login', 'AuthController@getLogin');
    $app->get('/auth/register', 'AuthController@getRegister');
    $app->get('/auth/reset', 'AuthController@getReset');
    $app->get('/auth/email/confirm/{code}', 'AuthController@getEamilConfrim');
    $app->get('/auth/reset/confirm/{code}', 'AuthController@getResetConfirm');

    /**
     * CSRF Token Check
     */
    $app->group(['filter' => 'Csrf'], function () use($app) {
        $app->post('/auth/login', 'AuthController@postLogin');
        $app->post('/auth/register', 'AuthController@postRegister');
        $app->post('/auth/reset', 'AuthController@postReset');
    });
});

/**
 * This route you can access after login
 */
$app->group(['filter' => 'Auth'], function() use($app) {

    $app->get('/home', function () use($app) {
        return View::render('home');
    });

    $app->get('/auth/logout', 'AuthController@getLogout');
});