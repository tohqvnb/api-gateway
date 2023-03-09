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

    // Brand routes
    $router->get('brands', 'BrandController@index');
    $router->get('brands/{id}', 'BrandController@show');
    $router->post('brands', 'BrandController@store');
    $router->put('brands/{id}', 'BrandController@update');
    $router->delete('brands/{id}', 'BrandController@destroy');

    // Supplier Routes
    $router->get('suppliers', 'SupplierController@index');
    $router->get('suppliers/{id}', 'SupplierController@show');
    $router->post('suppliers', 'SupplierController@store');
    $router->put('suppliers/{id}', 'SupplierController@update');
    $router->delete('suppliers/{id}', 'SupplierController@destroy');

    // ProductPrice routes
    $router->get('product_price/{id}', 'ProductPriceController@get');
    $router->post('product_price', 'ProductPriceController@create');
    $router->put('product_price/{id}', 'ProductPriceController@update');
    $router->delete('product_price/{id}', 'ProductPriceController@delete');

    // ProductThreshold routes
    $router->get('product_threshold', 'ProductThresholdController@index');
    $router->get('product_threshold/{id}', 'ProductThresholdController@show');
    $router->post('product_threshold', 'ProductThresholdController@create');
    $router->put('product_threshold/{id}', 'ProductThresholdController@update');
    $router->delete('product_threshold/{id}', 'ProductThresholdController@delete');

    // ProductStock routes
    $router->get('product_stock', 'ProductStockController@index');
    $router->get('product_stock/{id}', 'ProductStockController@show');
    $router->post('product_stock', 'ProductStockController@create');
    $router->put('product_stock/{id}', 'ProductStockController@update');
    $router->delete('product_stock/{id}', 'ProductStockController@delete');

    // Product Category route
    $router->get('product_category', 'ProductStockController@index');
    $router->post('product_category', 'ProductCategoryController@store');
});
