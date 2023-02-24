<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\BookController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// API ROUTE FOR BOOKS 
Route::post('register', [AuthorsController::class, 'register']); 
Route::post ('login', [AuthorsController::class, 'login']); 

Route::group(["middlware"=>['auth:api']], function(){
    Route::get('profile', [AuthorsController::class, 'profile']); 

});