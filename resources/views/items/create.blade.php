@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="my-4 text-center">Create Item</h2>

        <form action="{{ route('items.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="item_name" class="form-label">Item Name</label>
                <input type="text" name="item_name" id="item_name" class="form-control" required>
            </div>

            <div class="mb-4">
                <label for="item_description" class="form-label">Description</label>
                <input type="text" name="item_description" id="item_description" class="form-control">
            </div>

            <button type="submit" class="btn btn-success w-100">Create Item</button>
        </form>
    </div>
@endsection
