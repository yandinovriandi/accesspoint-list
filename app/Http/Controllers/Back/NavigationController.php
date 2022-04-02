<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Navigation;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;

class NavigationController extends Controller
{
    public function table()
    {
        $permissions = Permission::get();
        $navigations = Navigation::where('url', null)->get();
        $navs = Navigation::orWhereNotNull('url')->get();
        return view('navigation.table', compact('permissions', 'navigations', 'navs'));
    }


    public function store()
    {
        request()->validate([
            'name' => 'required',
            'permission_name' => 'required'
        ]);
        Navigation::create([
            'name' => request('name'),
            'url' => request('url') ?? null,
            'parent_id' => request('parent_id') ?? null,
            'permission_name' => request('permission_name')
        ]);
        Alert::success('Success', 'New menu has been created.');
        return back();
    }


    public function edit(Navigation $navigation)
    {
        //
    }

    public function update(Request $request, Navigation $navigation)
    {
        //
    }

    public function destroy(Navigation $navigation)
    {
        //
    }
}
