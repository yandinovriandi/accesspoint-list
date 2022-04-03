<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            [
                'name' => 'Kp Wifi',
                'keterangan' => 'Jl.wifi kec hotspot',
            ],
            [
                'name' => 'Kp Wifi Kere',
                'keterangan' => 'Jl.wifi kec hotspot kere',
            ],
            [
                'name' => 'Kp Wifi Murah',
                'keterangan' => 'Jl.wifi kec hotspot murah',
            ],
        ])->each(fn ($q) => Area::create($q));
    }
}
