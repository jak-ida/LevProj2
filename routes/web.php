<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;


Route::get('/', [VehicleController::class, 'home'])->name('welcome');
//View to show the details of the car
Route::get('/vehicles/{vehicle}', [VehicleController::class, 'show'])->name('vehicles.show');


// Use auth middleware for logged in User.
Route::middleware(['auth', 'verified'])->group(function () {
    //Dashboard route
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //Route to create a new vehicle
    Route::post('vehicles', [VehicleController::class, 'store'])->name('vehicles.store'); // why ore dashboard???? I wanted to take a different route but I'll just duplicate the code. I have to have a view where the non-logged in users can view the vehicles as well. Without being logged in

    Route::resource('vehicles', VehicleController::class); // Resource route for vehicles, including create, store, edit, update, destroy, index
});

// Profile routes remain the same
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
