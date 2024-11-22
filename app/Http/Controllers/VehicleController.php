<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Vehicle;
use App\Models\Make;
use App\Models\CarModel;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    // Display all vehicles for non-logged in users
    public function home()
    {
        $makes = Make::all();
        //dd($makes);
        $vehicles = Vehicle::paginate(20);
        return view('welcome', compact('vehicles', 'makes'));
    }

    // Display all vehicles that belong to logged in users.
    public function index()
    {
        // Get the logged-in user's ID
        $userId = Auth::id();

        // Fetch vehicles where the `user_id` matches the logged-in user
        $vehicles = Vehicle::where('user_id', $userId)->paginate(20);

        return view('vehicles.index', compact('vehicles'));
    }

    public function show(Vehicle $vehicle)
    {
        return view('vehicles.show', compact('vehicle'));
    }

    // Show the form for creating a new vehicle
    public function create(Request $request)
    {   //Get all makes for the dropdown
        $makes = Make::all();

        $makeId = $request->input('make_id');
        $modelId = $request->input('model_id');

        $models = CarModel::query();
        if ($makeId) {
            $models = $models->where('make_id', $makeId);
        }

        if ($modelId) {
            $models = $models->where('id', $modelId);
        }

        $results = $models->get();

        return view('vehicles.create', compact('makes', 'results'));
    }

    // Store a newly created vehicle
    public function store(Request $request)
    {
        if (Auth::check()) {
            $user_id = Auth::id();  // Use the Auth facade directly to get the logged-in user's ID
        } else {
            // If the user is not authenticated, return an error or redirect
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

        // Save the file directly to the public/images directory
        $path = $request->file('image')->move(public_path('images'), $fileName);

        // Add 'user_id' to the data before creating the vehicle
        $vehicleData = $request->all();
        $vehicleData['user_id'] = $user_id;  // Set the logged-in user's ID here

        // Set the vehicle's image path relative to the public directory
        $vehicleData['image'] = 'images/' . $fileName; // This is now the public path for the image

        // Create the vehicle
        Vehicle::create($vehicleData);

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
        // Validate the request data
        $validatedData = $request->validate([
            'make_id' => 'nullable|exists:makes,id',
            'model_id' => 'nullable|exists:car_models,id',
            'price' => 'nullable|numeric',
            'year' => 'nullable|integer',
            'mileage' => 'nullable|integer',
            'condition' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Merge existing data with new data
        $data = array_merge($vehicle->toArray(), $validatedData);

        // Update image if a new file is provided
        if ($request->hasFile('image')) {
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('images', $fileName, 'public');
            $data['image'] = 'storage/' . $path;
        } else {
            $data['image'] = $vehicle->image; // Retain the old image if no new file is uploaded
        }

        // Update the vehicle record
        $vehicle->update($data);

        // Redirect with a success message
        return redirect()->route('vehicles.index')->with('success', 'Vehicle updated successfully.');
    }


    // Delete a vehicle
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return redirect()->route('vehicles.index')->with('success', 'Vehicle deleted successfully.');
    }

   
}
