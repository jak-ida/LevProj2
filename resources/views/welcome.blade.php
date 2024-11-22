@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-purple-200 leading-tight">
            {{ __('All Vehicles') }}
        </h2>
    </x-slot>

    <div class="pb-12" style="background-image: url('{{ asset('storage/Logos/background_img.jpg') }}');">
        <img src="{{ asset('storage/Logos/WheelsnThings.png') }}" class="w-full h-25 pt-8">
        <div class=" w-full mx-auto sm:px-6 lg:px-8">
            <div class="w-full inline-flex gap-4">
                <div class="w-2/12 bg-white dark:bg-gray-800 shadow-lg rounded-lg p-4">
                    <div class="container">
                        <form action="{{ route('search.filter') }}" method="POST">
                            @csrf
                            <!-- Make Dropdown -->
                            {{-- //Make this able to search for just the make or just the Model --}}
                            <div class="mb-4">
                                <label for="make"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Make
                                </label>
                                <select name="make_id" id="make"
                                    class="block w-full px-3 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                                    <option value="">Select Make</option>
                                    @foreach ($makes as $makes)
                                        <option value="{{ $makes->id }}">{{ $makes->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Model Dropdown -->
                            <div class="mb-4">
                                <label for="model"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Model
                                </label>
                                <select name="model_id" id="model"
                                    class="block w-full px-3 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                                    <option value="">Select Model</option>
                                </select>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit"
                                class="w-full px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                Search
                            </button>
                        </form>
                    </div>
                </div>

                <script>
                    document.getElementById('make').addEventListener('change', function() {
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
                <div class=" w-full bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="flex justify-between items-center mb-6">
                            <h1 class="text-2xl font-bold text-black">All Vehicles</h1>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                            @forelse ($vehicles as $vehicle)
                                <a href="{{ route('vehicles.show', $vehicle->id) }}">
                                    <div
                                        class="bg-white border-2 border-gray-100 hover:bg-gray-100 dark:bg-gray-700 rounded-lg shadow-lg p-4">
                                        <div class="mb-4">
                                            <img src="{{ asset($vehicle->image) }}"
                                                alt="{{ $vehicle->make->name ?? 'Unknown Make' }} {{ $vehicle->model->name ?? 'Unknown Model' }}"
                                                class="w-full h-40 object-cover rounded-md border-2 border-purple-500">
                                        </div>
                                        <div class="text-gray-800 dark:text-gray-200">
                                            <h3 class="font-semibold text-black"><b>Make:</b>
                                                <i>{{ $vehicle->make->name ?? 'N/A' }}</i>
                                            </h3>
                                            <h4 class="font-semibold text-black"><b>Model:</b>
                                                <i>{{ $vehicle->model->name ?? 'N/A' }}</i>
                                            </h4>
                                            <h4 class="font-semibold text-black"><b>Year:</b> <i>{{ $vehicle->year }}</i>
                                            </h4>
                                            <h3 class="font-semibold text-yellow-600 dark:text-gold-400"><b>Price:</b>
                                                <i>P{{ number_format($vehicle->price, 2) }}</i>
                                            </h3>
                                        </div>
                                    </div>
                                </a>
                            @empty
                                <p class="col-span-full text-center text-gray-500 dark:text-gray-400">No vehicles available.
                                </p>
                            @endforelse
                        </div>
                        <!-- Pagination Links -->
                        <div class="mt-6">
                            {{ $vehicles->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
