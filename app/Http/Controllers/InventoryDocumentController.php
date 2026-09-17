<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\InventoryDocument;
use App\Models\InventoryItem;
use Illuminate\Http\Request;

class InventoryDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents = InventoryDocument::with('accountablePerson')->latest()->paginate(10);

        return view('admin.inventory.document.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::orderBy('last_name', 'asc')->get();
        return view('admin.inventory.document.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'document_no' => 'required|string|max:50',
            'accountable_person_id' => 'required|exists:employee,id',
            'document_type' => 'required|string|max:50',
            'fund' => 'nullable|string|max:10',
            'document_date' => 'required|date',
            'received_from_id' => 'nullable|exists:employee,id',
            'received_by_id' => 'nullable|exists:employee,id',
            'remarks' => 'nullable|string|max:1000',
        ]);

        InventoryDocument::create($validated);
        return redirect()->route('inventory-documents.index')->with('success', 'Inventory document created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $inventoryItems = InventoryItem::where('inventory_document_id', $id)->get();
        $inventoryDocument = InventoryDocument::findOrFail($id);
        $inventoryDocument->load('accountablePerson', 'items.category');

        return view('admin.inventory.document.show', compact('inventoryDocument', 'inventoryItems'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $inventoryDocument = InventoryDocument::findOrFail($id);
        $employees = Employee::orderBy('last_name', 'asc')->get();

        return view('admin.inventory.document.edit', compact('inventoryDocument', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'document_no' => 'required|string|max:50',
            'accountable_person_id' => 'required|exists:employees,id',
            'document_type' => 'required|string|max:50',
            'fund' => 'nullable|string|max:10',
            'document_date' => 'required|date',
            'received_from_id' => 'nullable|exists:employees,id',
            'received_by_id' => 'nullable|exists:employees,id',
            'remarks' => 'nullable|string|max:1000',
        ]);

        $inventoryDocument = InventoryDocument::findOrFail($id);
        $inventoryDocument->update($validated);

        return redirect()->route('inventory-documents.index')->with('success', 'Inventory document updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $inventoryDocument = InventoryDocument::findOrFail($id);
        $inventoryDocument->delete();

        return redirect()->route('inventory-documents.index')->with('success', 'Inventory document deleted successfully.');
    }
}
