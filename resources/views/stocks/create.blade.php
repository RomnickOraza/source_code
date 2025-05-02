@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="my-4 text-center">Create Stock</h1>

        <form action="{{ route('stocks.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="item_id" class="form-label">Item</label>
                <select name="item_id" class="form-control" required>
                    <option value="" disabled selected>Select an Item</option>
                    @foreach ($items as $item)
                        <option value="{{ $item->id }}">{{ $item->item_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" name="quantity" class="form-control" required>
            </div>
            <div class="mb-4">
                <label for="unit_cost" class="form-label">Unit Cost</label>
                <input type="number" name="unit_cost" class="form-control" step="0.01" required>
            </div>
            <div class="mb-4">
                <label for="reference" class="form-label">Reference (Optional)</label>
                <input type="text" name="reference" class="form-control" placeholder="Reference (Optional)">
            </div>
            <div class="mb-4">
                <label for="receipt_qty" class="form-label">Receipt Quantity (Optional)</label>
                <input type="number" name="receipt_qty" class="form-control" placeholder="Receipt Quantity (Optional)">
            </div>
            <div class="mb-4">
                <label for="unit" class="form-label">Unit</label>
                <input type="text" name="unit" class="form-control" placeholder="Unit (e.g., pcs)">
            </div>
            <div class="mb-4">
                <label for="supply_from" class="form-label">Supply From</label>
                <select name="supply_from" class="form-control">
                    <option value="" disabled selected>Select Supply Source</option>
                    <option value="purchased">Purchased</option>
                    <option value="received">Received</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success w-100">Create Stock</button>
        </form>
    </div>
@endsection
