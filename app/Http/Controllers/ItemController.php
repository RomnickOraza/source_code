<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $items = Item::paginate(6);  // Get paginated list of items
        return view('items.index', compact('items'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('items.create');  // Render the 'add' view for creating a new item
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        // Validate the request input
        $validated = $request->validate([
            'item_name' => 'required|string|max:255',
            'item_description' => 'nullable|string|max:255',
            'supply_type' => 'required|in:Office Supply,Medical Supply,Janitorial Supply',
        ]);

        // Create the item
        Item::create($validated);

        // Redirect back to the items list with a success message
        return redirect()->route('items.index')->with('success', 'Item created successfully.');
    }

    // Display the specified resource.
    public function show($id)
    {
        $item = Item::findOrFail($id);  // Find item by ID or show a 404 error
        return view('items.show', compact('item'));
    }

    // Show the form for editing the specified resource.
    public function edit($id)
    {
        $item = Item::findOrFail($id);  // Find item by ID or show a 404 error
        return view('items.edit', compact('item'));  // Pass item to the edit view
    }

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        // Validate the request input
        $validated = $request->validate([
            'item_name' => 'required|string|max:255',
            'item_description' => 'nullable|string|max:255',
            'supply_type' => 'required|in:Office Supply,Medical Supply,Janitorial Supply',
        ]);

        // Find the item by ID
        $item = Item::findOrFail($id);

        // Update the item
        $item->update($validated);

        // Redirect back to the items list with a success message
        return redirect()->route('items.index')->with('success', 'Item updated successfully.');
    }

    // Remove the specified resource from storage.
    public function destroy($id)
    {
        // Find the item by ID and delete
        $item = Item::findOrFail($id);
        $item->delete();

        // Redirect back to the items list
        return redirect()->route('items.index')->with('success', 'Item deleted successfully.');
    }
}
