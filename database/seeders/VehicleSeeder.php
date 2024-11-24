<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vehicle;
use App\Models\Make;

class VehicleSeeder extends Seeder
{
    public function run()
    {   //This works and does not duplicate but does not create the actual vehicles.
        // Generate 5 makes with 5 models each
        //Make::factory()
            // ->count(5)
            // ->hasModels(5) // Creates 5 related models for each make
            // ->create();
    }
}
