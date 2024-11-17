<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CarModelFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'make_id' => \App\Models\Make::factory(), // Relates to a make
        ];
    }
}
