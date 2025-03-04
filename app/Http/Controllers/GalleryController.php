<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class GalleryController
{
    public function __construct()
    {
        try {
            $galleries = Gallery::all();
            View::share('galleries', $galleries); // Share gallery images globally
        } catch (\Throwable $th) {
            View::share('galleries', []);
        }
    }

    // Display all images in the gallery page
    public function index()
    {
        return view('dashboard.gallery');
    }

    // Show the form for uploading a new image
    public function create()
    {
        return view('gallery.create');
    }

    // Store an uploaded image
   public function store(Request $request)
{
    try {
        $request->validate([
            'image' => 'required|image|mimes:webp,jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Generate a unique file name
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();

            // Move the file to the public/gallery directory
            $request->image->move(public_path('gallery'), $imageName);

            // Save only the file name in the database
            Gallery::create(['image' => $imageName]);

            return redirect('dashboard/gallery')->with('success', 'Image uploaded successfully!');
        }

        return back()->withErrors(['message' => 'Image upload failed!']);
    } catch (ValidationException $e) {
        return back()->withErrors($e->errors());
    }
}

    // Delete an image
    public function destroy($id, Request $request)
    {
        $gallery = Gallery::find($id);
    
        if (!$gallery) {
            return $request->ajax()
                ? response()->json(['success' => false, 'message' => 'Image not found'], 404)
                : back()->withErrors(['message' => 'Image not found']);
        }
    
        // Delete image from storage
        Storage::disk('public')->delete($gallery->image);
    
        // Delete record from database
        $gallery->delete();
    
        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Image deleted successfully!']);
        }
    
        return redirect()->route('dashboard.gallery')->with('success', 'Image deleted successfully!');
    }
    

  
}
