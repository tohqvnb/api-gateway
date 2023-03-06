<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->group(['prefix' => 'api'], function () use ($router) {
    // Categories routes
    $router->get('categories', ['uses' => 'CategoryController@index']);
    $router->get('categories/{id}', ['uses' => 'CategoryController@show']);
    $router->post('categories', ['uses' => 'CategoryController@create']);
    $router->put('categories/{id}', ['uses' => 'CategoryController@update']);
    $router->delete('categories/{id}', ['uses' => 'CategoryController@delete']);

    // Products routes
    $router->get('products', ['uses' => 'ProductController@index']);
    $router->get('products/{id}', ['uses' => 'ProductController@show']);
    $router->post('products', ['uses' => 'ProductController@create']);
    $router->put('products/{id}', ['uses' => 'ProductController@update']);
    $router->delete('products/{id}', ['uses' => 'ProductController@destroy']);
});
