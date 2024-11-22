<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Vehicle;

class VehicleSeeder extends Seeder
{
    public function run()
    {
        $vehicleCompanies = [
            ['name' => 'Toyota'],
            ['name' => 'Ford'],
            ['name' => 'Honda'],
            ['name' => 'Tesla'],
            ['name' => 'BMW'],
            ['name' => 'Mercedes-Benz'],
        ];

        DB::table('vehicle_companies')->insert($vehicleCompanies);
    }


}
