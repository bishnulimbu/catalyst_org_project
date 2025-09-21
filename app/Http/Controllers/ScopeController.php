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
        // Preprocess link to handle inputs like "example.com"
        $link = $request->input('link');
        if (! empty($link) && ! preg_match('~^https?://~', $link)) {
            $request->merge(['link' => 'https://'.$link]);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'link' => 'nullable|url',
        ]);

        Scope::create($validated);

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
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'link' => 'nullable|url',
        ]);

        // If link is provided and missing http/https, prepend https://
        if (! empty($validated['link']) && ! preg_match('~^https?://~', $validated['link'])) {
            $validated['link'] = 'https://'.$validated['link'];
        }

        $scope->update($validated);

        return redirect()->route('dashboard')->with('success', 'Scope updated successfully!');
    }

    // Delete
    public function destroy(Scope $scope)
    {
        $scope->delete();

        return redirect()->route('dashboard')->with('success', 'Scope deleted successfully!');
    }
}
