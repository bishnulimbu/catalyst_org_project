<?php

namespace App\Http\Controllers;

use App\Models\Objective;
use Illuminate\Http\Request;

class ObjectiveController extends Controller
{
    public function edit()
    {
        $objective = Objective::first();
        return view('objective.edit', compact('objective'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);
        Objective::updateOrCreate(
            ['id' => 1],
            $request->only(['content'])
        );
        return redirect()->route('dashboard')->with('success', 'Objective Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
