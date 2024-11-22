@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto py-12 px-6">
        <h1 class="text-3xl font-semibold text-gray-800 dark:text-gray-200 mb-6">Add New Vehicle</h1>

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

        <form action="{{ route('vehicles.store') }}" method="POST" enctype="multipart/form-data"
            class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg">
            @csrf

            <div class="mb-4">
                <label for="make" class="block text-gray-700 dark:text-gray-200 text-sm font-medium">Make</label>
                <select
                    class="w-full mt-2 p-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    id="make" name="make_id" required>
                    <option value="" disabled selected>Select Make</option>
                    @foreach ($makes as $make)
                        <option value="{{ $make->id }}" {{ isset($makeId) && $make->id == $makeId ? 'selected' : '' }}>
                            {{ $make->name }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Model Dropdown -->
            {{-- <div class="mb-4">
                <label for="model" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Model
                </label>
                <select name="model_id" id="model" class="block w-full px-3 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                    <option value="">Select Model</option>
                </select>
            </div> --}}

            <div class="mb-4">
                <label for="model" class="block text-gray-700 dark:text-gray-200 text-sm font-medium">Model</label>
                <select name="model_id" id="model" class="block w-full px-3 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                    <option value="">Select Model</option>
                </select>
            </div>

            <script>
                document.getElementById('make').addEventListener('change', function () {
                    let makeId = this.value;


                    fetch(`/api/models?make_id=${makeId}`)
                        .then(response => response.json())
                        .then(data => {
                            let modelSelect = document.getElementById('model');
                            modelSelect.innerHTML = '<option value="">Select Model</option>';
                            data.forEach(model => {
                                modelSelect.innerHTML += `<option value="${model.id}">${model.name}</option>`;
                            });
                        });
                });
            </script>
            <div class="mb-4">
                <label for="price" class="block text-gray-700 dark:text-gray-200 text-sm font-medium">Price</label>
                <input type="number"
                    class="w-full mt-2 p-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    id="price" name="price" required>
            </div>

            <div class="mb-4">
                <label for="year" class="block text-gray-700 dark:text-gray-200 text-sm font-medium">Year</label>
                <input type="number"
                    class="w-full mt-2 p-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    id="year" name="year" required>
            </div>

            <div class="mb-4">
                <label for="mileage" class="block text-gray-700 dark:text-gray-200 text-sm font-medium">Mileage</label>
                <input type="number"
                    class="w-full mt-2 p-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    id="mileage" name="mileage" required>
            </div>

            <div class="mb-4">
                <label for="condition" class="block text-gray-700 dark:text-gray-200 text-sm font-medium">Condition</label>
                <select
                    class="w-full mt-2 p-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    id="condition" name="condition" required>
                    <option value="" disabled selected>Select Condition</option>
                    <option value="bad">Bad</option>
                    <option value="good">Good</option>
                    <option value="excellent">Excellent</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="description"
                    class="block text-gray-700 dark:text-gray-200 text-sm font-medium">Description</label>
                <textarea
                    class="w-full mt-2 p-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    id="description" name="description" rows="4" required></textarea>
            </div>

            <div class="mb-4">
                <label for="image" class="block text-gray-700 dark:text-gray-200 text-sm font-medium">Upload
                    Image</label>
                <input type="file"
                    class="w-full mt-2 p-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    id="image" name="image" required>
            </div>
            <!-- Back Button -->
            <div class="flex justify-end">
                <div class="mt-2 mr-2">
                    <a href="{{ url()->previous() ?? route('welcome') }}"
                        class="px-4 py-2 bg-purple-600 text-white rounded hover:bg-purple-700">
                        Back to Vehicles
                    </a>
                </div>
                <div class="flex justify-end">
                    <button type="submit"
                        class="px-6 py-2 bg-blue-600 text-white rounded-md shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Save
                        Vehicle</button>
                </div>
            </div>
        </form>
    </div>
@endsection

