<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\SearchController;
use App\Models\CarModel;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Dashboard View for Non-logged users
Route::get('/', [VehicleController::class, 'home'])->name('welcome');

//Search Filter
Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::post('/search', [SearchController::class, 'filter'])->name('search.filter');

//Make or Model Search bar
Route::get('/vehicles/search', [SearchController::class, 'search'])->name('vehicles.search');
Route::get('/welcome', [VehicleController::class, 'search'])->name('vehicles.search');


Route::get('/api/models', function (Request $request) {
    $makeId = $request->query('make_id');

    // Validate that make_id is provided
    if (!$makeId) {
        return response()->json(['error' => 'Make ID is required'], 400);
    }
    // Fetch models associated with the make_id
    $models = CarModel::where('make_id', $makeId)->get();

    // Return the models as a JSON response
    return response()->json($models);
});


Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Routes for vehicles
    Route::get('vehicles', [VehicleController::class, 'index'])->name('vehicles.index');  // To list all vehicles
    Route::get('vehicles/create', [VehicleController::class, 'create'])->name('vehicles.create'); // Form to create a new vehicle
    Route::post('vehicles/store', [VehicleController::class, 'store'])->name('vehicles.store'); // Store a new vehicle
    Route::get('vehicles/{vehicle}/edit', [VehicleController::class, 'edit'])->name('vehicles.edit'); // Form to edit a vehicle
    Route::put('vehicles/{vehicle}', [VehicleController::class, 'update'])->name('vehicles.update'); // Update the vehicle
    Route::delete('vehicles/{vehicle}', [VehicleController::class, 'destroy'])->name('vehicles.destroy'); // Delete a vehicle

});

// Dashboard route
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('vehicles/{vehicle}/show', [VehicleController::class, 'show'])->name('vehicles.show');

// Profile routes remain the same
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
