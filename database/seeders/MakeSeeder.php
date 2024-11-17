<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Make; // Make sure the Make model is imported

class MakeSeeder extends Seeder
{
    public function run()
    {
        // Generate 10 makes using the Make model's factory
        Make::factory()->count(10)->create();
    }
}
