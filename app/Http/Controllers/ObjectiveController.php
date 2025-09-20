<?php

namespace App\Http\Controllers;

use App\Models\Objective;
use Illuminate\Http\Request;

class ObjectiveController extends Controller
{
    // Show the form for creating a new objective
    public function create()
    {
        return view('admin.view.objectiveCreate');
    }

    // Store a newly created objective in the database
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:255',
            'logo' => 'nullable|string|max:100',
        ]);

        Objective::create([
            'content' => $request->content,
            'logo' => $request->logo ?? 'target', // default if not selected
        ]);

        return redirect()->route('dashboard')->with('success', 'Objective created successfully!');
    }

    // Show the form for editing a specific objective
    public function edit(Objective $objective)
    {
        return view('admin.view.objectiveEdit', compact('objective'));
    }

    // Update the specified objective in the database
    public function update(Request $request, Objective $objective)
    {
        $request->validate([
            'content' => 'required|string|max:255',
            'logo' => 'nullable|string|max:100',
        ]);

        $objective->update([
            'content' => $request->content,
            'logo' => $request->logo ?? 'target', // handle default
        ]);

        return redirect()->route('objectives.index')->with('success', 'Objective updated successfully!');
    }

    // Remove the specified objective from the database
    public function destroy(Objective $objective)
    {
        $objective->delete();

        return redirect()->route('dashboard')->with('success', 'Objective deleted successfully!');
    }
}