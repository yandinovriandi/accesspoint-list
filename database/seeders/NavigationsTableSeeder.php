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
        $nav1 = new Navigation;
        $nav1->create([
            'name' => 'Navigations Sidebar',
            'permission_name' => 'create navigations',
        ]);
        $nav2 = new Navigation;
        $nav2->create([
            'name' => 'Role & Permissions',
            'permission_name' => 'create permissions',
        ]);
        $nav3 = new Navigation;
        $nav3->create([
            'name' => 'Devices',
            'permission_name' => 'create devices',
        ]);
        $navigation = new Navigation;
        $navigation->create([
            'parent_id' => 1,
            'name' => 'Table',
            'permission_name' => 'create navigations',
            'url' => 'settings/navigations-sidebar'
        ]);
        $navigation2 = new Navigation;
        $navigation2->create([
            'parent_id' => 2,
            'name' => 'Roles',
            'permission_name' => 'create permissions',
            'url' => 'settings/role-and-permission/roles'
        ]);
        $navigation3 = new Navigation;
        $navigation3->create([
            'parent_id' => 2,
            'name' => 'Permissions',
            'permission_name' => 'create permissions',
            'url' => 'settings/role-and-permission/permissions'
        ]);
        $navigation4 = new Navigation;
        $navigation4->create([
            'parent_id' => 2,
            'name' => 'Assign Permissions',
            'permission_name' => 'create permissions',
            'url' => 'settings/role-and-permission/assign'
        ]);
        $navigation5 = new Navigation;
        $navigation5->create([
            'parent_id' => 2,
            'name' => 'Assign Permissions to User',
            'permission_name' => 'create permissions',
            'url' => 'settings/role-and-permission/assign/user'
        ]);
        $navigation6 = new Navigation;
        $navigation6->create([
            'parent_id' => 3,
            'name' => 'Table',
            'permission_name' => 'create devices',
            'url' => 'settings/devices'
        ]);
    }
}
