<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Make;
use App\Models\Vehicle;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create();

        Make::factory()->count(10)->create();

        // Iterate over each make and create models for it
        Make::all()->each(function ($make) {
            // Create 5 models for each make
            Vehicle::factory()->count(5)->create([
                'make_id' => $make->id, // Assign the current make's ID to the model
            ]);
        });

        $this->call(VehicleSeeder::class);
    }
}
