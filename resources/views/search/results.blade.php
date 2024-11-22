@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Search Results</h3>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Make</th>
                <th>Model</th>
            </tr>
        </thead>
        <tbody>
            @forelse($results as $result)
                <tr>
                    <td>{{ $result->id }}</td>
                    <td>{{ $result->make->name }}</td>
                    <td>{{ $result->name }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No results found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
