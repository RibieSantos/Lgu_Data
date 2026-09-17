<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\InventoryDocument;
use App\Models\InventoryItem;
use Illuminate\Http\Request;

class InventoryItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        $inventoryDocument = InventoryDocument::findOrFail($id);
        $category = Category::all();
        return view('admin.inventory.item.create', compact('inventoryDocument', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id)
    {
        $validated = $request->validate([
            'inventory_document_id' => 'nullable|string|max:20',
            'category_id' => 'nullable|string|max:20',
            'item_title' => 'nullable|string|max:20',
            'description' => 'nullable|string|max:255',
            'unit' => 'nullable|string|max:20',
            'qty' => 'nullable|string|max:20',
            'serial_no' => 'nullable|string|max:20',
            'inventory_item_no' => 'nullable|string|max:20',
            'property_no' => 'nullable|string|max:20',
            'acquired_date' => 'nullable|string|max:20',
            'disposal_date' => 'nullable|string|max:20',
            'estimated_life' => 'nullable|string|max:20',
            'unit_cost' => 'nullable|string|max:20',
            'total_cost' => 'nullable|string|max:20',
            'status' => 'nullable|string|max:20',
        ]);

        $documentId = InventoryDocument::findOrFail($id);
        InventoryItem::create($validated);
        return redirect()->route('inventory-documents.show', compact('documentId'))->with('success', 'Inventory Item Successfully Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
