<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;


class RoleController extends Controller
{
    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'description' => 'required'
        ]);

        $role = new Role;
        $role->name = $request->input('name');
        $role->save();

        return response()->json(['message' => 'Role created successfully'], 201);
    }

    public function index()
    {
        $roles = Role::all();
        return response()->json($roles);
    }

    public function show($id)
    {
        $role = Role::find($id);
        return response()->json($role);
    }

    public function update(Request $request, $id)
    {
        $role = Role::find($id);
        if (!$role) {
            return response()->json(['message' => 'Role not found'], 404);
        }

        $this->validate($request, [
            'name' => 'required|unique:roles,name'.$id,
        ]);
        $role->name = $request->input('name');
        $role->save();

        return response()->json(['message' => 'Role updated successfully'], 200);
    }

    public function delete($id)
    {
        $role = Role::find($id);
        if (!$role) {
            return response()->json(['message' => 'Role not found'], 404);
        }

        $role->delete();

        return response()->json(['message' => 'Role deleted successfully'], 200);
    }

    public function assignPermissions(Request $request, $role_id)
    {
        $role = Role::find($role_id);
        if (!$role) {
            return response()->json(['message' => 'Role not found'], 404);
        }

        $permission_id = $request->input('permission_id');
        $permission = Permission::find($permission_id);
        if (!$permission) {
            return response()->json(['message' => 'Permission not found'], 404);
        }

        $role->permissions()->attach($permission_id);

        return response()->json(['message' => 'Permission assigned successfully'], 201);

    }

    public function removePermission($permission_id, $role_id)
    {
        $role = Role::find($role_id);
        if (!$role) {
            return response()->json(['message' => 'Role not found'], 404);
        }

        $permission = Permission::find($permission_id);
        if (!$permission) {
            return response()->json(['message' => 'Permission not found'], 404);
        }

        $role->permissions()->detach($permission_id);

        return response()->json(['message' => 'Permission removed successfully'], 200);
    }
}
