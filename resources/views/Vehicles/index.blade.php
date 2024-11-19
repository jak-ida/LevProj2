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
                <div class="container p-6">
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-6">My Vehicles</h1>
                    <a href="{{ route('vehicles.create') }}"
                        class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mb-6 inline-block">Add
                        Vehicle</a>

                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto border-collapse border border-gray-300 dark:border-gray-700">
                            <thead>
                                <tr class="bg-gray-100 dark:bg-gray-700 text-left text-gray-800 dark:text-gray-200">
                                    <th class="px-4 py-2 border border-gray-300 dark:border-gray-700">#</th>
                                    <th class="px-4 py-2 border border-gray-300 dark:border-gray-700">Make</th>
                                    <th class="px-4 py-2 border border-gray-300 dark:border-gray-700">Model</th>
                                    <th class="px-4 py-2 border border-gray-300 dark:border-gray-700">Price</th>
                                    <th class="px-4 py-2 border border-gray-300 dark:border-gray-700">Year</th>
                                    <th class="px-4 py-2 border border-gray-300 dark:border-gray-700">Description</th>
                                    <th class="px-4 py-2 border border-gray-300 dark:border-gray-700">Image</th>
                                    <th class="px-4 py-2 border border-gray-300 dark:border-gray-700">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vehicles as $vehicle)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-4 py-2 border border-gray-300 dark:border-gray-700">
                                            {{ $vehicle->id }}</td>
                                        <td class="px-4 py-2 border border-gray-300 dark:border-gray-700">
                                            {{ $vehicle->make->name }}</td>
                                        <td class="px-4 py-2 border border-gray-300 dark:border-gray-700">
                                            {{ $vehicle->model->name }}</td>
                                        <td class="px-4 py-2 border border-gray-300 dark:border-gray-700">
                                            ${{ number_format($vehicle->price, 2) }}</td>
                                        <td class="px-4 py-2 border border-gray-300 dark:border-gray-700">
                                            {{ $vehicle->year }}</td>
                                        <td class="px-4 py-2 border border-gray-300 dark:border-gray-700">
                                            {{ $vehicle->description }}</td>
                                        <td class="px-4 py-2 border border-gray-300 dark:border-gray-700"> <img
                                                src="{{ asset($vehicle->image) }}" style="height:150px"></td>
                                        <td class="px-4 py-2 border border-gray-300 dark:border-gray-700">
                                            <div class="inline-grid gap-2">
                                                <a href="{{ route('vehicles.show', $vehicle->id) }}"
                                                    class="bg-purple-500 hover:bg-purple-600 text-white font-bold py-1 px-3 rounded">View</a>
                                                <a href="{{ route('vehicles.edit', $vehicle) }}"
                                                    class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-1 px-3 rounded">Edit</a>
                                                <form action="{{ route('vehicles.destroy', $vehicle) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
