<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function assignCreate()
    {
        $users = User::all();
        $roles = \Spatie\Permission\Models\Role::all();
        return view('users.assign', compact('users', 'roles'));
    }

    public function assignRole()
    {
        \request()->validate([
            'user_id' => 'required|exists:users,id',
            'role_id' => 'required|exists:roles,id',
        ]);
        $data = \request()->all();
        $user = User::query()->find($data['user_id']);
        $user->assignRole((int) $data['role_id']);
        return redirect()->route('role.index')->with('success', 'Role assigned successfully.');


    }

}
