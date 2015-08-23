<?php

/**
 * This route you can access before & after login
 */
$app->get('/', function () use ($app) {
    return view('index');
});


/**
 * This route you can access before login
 */
$app->group(['filter' => 'Guest'], function () use ($app) {

    $app->get('/auth/login', 'AuthController@getLogin');
    $app->get('/auth/register', 'AuthController@getRegister');
    $app->get('/auth/reset', 'AuthController@getReset');
    $app->get('/auth/email/confirm/{code}', 'AuthController@getEmailConfirm');
    $app->get('/auth/reset/confirm/{code}', 'AuthController@getResetConfirm');

    /**
     * CSRF Token Check
     */
    $app->group(['filter' => 'Csrf'], function () use ($app) {
        $app->post('/auth/login', 'AuthController@postLogin');
        $app->post('/auth/register', 'AuthController@postRegister');
        $app->post('/auth/reset', 'AuthController@postReset');
    });

});

/**
 * This route you can access after login
 */
$app->group(['filter' => 'Auth'], function () use ($app) {

    $app->get('/home', 'HomeController@getIndex');
    $app->get('/change_password', 'AuthController@getChangePassword');
    $app->post('/change_password', 'AuthController@postChangePassword');
    $app->get('/auth/logout', 'AuthController@getLogout');

});
