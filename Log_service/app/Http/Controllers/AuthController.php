<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;


class AuthController extends Controller
{

    public function login(Request $request)
    {
        $input =  $request->all();

        $validator = Validator::make($input, [
            "email" => 'required|email',
            "password" => 'required',
        ]);

        if ($validator-> fails())
        {
            return response()->json([
                'status' => 500,
                'message' => 'Bad request',
                'errors' => $validator->errors(),
            ], 401);

        }

        $check_users = User::where('email', '=', $input['email'])->first();

        if ($check_users) {
            $password = $input['password'];
            if(Hash::check($password, $check_users->password))
            {
                $response['token'] = $check_users->createToken('users')->accessToken;
                $response['status'] = 200;
                $response['message'] = "Login successfully ";

                Log::channel('login')->info('User ' . $check_users . ' logged in');
                return response()->json($response, 200);
            }
            else {
                $response['status'] = 400;
                $response['message'] = "Password not match";

                return response()->json($response, 401);
            }
        } else {
            $response['status'] = 401;
            $response['message'] = "Email not match";

            return response()->json($response, 401);
        }
    }

    public function register(Request $request) {
        $input = $request->all();
        $validator = Validator::make($input, [
            "email" => 'required|email',
            "password" => 'required',
            "confirm_password" => 'required|same:password',
        ]);

        if ($validator-> fails())
        {
            return response()->json([
                'status' => 500,
                'message' => 'Bad request',
                'errors' => $validator->errors(),
            ], 401);

        }

        unset($input['confirm_password']);
        $input['password'] = Hash::make($input['password']);
        $query = User::create($input);

        $response['token'] = $query->createToken('users')->accessToken;
        $response['email'] =$query->email;

        return response()->json($response, 200);
    }
}
