<?php

namespace App\Http\Controllers;

use App\Models\Objective;
use Illuminate\Http\Request;

class ObjectiveController extends Controller
{
    // Show all objectives (index page)
    // public function index()
    // {
    //     $objectives = Objective::latest()->paginate(10); // paginate if many
    //     return view('admin.view.objectiveIndex', compact('objectives'));
    // }

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
        ]);

        Objective::create($request->only('content'));

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
        ]);

        $objective->update($request->only('content'));

        return redirect()->route('objectives.index')->with('success', 'Objective updated successfully!');
    }

    // Remove the specified objective from the database
    public function destroy(Objective $objective)
    {
        $objective->delete();

        return redirect()->route('dashboard')->with('success', 'Objective deleted successfully!');
    }
}
