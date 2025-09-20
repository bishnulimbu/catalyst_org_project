<?php

namespace App\Http\Controllers;

use App\Models\Scope;
use Illuminate\Http\Request;

class ScopeController extends Controller
{
    public function create()
    {
        return view('admin.view.scopeCreate');
    }

    // Store new scope
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'link'  => 'nullable|url',
        ]);

        Scope::create($request->only('title', 'link'));

        return redirect()->route('dashboard')->with('success', 'Scope added successfully!');
    }

    // Edit form
    public function edit(Scope $scope)
    {
        return view('admin.view.scopeEdit', compact('scope'));
    }

    // Update
    public function update(Request $request, Scope $scope)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'link'  => 'nullable|url',
        ]);

        $scope->update($request->only('title', 'link'));

        return redirect()->route('dashboard')->with('success', 'Scope updated successfully!');
    }

    // Delete
    public function destroy(Scope $scope)
    {
        $scope->delete();
        return redirect()->route('dashboard')->with('success', 'Scope deleted successfully!');
    }
}