<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('items.index', compact('items'));
    }

    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'item_name' => 'required|string',
            'location_found' => 'required|string',
            'status' => 'required|string',
            'description' => 'nullable|string',
            'date_reported' => 'required|date'
        ]);

        Item::create($validated);

        return redirect()->route('items.index');
    }

    public function show($id)
    {
        $item = Item::findOrFail($id);
        return view('items.show', compact('item'));
    }

    public function edit($id)
    {
        $item = Item::findOrFail($id);
        return view('items.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);

        $validated = $request->validate([
            'item_name' => 'required|string',
            'location_found' => 'required|string',
            'status' => 'required|string',
            'description' => 'nullable|string',
            'date_reported' => 'required|date'
        ]);

        $item->update($validated);

        return redirect()->route('items.index');
    }

    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();

        return redirect()->route('items.index');
    }
}
