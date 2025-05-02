@extends('layouts.admin')

@section('content')
    <h1>Edit Stock for Item: {{ $stock->item->item_name }}</h1>

    <form action="{{ route('stocks.update', $stock->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- This tells Laravel we're updating an existing resource -->
        
        <div class="mb-3">
            <label for="item_id" class="form-label">Item</label>
            <select name="item_id" class="form-control" required>
                @foreach ($items as $item)
                    <option value="{{ $item->id }}" @if($item->id == $stock->item_id) selected @endif>
                        {{ $item->item_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity to Add</label>
            <input type="number" name="quantity" class="form-control" value="{{ old('quantity') ?: $stock->quantity }}" required min="1">
        </div>

        <div class="mb-3">
            <label for="unit_cost" class="form-label">Unit Cost</label>
            <input type="number" name="unit_cost" class="form-control" value="{{ old('unit_cost') ?: $stock->unit_cost }}" step="0.01" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Stock</button>
    </form>

    <!-- Display Validation Errors (if any) -->
    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
