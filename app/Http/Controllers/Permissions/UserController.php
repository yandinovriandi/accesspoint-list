<?php

namespace App\Http\Controllers\Permissions;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function table()
    {
        $users = User::has('roles')->paginate(6);
        $users1 = User::get();
        $roles = Role::get();
        return view('permission.assign.user.table', [
            'users' => $users,
            'roles' => $roles,
            'users1' => $users1
        ]);
    }

    public function store()
    {
        $user = User::where('email', request('email'))->first();
        $user->assignRole(request('roles'));
        Alert::success('Success', "User has been assign new roles");
        return redirect(route('assign.user.table'));
    }

    public function edit(User $user)
    {
        return view('permission.assign.user.edit', [
            'user' => $user,
            'users' => User::get(),
            'roles' => Role::get()
        ]);
    }

    public function update(User $user)
    {
        $user->syncRoles(request('roles'));
        Alert::success('Success', "User {$user->name} has been assign new roles");
        return redirect(route('assign.user.table'));
    }
}
