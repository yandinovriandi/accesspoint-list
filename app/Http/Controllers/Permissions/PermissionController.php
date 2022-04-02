<?php

namespace App\Http\Controllers\Permissions;

use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function table()
    {
        $permissions = Permission::first()->paginate(6);
        return view('permission.permissions.table', compact('permissions'));
    }

    public function store()
    {
        request()->validate([
            'name' => 'required'
        ]);
        $permission = Permission::create([
            'name' => request('name'),
            'guard_name' => request('guard_name') ?? 'web'
        ]);
        Alert::success('Success', "Permissions {$permission->name} has been created");
        return back();
    }

    public function update(Permission $permission)
    {
        request()->validate([
            'name' => 'required'
        ]);
        $permission->update([
            'name' => request('name'),
            'guard_name' => request('guard_name') ?? 'web'
        ]);
        Alert::success('Success', "Permissions {$permission->name} has been updated");
        return back();
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        Alert::success('Success', "Permissions {$permission->name} has been deleted");
        return back();
    }
}
