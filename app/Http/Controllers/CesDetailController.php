<?php

namespace App\Http\Controllers;

use App\Models\CesDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CesDetailController extends Controller
{
    public function form()
    {
        $detail = CesDetail::first(); // Load existing record or null

        return view('admin.view.cesDetailEdit', compact('detail'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'dao_registration_number' => 'required|string|max:255',
            'established_date' => 'required|date',
            'swc_affiliation_number' => 'nullable|string|max:255',
            'pan_number' => 'nullable|string|max:255',
            'founding_members' => 'required|integer|min:1',
            'total_members' => 'required|integer|min:1',
        ]);

        CesDetail::create($validated);

        return redirect()->route('dashboard')->with('success', 'CES details added successfully!');
    }

    public function update(Request $request, CesDetail $detail)
    {
        $validated = $request->validate([
            'dao_registration_number' => 'required|string|max:255',
            'established_date' => 'required|date',
            'swc_affiliation_number' => 'nullable|string|max:255',
            'pan_number' => 'nullable|string|max:255',
            'founding_members' => 'required|integer|min:1',
            'total_members' => 'required|integer|min:1',
        ]);

        try {
            $detail->update($validated);
            Log::info('CES details updated successfully.', [
                'input' => $request->all(),
                'ces_detail_id' => $detail->id,
            ]);

            return redirect()->route('dashboard')->with('success', 'CES details updated successfully!');
        } catch (\Exception $e) {
            Log::error('Validation failed in CesDetail update', [
                'errors' => $e->errors(),
                'input' => $request->all(),
                'ces_detail_id' => $detail->id,
            ]);

            return redirect()->route('dashboard')->with('success', 'CES details updated successfully!');
        }

    }
}
