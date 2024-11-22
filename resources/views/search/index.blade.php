{{-- @extends('layouts.app')

@section('search')
<div class="container">
    <form action="{{ route('search.filter') }}" method="POST">
        @csrf
        <div class="bg-zinc-200">
            <div class="mb-3">
                <label for="make" class="form-label">Make</label>
                <select name="make_id" id="make" class="form-select">
                    <option value="">Select Make</option>
                    @foreach($makes as $make)
                        <option value="{{ $make->id }}">{{ $make->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="model" class="form-label">Model</label>
                <select name="model_id" id="model" class="form-select">
                    <option value="">Select Model</option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Search</button>
    </form>
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
@endsection --}}
