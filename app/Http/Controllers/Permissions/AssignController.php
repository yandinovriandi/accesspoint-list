<?php

namespace App\Http\Controllers\Permissions;

use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\{Permission, Role};

class AssignController extends Controller
{
    public function table()
    {
        return view('permission.assign.table', [
            'roles' => Role::first()->paginate(9),
            'permissions' => Permission::get()
        ]);
    }

    public function store()
    {
        request()->validate([
            'role' => 'required',
            'permissions' => 'array|required'
        ]);
        $role = Role::find(request('role'));
        $role->givePermissionTo(request('permissions'));
        Alert::success('Success', "Permissions has been assign to {$role->name}");
        return back();
    }

    public function edit(Role $role)
    {
        return view('permission.assign.edit', [
            'role' => $role,
            'roles' => Role::get(),
            'permissions' => Permission::get()

        ]);
    }

    public function update(Role $role)
    {
        request()->validate([
            'role' => 'required',
            'permissions' => 'array|required'
        ]);
        $role->syncPermissions(request('permissions'));
        Alert::success('Success', "Permissions has been updated");
        return redirect(route('assign.table'));
    }
}
