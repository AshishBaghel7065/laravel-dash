<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poster;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View; // Import View facade

class PosterController 
{
    public function __construct()
    {
        try {
            $posters = Poster::all();
            View::share('posters', $posters); // Share with all views rendered by this controller
        } catch (\Throwable $th) {
            View::share('dashboard.other', []);
        }
    }

    public function update(Request $request, $id)
    {
        $poster = Poster::findOrFail($id);
    
        // Validate input
        $request->validate([
            'postername' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:webp,jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Update poster name
        $poster->postername = $request->postername;
    
        // If new image is uploaded, update it
        if ($request->hasFile('image')) {
            // Delete old image
            Storage::delete('public/' . $poster->image);
    
            // Store new image
            $path = $request->file('image')->store('posters', 'public');
            $poster->image = $path;
        }
    
        $poster->save();
    
        return redirect()->back()->with('success', 'Poster updated successfully!');
    }
}
