<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Services\LogService;
use Tymon\JWTAuth\Facades\JWTAuth;
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

$router->post('/api/register', 'UserController@register');
$router->post('/login', function(Request $request) {
    // Validate user input
    $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Attempt to retrieve the user
    $user = User::where('email', $request->input('email'))->first();

    // If the user was not found or the password is incorrect
    if (!$user || !app('hash')->check($request->input('password'), $user->password)) {
        return response()->json(['error' => 'Invalid credentials'], 401);
    }

    // Generate a JWT token
    $token = JWTAuth::fromUser($user);

    // Return the token
    return response()->json(compact('token'));
});



$router->get('/user', ['middleware' => 'auth', function () use ($router) {
    $user = app('auth')->user();
    return response()->json($user);
}]);


$router->put('/user', ['middleware' => 'auth', function (Request $request) use ($router) {
    $user = app('auth')->user();
    $user->update($request->all());
    return response()->json($user);
}]);



