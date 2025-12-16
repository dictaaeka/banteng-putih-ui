<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Village>
 */
class VillageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Desa Bantengputih',
            'address' => $this->faker->address,
            'phone' => '628123456789',
            'email' => $this->faker->email,
            'description' => $this->faker->paragraph,
        ];
    }
}
