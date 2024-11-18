@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 grid">
                    {{ __('Configure this to display all the vehicles, then duplicate it and this is the view for the non logged in users as well') }}
                    <div class=" display:grid flex-wrap:wrap" style="color:red; width:45%;     ">
                        <div>
                            @foreach ($vehicles as $vehicle)
                                <div class="border p-4 rounded-md w-1/2 mx-auto bg-gray-200">
                                    <img src="{{ $vehicle->image_url }}"
                                        alt="{{ $vehicle->make->name }} {{ $vehicle->model->name }}"
                                        class="w-full h-40 object-cover rounded">
                                    <br>
                                    <h3><b>Make: </b><i>{{ $vehicle->make->name ?? 'N/A' }}</i></h3>
                                    <h4><b>Model: </b><i>{{ $vehicle->model->name ?? 'N/A' }}</i></h4>
                                    <h4><b>Year: </b><i>{{ $vehicle->year }}</i></h4>
                                    <h3><b>Price: </b><i>P{{ number_format($vehicle->price, 2) }}</i></h3>
                                </div>
                                <br>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
