<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\LogService;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;


class UserController extends Controller
{
    public function register(Request $request, LogService $logService)
    {
        // Validate user input
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        // Create a new user record
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = app('hash')->make($request->input('password'));
        $user->save();

        // Log the user registration event
        $logService->logUserRegistration($user);

//        $token = JWTAuth::fromUser($user);


        // Return a response indicating success
        return response()->json([
            'message' => 'User registered successfully',
//            'token' => $token,
        ], 201);
    }



}
