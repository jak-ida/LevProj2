<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Vehicle;
use App\Models\Make;
use App\Models\CarModel;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    // Display all vehicles
    public function index()
    {
        $vehicles = Vehicle::paginate(10);
        return view('vehicles.index', compact('vehicles'));
    }

    // Show the form for creating a new vehicle
    public function create()
    {
        $makes = Make::all();
        $models = CarModel::all();

        return view('vehicles.create', compact('makes', 'models'));
    }

    // Store a newly created vehicle
    public function store(Request $request)
    {
        if (Auth::check()) {
            $user_id = Auth::id();  // Use the Auth facade directly to get the logged-in user's ID
        } else {
            // If the user is not authenticated, you could return an error or redirect
            return redirect()->route('login')->with('error', 'You must be logged in to add a vehicle.');
        }

        // Validate all required fields (excluding 'user_id' as it will be set manually)
        $request->validate([
            'make_id' => 'required|exists:makes,id',
            'model_id' => 'required|exists:car_models,id',
            'price' => 'required|numeric',
            'year' => 'required|integer',
            'mileage' => 'required|integer',
            'condition' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle the image file upload
        $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('images', $fileName, 'public');

        // Add 'user_id' to the data before creating the vehicle
        $vehicleData = $request->all();
        $vehicleData['user_id'] = $user_id;  // Set the logged-in user's ID here

        // Create the vehicle
        $vehicle = Vehicle::create($vehicleData);

        return redirect()->route('vehicles.index')->with('success', 'Vehicle added successfully.');
    }

    // Show the form for editing an existing vehicle
    public function edit(Vehicle $vehicle)
    {   //Grab list from existing makes and models
        $makes = Make::all();
        $models = CarModel::all();

        return view('vehicles.edit', compact('vehicle', 'makes', 'models'));
    }

    // Update an existing vehicle
    public function update(Request $request, Vehicle $vehicle)
    {
        $request->validate([
            'make_id' => 'required|exists:makes,id',
            'model_id' => 'required|exists:car_models,id',
            'price' => 'required|numeric',
            'year' => 'required|integer',
            'mileage' => 'required|integer',
            'condition' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        $data = $request->only(['make_id', 'model_id', 'price', 'mileage', 'year', 'condition', 'description']);

        // Update image if a new file is provided
        if ($request->hasFile('image')) {
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('images', $fileName, 'public');
            $data['image'] = '/storage/' . $path;
        }

        $vehicle->update($data);

        return redirect()->route('vehicles.index')->with('success', 'Vehicle updated successfully.');
    }

    // Delete a vehicle
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return redirect()->route('vehicles.index')->with('success', 'Vehicle deleted successfully.');
    }
}
