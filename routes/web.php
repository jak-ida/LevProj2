<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



// Middleware ensures only logged-in users can access the routes
Route::middleware(['auth'])->group(function () {
    Route::resource('vehicles', VehicleController::class); // Generates all resourceful routes
});

// Route::middleware(['auth'])->group(function () {
//     // Route for displaying all vehicles
//     Route::get('vehicles', [VehicleController::class, 'index'])->name('vehicles.index');

//     // Routes for creating a new vehicle
//     Route::get('vehicles/create', [VehicleController::class, 'create'])->name('vehicles.create');
//     Route::post('vehicles', [VehicleController::class, 'store'])->name('vehicles.store');

//     // Routes for editing a vehicle
//     Route::get('vehicles/{vehicle}/edit', [VehicleController::class, 'edit'])->name('vehicles.edit');
//     Route::put('vehicles/{vehicle}', [VehicleController::class, 'update'])->name('vehicles.update');

//     // Route for deleting a vehicle
//     Route::delete('vehicles/{vehicle}', [VehicleController::class, 'destroy'])->name('vehicles.destroy');
// });

//Dashboard Route
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
