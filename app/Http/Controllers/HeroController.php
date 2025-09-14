<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    public function edit()
    {
        $hero = Hero::first();
        return view('admin.view.heroEdit', compact('hero'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitles' => 'nullable|string|max:255',
            'background_image' => "nullable|string|max|255",
        ]);
        Hero::updateOrCreate(
            ['id' => 1],
            $request->only(['title', 'subtitles', 'background_image'])
        );
        return redirect()->route('dashboard')->with('success', 'Hero Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
