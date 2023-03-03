<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;

class UserController extends Controller
{

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
        ]);

        $user =  new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = app('hash')->make($request->input('password'));
        $user->save();

        return response()->json(['message' => "User created successfully"], 201 );
    }

    public function index()
    {
        $user = User::all();
        return response()->json($user);
    }

    public function show($id = null)
    {
        $user = User::find($id);
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique: users,email',
        ]);

        if (!$user) {
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }


        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        return response()->json(['message' => 'User updated successfully'], 200);

    }

    public function delete($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->delete();

        return response()->json(['message' =>' User deleted successfully'], 200);
    }

    public function assignRole(Request $request, $user_id,)
    {
        $user = User::find($user_id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $role_id = $request->input('role_id');
        $role = Role::find($role_id);
        if (!$role) {
            return response()->json(['message' => 'Role not found'], 404);
        }

        $user->roles()->attach($role_id);

        return response()->json(['message' => 'Role assigned successfully'], 201);
    }

    public function removeRole($role_id, $user_id)
    {
        $user = User::find($user_id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $role = Role::find($role_id);
        if (!$role) {
            return response()->json(['message' => 'Role not found'], 404);
        }

        $user->roles()->detach($role_id);

        return response()->json(['message' => 'Role moved successfully'], 200);
    }

}
