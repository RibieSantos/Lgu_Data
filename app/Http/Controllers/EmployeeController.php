<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use App\Models\Employee;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function index(Request $request)
{
    $search = $request->search;
    $department = $request->department_id;

    $employees = Employee::with('department')
        ->when($search, function ($query) use ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                    ->orWhere('middle_name', 'like', "%{$search}%")
                    ->orWhere('last_name', 'like', "%{$search}%")
                    ->orWhere('employee_number', 'like', "%{$search}%")
                    ->orWhere('position', 'like', "%{$search}%");
            });
        })
        ->when($department, function ($query) use ($department) {
            $query->where('department_id', $department);
        })
        
        ->paginate(50)
        ->withQueryString();


    $departments = Departments::all()->sortBy('department_code');
    return view('admin.employees.employee', compact(
        'employees',
        'departments',
        'search'
    ));
}

    public function view($id)
    {
        $inventory = Inventory::all();
        $employee = Employee::findOrFail($id);
        $departments = Departments::all(); // Assuming you have a Department model
        return view('admin.employees.view', compact('employee', 'departments', 'inventory'));
    }

    public function create()
    {
        $departments = Departments::all(); // Assuming you have a Department model
        return view('admin.employees.create', compact('departments'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'employee_number' => 'nullable|string|max:255',
            'employee_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'contact_number' => 'nullable|string|max:20',
            'birth_date' => 'nullable|date',
            'department_id' => 'required|exists:departments,id',
            'contact_person_name' => 'nullable|string|max:255',
            'contact_person_number' => 'nullable|string|max:20',
            'contact_person_address' => 'nullable|string|max:255',
        ]);

        $imagePath = null;

        if ($request->hasFile('employee_image')) {
            $imagePath = $request->file('employee_image')->store('employees', 'public');
        }

        Employee::create([
            'employee_number' => $request->employee_number,
            'employee_image' => $imagePath,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'position' => $request->position,
            'contact_number' => $request->contact_number,
            'birth_date' => $request->birth_date,
            'department_id' => $request->department_id,
            'contact_person_name' => $request->contact_person_name,
            'contact_person_number' => $request->contact_person_number,
            'contact_person_address' => $request->contact_person_address,
        ]);
dd($request->file('employee_image'));
        return redirect()->route('employees.index')
            ->with('success', 'Employee created successfully.');
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);
        $request->validate([
            'employee_number' => 'nullable|string|max:255',
            'employee_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120', // 5MB max size
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'contact_number' => 'nullable|string|max:20',
            'birth_date' => 'nullable|date',
            'department_id' => 'required|exists:departments,id',
            'contact_person_name' => 'nullable|string|max:255',
            'contact_person_number' => 'nullable|string|max:20',
            'contact_person_address' => 'nullable|string|max:255',
        ]);

        $imagePath = $employee->employee_image;

        if ($request->hasFile('employee_image')) {
            if ($employee->employee_image && Storage::disk('public')->exists($employee->employee_image)) {
                // Delete the old image file from storage
                Storage::disk('public')->delete($employee->employee_image);
            }
            $imagePath = $request->file('employee_image')->store('employees', 'public');
        }

        $employee->update([
            'employee_number' => $request->employee_number,
            'employee_image' => $imagePath,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'position' => $request->position,
            'contact_number' => $request->contact_number,
            'birth_date' => $request->birth_date,
            'department_id' => $request->department_id,
            'contact_person_name' => $request->contact_person_name,
            'contact_person_number' => $request->contact_person_number,
            'contact_person_address' => $request->contact_person_address,
        ]);

        return redirect()->route('employees.index')
            ->with('success', 'Employee updated successfully.');
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $departments = Departments::all(); // Assuming you have a Department model
        return view('admin.employees.edit', compact('employee', 'departments'));
    }



    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        if ($employee->employee_image) {
            // Delete the image file from storage
            Storage::disk('public')->delete($employee->employee_image);
        }

        return redirect()->route('employees.index')
            ->with('success', 'Employee deleted successfully.');
    }
}
