<?php

namespace Database\Factories;

use App\Models\Area;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Device>
 */
class DeviceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'area_id' => Area::factory(),
            'ssid' => $name = $this->faker->word(),
            'slug' => Str::slug($name . '-' . Str::random(4)),
            'brand' => $this->faker->word(),
            'type' => $this->faker->word(),
            'ip' => $this->faker->ipv4(),
            'description' => $this->faker->sentence()
        ];
    }
}
