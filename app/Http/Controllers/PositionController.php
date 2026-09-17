<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index()
    {
        $positions = Position::all();
        return view('admin.position.position', compact('positions'));
    }

    public function create()
    {
        return view('admin.position.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'position_name' => 'required|string|max:255',
            'position_code' => 'required|string|max:10',
            'description' => 'nullable|string',
        ]);

        Position::create($request->all());

        return redirect()->route('position.index')->with('success', 'Position created successfully.');
    }

    public function edit($id)
    {
        $position = Position::findOrFail($id);
        return view('admin.position.edit', compact('position'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'position_name' => 'required|string|max:255',
            'position_code' => 'required|string|max:10',
            'description' => 'nullable|string',
        ]);

        $position = Position::findOrFail($id);
        $position->update($request->all());

        return redirect()->route('position.index')->with('success', 'Position updated successfully.');
    }
    public function destroy($id)
    {
        $position = Position::findOrFail($id);
        $position->delete();

        return redirect()->route('position.index')->with('success', 'Position deleted successfully.');
    }
}
