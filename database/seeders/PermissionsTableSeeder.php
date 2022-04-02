<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = new Permission;
        $permission->create([
            'name' => 'create navigations',
            'guard_name' => 'web',
        ]);
        $permission1 = new Permission;
        $permission1->create([
            'name' => 'create permissions',
            'guard_name' => 'web',
        ]);
    }
}
