<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function register(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:authors",
            "password" => "required|confirmed",
            'phone_number' => "required",
        ]);
        
        DB::table("authors")->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone_number' => $request->phone_number,    
        ]);

        // Json response
        return response([
           "status" => 1,
           "message" => "Author Created",
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function login(Request $request)
    { 
        $login_data = $request->validate([
            'email' => "required",
            'password' => "required"
        ]);

        // validate author data
        if(!auth()->attempt($login_data))
        {
            return response()->json([
                "status" => false,
                "message" => "Invalid login data"
            ]);    
        } 

        // taken
        $token = auth()->user()->createToken("auth_token")->accessToken;
        
        // send request
        return response()->json([
            "status" => true,
            "message" => "Author Logged in successfully",
            "access_token" => $token
        ]);

       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function profile()
    {
        $user_data = Authors::first();

        return response()->json([
            "status" => true,
            "message" => "User Data",
            "data" => $user_data
        ]);
    }

    /**
     * Display the specified resource.
     */
    // public function logout(Request $request)
    // {
    //     $request->user()->token()->delete();

    //     return response()->json([
    //         "status" => true,
    //         "message" => "Logout successfully"
    //     ]); 
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Authors $authors)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Authors $authors)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Authors $authors)
    {
        //
    }
}