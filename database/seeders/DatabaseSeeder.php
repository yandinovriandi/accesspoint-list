<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {
        $this->call([
            UsersTableSeeder::class, RolesTableSeeder::class,
            NavigationsTableSeeder::class, PermissionsTableSeeder::class, AreasTableSeeder::class
        ]);
        // \App\Models\Navigation::factory()->create();
        // \App\Models\Area::factory(10)->create();
        // \App\Models\Device::factory(10)->create();
        // \App\Models\User::factory(5)->create();
    }
}
