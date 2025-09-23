<?php

namespace App\Http\Controllers;

use App\Models\ContactDetail;
use Illuminate\Http\Request;

class ContactDetailController extends Controller
{
    public function form()
    {
        $detail = ContactDetail::first(); // Load existing record or null

        return view('admin.view.contactDetailEdit', compact('detail'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'website' => 'nullable|url',
            'email' => 'nullable|email',
            'phones' => 'nullable|array',
            'phones.*' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
        ]);

        // Prepend https:// to website if missing
        if (! empty($validated['website']) && ! preg_match('~^https?://~', $validated['website'])) {
            $validated['website'] = 'https://'.$validated['website'];
        }

        // Ensure phones is an array and filter out empty values
        $validated['phones'] = array_filter(array_map('trim', (array) $validated['phones']));

        ContactDetail::create($validated);

        return redirect()->route('dashboard')->with('success', 'Contact details added successfully!');
    }

    public function update(Request $request, ContactDetail $detail)
    {
        $validated = $request->validate([
            'website' => 'nullable|url',
            'email' => 'nullable|email',
            'phones' => 'nullable|array',
            'phones.*' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
        ]);

        // Prepend https:// to website if missing
        if (! empty($validated['website']) && ! preg_match('~^https?://~', $validated['website'])) {
            $validated['website'] = 'https://'.$validated['website'];
        }

        // Ensure phones is an array and filter out empty values
        $validated['phones'] = array_filter(array_map('trim', (array) $validated['phones']));

        $detail->update($validated);

        return redirect()->route('dashboard')->with('success', 'Contact details updated successfully!');
    }
}
