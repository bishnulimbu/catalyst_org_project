<?php

namespace App\Http\Controllers;

use App\Models\CesDetail;
use Illuminate\Http\Request;

class CesDetailController extends Controller
{
    public function index()
    {
        $detail = CesDetail::first(); // only one record expected
        return view('dashboard', compact('detail'));
    }

    public function edit(CesDetail $cesDetail)
    {
        return view('admin.view.cesDetailEdit', compact('cesDetail'));
    }

    public function update(Request $request, CesDetail $cesDetail)
    {
        $validated = $request->validate([
            'dao_registration_number' => 'nullable|string|max:255',
            'established_date'        => 'nullable|string|max:255',
            'swc_affiliation_number'  => 'nullable|string|max:255',
            'pan_number'              => 'nullable|string|max:255',
            'founding_members'        => 'nullable|integer',
            'total_members'           => 'nullable|integer',
        ]);

        $cesDetail->update($validated);

        return redirect()->route('dashboard')->with('success', 'CES Details updated successfully!');
    }
}