<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VehicleController;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Route;

// Dashboard View for Non-logged users
Route::get('/', [VehicleController::class, 'home'])->name('welcome');

// Use auth middleware for logged in User.
Route::middleware(['auth', 'verified'])->group(function () {
    //Dashboard route
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //Route to create a new vehicle
    Route::post('vehicles', [VehicleController::class, 'store'])->name('vehicles.store');
    Route::post('vehicles', [VehicleController::class, 'create'])->name('vehicles.create');

    Route::resource('vehicles', VehicleController::class); // Resource route for vehicles, including create, store, edit, update, destroy, index
});

// Profile routes remain the same
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
