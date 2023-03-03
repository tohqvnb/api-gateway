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
    // User routes
    $router->post('/users', 'UserController@create');
    $router->get('/users', 'UserController@index');
    $router->get('/users/{id}', 'UserController@show');
    $router->put('/users/{id}', 'UserController@update');
    $router->delete('/users/{id}', 'UserController@delete');
    $router->post('/users/{user_id}/assign-role', 'UserController@assignRole');
    $router->delete('/users/{user_id}/remove-role/{role_id}', 'UserController@removeRole');

    // Role routes
    $router->post('/roles', 'RoleController@create');
    $router->get('/roles', 'RoleController@index');
    $router->get('/roles/{id}', 'RoleController@show');
    $router->put('/roles/{id}', 'RoleController@update');
    $router->delete('/roles/{id}', 'RoleController@delete');;
});
