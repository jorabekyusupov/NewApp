<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $columns = [
            'id',
            'name',
            'guard_name',
//            'created_at',
//            'updated_at',
        'Actions'
        ];
        $roles = Role::query()->paginate(10);
        return view('roles.index', compact('roles', 'columns'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
            'guard_name' => 'required',
            'permissions' => 'required|array|min:1',
            'permissions.*' => 'required|exists:permissions,id',
        ]);
        $role = Role::create($request->all());
        $role->givePermissionTo($request->permissions);

        return redirect()->route('role.index')->with('success', 'Role created successfully.');
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
