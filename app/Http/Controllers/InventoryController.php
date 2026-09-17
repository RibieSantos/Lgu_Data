<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use App\Models\Employee;
use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index(Request $request){
        $search = $request->input('search');
        $inventory = Inventory::join('employee', 'inventories.employee_id', '=', 'employee.id')
            ->when($search, function ($query, $search) {
                return $query->where('inventories.item_title', 'like', "%{$search}%")
                    ->orWhere('inventories.ics_no', 'like', "%{$search}%")
                    ->orWhere('inventories.serial_no', 'like', "%{$search}%")
                    ->orWhere('inventories.item_title', 'like', "%{$search}%")
                    ->orWhere('employee.first_name', 'like', "%{$search}%")
                    ->orWhere('employee.last_name', 'like', "%{$search}%")
                    ->orWhere('employee.middle_name', 'like', "%{$search}%")
                    ->orWhere('employee.position', 'like', "%{$search}%");
            })
            ->paginate(50)
            ->withQueryString();

            return view('admin.inventory.inventory', compact('inventory', 'search'));
    }
    public function create($id)
    {
        $inventory = Inventory::all();
        $employee = Employee::findOrFail($id);
        return view('admin.inventory.create', compact('employee', 'inventory'));
    }

    public function store(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        $request->validate([
            'employee_id' => 'required',
            'item_title' => 'required|string|max:255',
            'ics_no' => 'nullable|string|max:255',
            'qty' => 'required|integer|min:1',
            'description' => 'nullable|string|max:255',
            'serial_no' => 'nullable|string|max:255',
            'acquired_date' => 'required|date',
        ]);

        Inventory::create([
            'employee_id' => $request->employee_id,
            'item_title' => $request->item_title,
            'ics_no' => $request->ics_no,
            'qty' => $request->qty,
            'description' => $request->description,
            'serial_no' => $request->serial_no,
            'acquired_date' => $request->acquired_date,
        ]);

        return redirect()->route('employees.view', ['id' => $employee->id])->with('success', 'Inventory item added successfully.');
    }
}
