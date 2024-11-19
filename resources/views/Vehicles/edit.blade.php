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

        <form action="{{ route('vehicles.update', $vehicle) }}" method="POST"
            class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="make" class="block text-gray-700 dark:text-gray-200 text-sm font-medium">Make:</label>
                <input type="text"
                    class="w-full mt-2 p-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    id="make" name="make" value="{{ $vehicle->make->name }}">
            </div>

            <div class="mb-4">
                <label for="model" class="block text-gray-700 dark:text-gray-200 text-sm font-medium">Model:</label>
                <input type="text"
                    class="w-full mt-2 p-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    id="model" name="model" value="{{ $vehicle->model->name }}">
            </div>

            <div class="mb-4">
                <label for="price" class="block text-gray-700 dark:text-gray-200 text-sm font-medium">Price:</label>
                <input type="number"
                    class="w-full mt-2 p-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    id="price" name="price" value="{{ $vehicle->price }}">
            </div>

            <div class="mb-4">
                <label for="year" class="block text-gray-700 dark:text-gray-200 text-sm font-medium">Year:</label>
                <input type="number"
                    class="w-full mt-2 p-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    id="year" name="year" value="{{ $vehicle->year }}">
            </div>
            <div class="mb-4">
                <label for="description"
                    class="block text-gray-700 dark:text-gray-200 text-sm font-medium">Description</label>
                <textarea
                    class="w-full mt-2 p-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    id="description" name="description" value="{{ $vehicle->description }}"rows="4"></textarea>
            </div>
            <div class="mb-4">
                <label for="image" class="block text-gray-700 dark:text-gray-200 text-sm font-medium">Upload
                    Image</label>
                <input type="file"
                    class="w-full mt-2 p-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    id="image" name="image" value="{{ $vehicle->image }}">
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white rounded-md shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Update
                    Vehicle</button>
            </div>
        </form>
    </div>
@endsection
