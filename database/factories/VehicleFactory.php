<?php

namespace Database\Factories;

use App\Models\Make;
use App\Models\CarModel;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleFactory extends Factory
{
    public function definition()
    {
        return [
            'user_id' => User::factory(), // Associate with a user without creating upfront
            'make_id' => Make::factory(), // Create or use an existing make
            'model_id' => function (array $attributes) {
                // Ensure the VehicleModel exists or create one for the given make
                return CarModel::where('make_id', $attributes['make_id'])->inRandomOrder()->first()?->id ??
                       CarModel::factory()->create(['make_id' => $attributes['make_id']])->id;
            },
            'price' => $this->faker->numberBetween(5000, 100000), // Price range
            'mileage' => $this->faker->numberBetween(1000, 200000), // Mileage range
            'year' => $this->faker->year(),
            'condition' => $this->faker->randomElement(['new', 'used', 'certified']),
            'description' => $this->faker->paragraph(3),
        ];
    }
}
