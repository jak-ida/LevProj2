@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto py-12 px-6">
        <h1 class="text-3xl font-semibold text-gray-800 dark:text-gray-200 mb-6">Edit Vehicle</h1>
        <!-- Display All Errors -->
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded-md mb-6">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-sm">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('vehicles.update', $vehicle) }}" method="POST" enctype="multipart/form-data"
            class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="make" class="block text-gray-700 dark:text-gray-200 text-sm font-medium">Make</label>
                <select
                    class="w-full mt-2 p-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    id="make" name="make_id">
                    <option value="{{ $vehicle->make->id }}" disabled selected>{{ $vehicle->make->name }}</option>
                    @foreach ($makes as $make)
                        <option value="{{ $make->id }}"
                            {{ old('make_id', $vehicle->make_id) == $make->id ? 'selected' : '' }}>
                            {{ $make->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="model" class="block text-gray-700 dark:text-gray-200 text-sm font-medium">Model</label>
                <select
                    class="w-full mt-2 p-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    id="model" name="model_id">
                    <option value="{{ $vehicle->model->id }}" disabled selected>{{ $vehicle->model->name }}</option>
                    @foreach ($models as $model)
                        <option value="{{ $model->id }}"
                            {{ old('model_id', $vehicle->model_id) == $model->id ? 'selected' : '' }}>
                            {{ $model->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="price" class="block text-gray-700 dark:text-gray-200 text-sm font-medium">Price:</label>
                <input type="number"
                    class="w-full mt-2 p-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    id="price" name="price" value="{{ old('price', $vehicle->price) }}">
            </div>

            <div class="mb-4">
                <label for="year" class="block text-gray-700 dark:text-gray-200 text-sm font-medium">Year:</label>
                <input type="number"
                    class="w-full mt-2 p-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    id="year" name="year" value="{{ old('year', $vehicle->year) }}">
            </div>

            <div class="mb-4">
                <label for="mileage" class="block text-gray-700 dark:text-gray-200 text-sm font-medium">Mileage:</label>
                <input type="number"
                    class="w-full mt-2 p-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    id="mileage" name="mileage" value="{{ old('mileage', $vehicle->mileage) }}">
            </div>

            <div class="mb-4">
                <label for="condition" class="block text-gray-700 dark:text-gray-200 text-sm font-medium">Condition</label>
                <select
                    class="w-full mt-2 p-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    id="condition" name="condition">
                    <option value="{{ $vehicle->condition }}" disabled selected>{{ ucfirst($vehicle->condition) }}</option>
                    <option value="bad" {{ old('condition', $vehicle->condition) == 'bad' ? 'selected' : '' }}>Bad</option>
                    <option value="good" {{ old('condition', $vehicle->condition) == 'good' ? 'selected' : '' }}>Good</option>
                    <option value="excellent" {{ old('condition', $vehicle->condition) == 'excellent' ? 'selected' : '' }}>Excellent</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 dark:text-gray-200 text-sm font-medium">Description</label>
                <textarea
                    class="w-full mt-2 p-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    id="description" name="description" rows="4">{{ old('description', $vehicle->description) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="image" class="block text-gray-700 dark:text-gray-200 text-sm font-medium">Upload Image</label>
                <input type="file"
                    class="w-full mt-2 p-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    id="image" name="image">
                @if ($vehicle->image)
                    <div class="mt-2">
                        <img src="{{ asset($vehicle->image) }}" alt="Current Image" class="w-32 h-32 object-cover">
                    </div>
                @endif
            </div>

            <div class="flex justify-end">
                <!-- Back Button -->
                <div class="mt-2 mr-2">
                    <a href="{{ url()->previous() ?? route('welcome') }}"
                       class="px-4 py-2 bg-purple-600 text-white rounded hover:bg-purple-700">
                       Back to Vehicles
                    </a>
                </div>
                <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white rounded-md shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Update Vehicle
                </button>
            </div>
        </form>
    </div>
@endsection
