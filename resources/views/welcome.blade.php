@extends('layouts.app')

@section('content')
<x-slot name="header">
    <h2 class="font-semibold text-xl text-white dark:text-purple-200 leading-tight">
        {{ __('All Vehicles') }}
    </h2>
</x-slot>

<div class="pb-12 bg-purple-100" style="background-image: url('{{ asset('storage/Logos/background_img.jpg') }}');">
    <img src="{{ asset('storage/Logos/WheelsnThings.png')}}" class="w-full h-25">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-200 dark:bg-gray-800 shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold text-black">All Vehicles</h1>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @forelse ($vehicles as $vehicle)
                    <a href="{{ route('vehicles.show', $vehicle->id) }}">
                        <div class="bg-white hover:border-yellow-600 dark:bg-gray-700 rounded-lg shadow-md p-4">
                            <div class="mb-4">
                                <img src="{{ asset($vehicle->image) }}" alt="{{ $vehicle->make->name ?? 'Unknown Make' }} {{ $vehicle->model->name ?? 'Unknown Model' }}"
                                     class="w-full h-40 object-cover rounded-md border-2 border-purple-500">
                            </div>
                            <div class="text-gray-800 dark:text-gray-200">
                                <h3 class="font-semibold text-black"><b>Make:</b> <i>{{ $vehicle->make->name ?? 'N/A' }}</i></h3>
                                <h4 class="font-semibold text-black"><b>Model:</b> <i>{{ $vehicle->model->name ?? 'N/A' }}</i></h4>
                                <h4 class="font-semibold text-black"><b>Year:</b> <i>{{ $vehicle->year }}</i></h4>
                                <h3 class="font-semibold text-yellow-600 dark:text-gold-400"><b>Price:</b> <i>P{{ number_format($vehicle->price, 2) }}</i></h3>
                            </div>
                        </div>
                    </a>
                    @empty
                        <p class="col-span-full text-center text-gray-500 dark:text-gray-400">No vehicles available.</p>
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

@endsection
