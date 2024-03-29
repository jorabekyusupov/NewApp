<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        $columns = [
            'id',
            'name',
            'guard_name',
        ];
        $permissions = \Spatie\Permission\Models\Permission::query()->paginate(10);
        return view('permission.index', compact('permissions', 'columns'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
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
