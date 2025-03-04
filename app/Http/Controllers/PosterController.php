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
    // Delete old image (only if it exists)
    if ($poster->image && file_exists(public_path('posters/' . $poster->image))) {
        unlink(public_path('posters/' . $poster->image));
    }

    // Generate a unique file name
    $imageName = time() . '.' . $request->image->getClientOriginalExtension();

    // Move the new file to the public/posters directory
    $request->image->move(public_path('posters'), $imageName);

    // Save only the file name in the database
    $poster->image = $imageName;
}

    
        $poster->save();
    
        return redirect()->back()->with('success', 'Poster updated successfully!');
    }
}
