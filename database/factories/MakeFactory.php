<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MakeFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->randomElement(['Toyota', 'Ford', 'Honda', 'Chevrolet', 'Nissan'])
        ];
    }
}

?>
