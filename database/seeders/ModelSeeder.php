<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Make;
use App\Models\Vehicle;

class ModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

        // Iterate over each make and create models for it
        Make::all()->each(function ($make) {
            // Create 5 models for each make
            Vehicle::factory()->count(1)->create([
                'make_id' => $make->id, // Assign the current make's ID to the model
            ]);
        });
    }
}
