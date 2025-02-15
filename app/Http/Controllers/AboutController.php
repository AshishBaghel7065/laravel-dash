<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\ValidationException;

class AboutController 
{
    public function __construct()
    {
        try {
            $about = About::all();
            View::share('about', $about); // Share About globally
        } catch (\Throwable $th) {
            View::share('about', []);
        }
    }

    // Get all about data and redirect to the dashboard
    public function getDashboardAbout()
    {
        $about = About::all(); // Adjust query as needed
        return redirect()->route('dashboard.about')->with('success', 'About data loaded successfully');
    }

    // Show form to create new about data
    public function createAboutForm()
    {
        return view('Createandupdate.addabout');
    }

    // Create new about data and redirect to the dashboard
    public function createAbout(Request $request)
    {
        try {
            // Validate the request
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Image validation
                'description' => 'required|string',
                'active' => 'required|boolean',
            ]);
    
            // Handle Image Upload
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('about', 'public');
                $validatedData['image'] = $imagePath;
            }
    
            // Create the about record
            About::create($validatedData);
    
            return redirect()->route('dashboard.about')->with('success', 'About data created successfully');
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors());
        }
    }

    // Show form to edit an existing about data
    public function edit($id)
    {
        $about = About::findOrFail($id);
        return view('Createandupdate.updateabout', compact('about'));
    }

    // Update an existing about data and redirect to the dashboard
    public function update(Request $request, $id)
    {
        $about = About::findOrFail($id);
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'active' => 'required|boolean',
        ]);
    
        if ($request->hasFile('image')) {
            // Handle image upload
            $imageName = $request->image->store('about_images', 'public');
            $about->image = $imageName;
        }
    
        $about->title = $request->title;
        $about->description = $request->description;
        $about->active = $request->active;
        $about->save();
    
        return redirect()->route('dashboard.about.index')->with('success', 'About section updated successfully!');
    }
    
    // Delete about data
    public function destroy($id)
    {
        $about = About::findOrFail($id);
        $about->delete();
    
        // Absolute path redirection
        return redirect('/dashboard/about')->with('success', 'About data deleted successfully.');
    }

    // Get about data by ID
    public function getById($id)
    {
        $about = About::find($id);
    
        if (!$about) {
            return response()->json(['error' => 'About data not found'], 404);
        }
    
        return response()->json($about);
    }

    public function getByIds($id)
    {
        $about = About::findOrFail($id);
        return view('Createandupdate.updateabout', compact('about'));
    }
    
}
