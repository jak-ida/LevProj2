@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 grid">
                    {{ __('Configure this to display all the vehicles, then duplicate it and this is the view for the non logged in users as well') }}
                    <div class="inline-flex flex-wrap gap-4 w-full">
                        @foreach ($vehicles as $vehicle)
                            <div class="border mx-auto p-4 col-md-4 rounded-md">
                                <img src="{{ $vehicle->image_url }}" alt="{{ $vehicle->make->name }} {{ $vehicle->model->name }}" class="w-full h-40 object-cover rounded">
                                <br>
                                <h3>Make: {{ $vehicle->make->name ?? 'N/A' }}</h3>
                                <h4>Model: {{ $vehicle->model->name ?? 'N/A' }}</h4>
                                <h4>Year: {{ $vehicle->year }}</h4>
                                <h3>Price: ${{ number_format($vehicle->price, 2) }}</h3>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
