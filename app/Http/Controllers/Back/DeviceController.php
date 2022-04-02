<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Device;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function table()
    {
        $devices = Device::latest()->paginate(6);
        return view('devices.table', compact('devices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::get();
        $users = User::get();
        return view('devices.create', compact('areas', 'users'));
    }

    public function store(Request $request)
    {
        request()->validate([
            'user_placed' => 'required',
            'area' => 'required',
            'ssid' => 'required',
            'brand' => 'required',
            'type' => 'required',
            'ip' => 'required|unique:devices,ip',
            'username' => 'required',
            'password' => 'required',
            'description' => 'required'
        ]);

        Device::create([
            'user_placed' => request('user_placed'),
            'area' => request('area'),
            'ssid' => request('ssid'),
            'brand' => request('brand'),
            'type' => request('type'),
            'ip' => request('ip'),
            'username' => request('username'),
            'password' => request('password'),
            'description' => request('description')
        ]);
        Alert::success('Success', 'New device has been created.');
        return redirect(route('devices.table'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function show(Device $device)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function edit(Device $device)
    {
        $areas = Area::get();
        $users = User::get();
        return view('devices.edit', compact('users', 'areas', 'device'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Device $device)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function destroy(Device $device)
    {
        //
    }
}
