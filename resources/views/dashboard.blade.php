{{-- @extends('layouts.app')

@section('content')
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Dasheboard') }}
    </h2>
</x-slot>

{{-- style="background-image: url('{{ asset($vehicle->background_image) }}'); background-attachment: fixed; background-size: cover; background-position: center;">
<div class="py-12">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h1 class="text-2xl font-bold text-center mb-6">All Vehicles</h1>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach ($vehicles as $vehicle)
                        <div class="bg-white dark:bg-gray-700 rounded-lg shadow-md p-4">
                            <div class="mb-4">
                                <img src="{{ asset($vehicle->image) }}" alt="{{ $vehicle->make->name }} {{ $vehicle->model->name }}"
                                     class="w-full h-40 object-cover rounded-md">
                            </div>
                            <div class="text-gray-800 dark:text-gray-200">
                                <h3 class="font-semibold"><b>Make:</b> <i>{{ $vehicle->make->name ?? 'N/A' }}</i></h3>
                                <h4 class="font-semibold"><b>Model:</b> <i>{{ $vehicle->model->name ?? 'N/A' }}</i></h4>
                                <h4 class="font-semibold"><b>Year:</b> <i>{{ $vehicle->year }}</i></h4>
                                <h3 class="font-semibold text-blue-600 dark:text-blue-400"><b>Price:</b> <i>P{{ number_format($vehicle->price, 2) }}</i></h3>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
