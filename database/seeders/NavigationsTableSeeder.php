<?php

namespace Database\Seeders;

use App\Models\Navigation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NavigationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            'name' => 'Navigations Sidebar',
            'permission_name' => 'create navigations',
        ],
        [
            'name' => 'Role & Permissions',
            'permission_name' => 'create permissions',
        ],
        [
            'name' => 'Devices',
            'permission_name' => 'create devices',
        ],
        [
            'parent_id' => 1,
            'name' => 'Table',
            'permission_name' => 'create navigations',
            'url' => 'settings/navigations-sidebar'
        ],
        [
            'parent_id' => 2,
            'name' => 'Roles',
            'permission_name' => 'create permissions',
            'url' => 'settings/role-and-permission/roles'
        ],
        [
            'parent_id' => 2,
            'name' => 'Permissions',
            'permission_name' => 'create permissions',
            'url' => 'settings/role-and-permission/permissions'
        ],
        [
            'parent_id' => 2,
            'name' => 'Assign Permissions',
            'permission_name' => 'create permissions',
            'url' => 'settings/role-and-permission/assign'
        ],
        [
            'parent_id' => 2,
            'name' => 'Assign Permissions to User',
            'permission_name' => 'create permissions',
            'url' => 'settings/role-and-permission/assign/user'
        ],
        [
            'parent_id' => 3,
            'name' => 'Table',
            'permission_name' => 'create devices',
            'url' => 'settings/devices'
        ])->each(fn ($q) => Navigation::create($q));
    }
}
