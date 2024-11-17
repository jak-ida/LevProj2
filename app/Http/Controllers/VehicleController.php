<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Make;
use App\Models\CarModel; // Ensure this corresponds to your database's "models" table
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    // Display all vehicles
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('vehicles.index', compact('vehicles'));
    }

    // Show the form for creating a new vehicle
    public function create()
    {
        $makes = Make::all(); // Retrieve all makes
        $models = CarModel::all(); // Retrieve all models

        return view('vehicles.create', compact('makes', 'models'));
    }

    // Store a newly created vehicle
    public function store(Request $request)
    {
        $request->validate([
            'make_id' => 'required|exists:makes,id', // Validate make_id against the makes table
            'model_id' => 'required|exists:vehicle_models,id', // Validate model_id against the models table
            'price' => 'required|numeric',
            'year' => 'required|integer',
        ]);

        Vehicle::create([
            'make_id' => $request->make_id,
            'model_id' => $request->model_id,
            'price' => $request->price,
            'year' => $request->year,
        ]);

        return redirect()->route('vehicles.index')->with('success', 'Vehicle added successfully.');
    }

    // Show the form for editing an existing vehicle
    public function edit(Vehicle $vehicle)
    {
        $makes = Make::all(); // Retrieve all makes
        $models = CarModel::all(); // Retrieve all models

        return view('vehicles.edit', compact('vehicle', 'makes', 'models'));
    }

    // Update the vehicle
    public function update(Request $request, Vehicle $vehicle)
    {
        $request->validate([
            'make_id' => 'required|exists:makes,id', // Validate make_id against the makes table
            'model_id' => 'required|exists:vehicle_models,id', // Validate model_id against the models table
            'price' => 'required|numeric',
            'year' => 'required|integer',
        ]);

        $vehicle->update([
            'make_id' => $request->make_id,
            'model_id' => $request->model_id,
            'price' => $request->price,
            'year' => $request->year,
        ]);

        return redirect()->route('vehicles.index')->with('success', 'Vehicle updated successfully.');
    }

    // Delete the vehicle
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return redirect()->route('vehicles.index')->with('success', 'Vehicle deleted successfully.');
    }
}
