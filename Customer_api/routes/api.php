<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CustomerAddressController;
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

$router->group(['prefix' => '/api/v1'], function () use ($router) {

    // Customer routes
    Route::get('customers', 'CustomerController@index');
    Route::post('customers', 'CustomerController@create');
    Route::get('customers/{id}', 'CustomerController@show');
    Route::put('customers/{id}', 'CustomerController@update');
    Route::delete('customers/{id}', 'CustomerController@destroy');

    // Address routes
    Route::get('addresses', 'AddressController@index');
    Route::post('addresses', 'AddressController@create');
    Route::get('addresses/{id}', 'AddressController@show');
    Route::put('addresses/{id}', 'AddressController@update');
    Route::delete('addresses/{id}', 'AddressController@destroy');

    // Customer_address routes
    Route::get('customer_addresses', 'CustomerAddressController@index');
    Route::get('customer_addresses/{id}', 'CustomerAddressController@show');
    Route::post('customer_addresses', 'CustomerAddressController@create');
    Route::delete('customer_addresses/{id}', 'CustomerAddressController@destroy');

});
