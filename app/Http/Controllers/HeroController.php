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
        $request->validate([
            'title' => 'nullable|string|max:255',
            'subtitles' => 'nullable|string|max:255',
            'background_image' => 'nullable|image|max:2048',
            'delete_image' => 'nullable|boolean',
        ]);

        $hero = Hero::first();

        if (! $hero) {
            $hero = new Hero;
        }

        $hero->title = $request->title;
        $hero->subtitles = $request->subtitles;

        // handle image upload
        if ($request->delete_image) {
            if ($hero->background_image && Storage::exists($hero->background_image)) {
                Storage::delete($hero->background_image);
            }
            $hero->background_image = null;
        } elseif ($request->hasFile('background_image')) {
            if ($hero->background_image && Storage::exists($hero->background_image)) {
                Storage::delete($hero->background_image);
            }
            $path = $request->file('background_image')->store('hero-images', 'public');
            $hero->background_image = $path;
        }

        $hero->save();

        return redirect('dashboard')->with('success', 'Hero section updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hero = Hero::findOrFail($id);

        // Delete the background image from storage
        if ($hero->background_image && Storage::exists($hero->background_image)) {
            Storage::delete($hero->background_image);
        }

        // Delete the hero record
        $hero->delete();

        return redirect()->route('dashboard')->with('success', 'Hero section deleted successfully!');
    }
}
