<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\CarModel;

Route::get('/models', function (Request $request) {
    // Get the make_id from the request
    $makeId = $request->query('make_id');

    // Validate that make_id exists
    if (!$makeId) {
        return response()->json(['error' => 'Make ID is required'], 400);
    }

    // Fetch models associated with the make_id
    $models = CarModel::where('make_id', $makeId)->get();

    // Return the models as JSON
    return response()->json($models);
});
