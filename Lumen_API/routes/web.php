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


 // Create  new router
$router->get('/football', function () {
    return "Hello World";
});

// Basic Route
$router->post('/post', function () {
    return "This is a post method";
});


//$router->get('/user/{id}', 'ExampleController@getUser');

// Optional Route
$router->get('optional[/{param}]', function ($param = null) {
   return $param;

});


$router->get('profile/learnlumen', ['as' => 'route.profile', function() {
    return route('route.profile');
}]);


$router->group(['prefix' => 'admin'], function () use ($router) {
    $router->get('home', function () {
       return 'Home Admin';
    });
});


$router->get('admin/home', ['middleware' => 'age', function() {
        return 'Old Enough';
}]);


$router->get('/fail', function() {
    return 'Not yet mature';
});

$router->get('foo/bar', 'ExampleController@fooBar');
$router->get('bar/foo', 'ExampleController@fooBar');

$router->post('user/profile/request', 'ExampleController@userProfile');


// Authentication
$router->post('/register', 'AuthenticationController@register');
$router->post('/login', 'AuthenticationController@login');

$router->get('/user/{id}', 'UserController@show');



