<?php

namespace Database\Factories;

use App\Models\Make;
use App\Models\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleFactory extends Factory
{
    public function definition()
    {
        return [
            'user_id' => User::factory(), // Generates a user if one doesn't exist
            'make_id' => Make::inRandomOrder()->first()->id, // Random existing Make
            'model_id' => function (array $attributes) {
                return \App\Models\Model_::where('make_id', $attributes['make_id'])->inRandomOrder()->first()->id;
            },
            'price' => $this->faker->numberBetween(5000, 100000), // Price range
            'mileage' => $this->faker->numberBetween(1000, 200000), // Mileage range
            'year' => $this->faker->year(),
            'condition' => $this->faker->randomElement(['new', 'used', 'certified']),
            'description' => $this->faker->paragraph(3),
        ];
    }
}
