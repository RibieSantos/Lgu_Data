<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Departments::all();
        return view('admin.department.department', compact('departments'));
    }

    public function create()
    {
        return view('admin.department.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'department_name' => 'required|string|max:255',
            'department_code' => 'required|string|max:10',
            'description' => 'nullable|string',
        ]);

        Departments::create($request->all());

        return redirect()->route('departments.index')->with('success', 'Department created successfully.');
    }

    public function edit($id)
    {
        $department = Departments::findOrFail($id);
        return view('admin.department.edit', compact('department'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'department_name' => 'required|string|max:255',
            'department_code' => 'required|string|max:10',
            'description' => 'nullable|string',
        ]);

        $department = Departments::findOrFail($id);
        $department->update($request->all());

        return redirect()->route('departments.index')->with('success', 'Department updated successfully.');
    }
    public function destroy($id)
    {
        $department = Departments::findOrFail($id);
        $department->delete();

        return redirect()->route('departments.index')->with('success', 'Department deleted successfully.');
    }
}
