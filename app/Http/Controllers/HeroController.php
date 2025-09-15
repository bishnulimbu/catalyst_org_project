<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $hero = Hero::first(); // adjust if you have multiple heroes

        $data = $request->validate([
            'title' => 'nullable|string|max:255',
            'subtitles' => 'nullable|string|max:255',
            'background_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('background_image')) {
            // Delete old image
            if ($hero && $hero->background_image && Storage::disk('public')->exists($hero->background_image)) {
                Storage::delete('public' . $hero->background_image);
            }

            // Store new image
            $data['background_image'] = $request->file('background_image')->store('hero', 'public');
        }

        // Handle delete request
        if ($request->input('delete_image')) {
            if ($hero && $hero->background_image && Storage::disk('public')->exists($hero->background_image)) {
                Storage::delete('public' . $hero->background_image);
            }
            $data['background_image'] = null;
        }

        $hero->update($data);

        return redirect('dashboard')->with('success', 'Hero section updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
