<?php

namespace App\Http\Controllers\Permissions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function table()
    {
        $roles = Role::first()->paginate(6);
        return view('permission.roles.table', compact('roles'));
    }

    public function store()
    {
        request()->validate([
            'name' => 'required'
        ]);
        Role::create([
            'name' => request('name'),
            'guard_name' => request('guard_name') ?? 'web'
        ]);
        return back();
    }

    public function update(Role $role)
    {
        request()->validate([
            'name' => 'required'
        ]);
        $role->update([
            'name' => request('name'),
            'guard_name' => request('guard_name') ?? 'web'
        ]);
        return back();
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return back();
    }
}
