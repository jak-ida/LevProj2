<?php

namespace App\Http\Controllers;

use App\Models\Make;
use App\Models\CarModel;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        $makes = Make::all();
        dd($makes);
        return view('welcome', compact('makes'));
    }

    public function filter(Request $request)
    {
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

        return view('search.results', compact('results'));
    }


    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        $query = Vehicle::query()->with(['make', 'model']);

        if ($searchTerm) {
            $query->whereHas('make', function ($q) use ($searchTerm) {
                    $q->where('name', 'LIKE', '%' . $searchTerm . '%');
                })
                ->orWhereHas('model', function ($q) use ($searchTerm) {
                    $q->where('name', 'LIKE', '%' . $searchTerm . '%');
                })
                ->orWhere('year', 'LIKE', '%' . $searchTerm . '%');
        }

        $vehicles = $query->get();

        return view('vehicles.results', compact('vehicles', 'searchTerm'));
    }




}
