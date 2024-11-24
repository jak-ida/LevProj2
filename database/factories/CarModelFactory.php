<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\Make;

class CarModelFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'make_id' => Make::factory(), // Generates a make for the model that is being created.
        ];
    }
}
