<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vehicle;

class VehicleSeeder extends Seeder
{
    public function run()
    {
        // Generate 50 random vehicles
        Vehicle::factory()->count(50)->create();
    }
}
