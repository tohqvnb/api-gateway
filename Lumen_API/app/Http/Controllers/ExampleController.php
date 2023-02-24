<?php

namespace App\Http\Controllers;
use \Illuminate\Http\Request;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function getUser($id)
    {
        return 'User id :' .$id;
    }

    public function fooBar(Request $request)
    {
        if($request->is('foo/bar')) {
            return 'Success';
        } else {
            return 'Fail';
        }
//        return $request->path();

    }

    public function userProfile(Request $request)
    {
        $user['name'] = $request->name;
        $user['username'] = $request->username;
        $user['email'] = $request->email;
        $user['password'] = $request->password;

        return $user;
    }
}
