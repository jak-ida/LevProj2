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
        $vehicles = Vehicle::paginate(10);
        return view('welcome', compact('vehicles'));
    }
    // Display all vehicles that belong to logged in users.
    public function index()
    {
        // Get the logged-in user's ID
        $userId = Auth::id();

        // Fetch vehicles where the `user_id` matches the logged-in user
        $vehicles = Vehicle::where('user_id', $userId)->paginate(10);

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

        //Check if a make is selected
        $makeId = $request->input('make_id');

        //Filter models based on the selected make, or get all models if no make is selected.
        $models = $makeId ? CarModel::where('make_id', $makeId)->get() : CarModel::all();

        return view('vehicles.create', compact('makes', 'models', 'makeId'));
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
        $path = $request->file('image')->storeAs('images', $fileName, 'public');


        // Add 'user_id' to the data before creating the vehicle
        $vehicleData = $request->all();
        $vehicleData['user_id'] = $user_id;  // Set the logged-in user's ID here
        $vehicleData['image'] = '/storage/' . $path; //Set the vehicle's image path to the storage file.

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
        $data = $request->only(['make_id', 'model_id', 'price', 'mileage', 'year', 'condition', 'description', 'image']);

        // Update image if a new file is provided
        if ($request->hasFile('image')) {
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('images', $fileName, 'public');
            $data['image'] = '/storage/' . $path;
        }
        dd($request->all());

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
