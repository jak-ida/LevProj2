@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Vehicle</h1>

    <form action="{{ route('vehicles.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="make" class="form-label">Make</label>
            <select class="form-control" id="make" name="make_id" required>
                <option value="" disabled selected>Select Make</option>
                @foreach ($makes as $make)
                    <option value="{{ $make->id }}">{{ $make->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="model" class="form-label">Model</label>
            <select class="form-control" id="model" name="model_id" required>
                <option value="" disabled selected>Select Model</option>
                @foreach ($models as $model)
                    <option value="{{ $model->id }}">{{ $model->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>

        <div class="mb-3">
            <label for="year" class="form-label">Year</label>
            <input type="number" class="form-control" id="year" name="year" required>
        </div>

        <button type="submit" class="btn btn-primary">Save Vehicle</button>
    </form>
</div>
@endsection
