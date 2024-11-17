<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    public function index()
{
    // Fetch all vehicles from the database
    $vehicles = Vehicle::with('make', 'model')->get(); // Eager-load 'make' and 'model'

    // Pass vehicles to the dashboard view
    return view('dashboard', compact('vehicles'));
}
}
