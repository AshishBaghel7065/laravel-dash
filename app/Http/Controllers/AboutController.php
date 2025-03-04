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
            $updateAbout = About::all();
            View::share('updateAbout', $updateAbout); // Share UpdateAbout globally
        } catch (\Throwable $th) {
            View::share('updateAbout', []);
        }
    }

    public function getDashboardUpdateAbout()
    {
        $updateAbout = About::all();
        return redirect()->route('dashboard.updateabout')->with('success', 'About Data Get successfully');
    }

    public function createUpdateAboutForm()
    {
        return view('Createandupdate.addupdateabout');
    }

    public function createUpdateAbout(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'image' => 'required|image|mimes:webp,jpeg,png,jpg,gif|max:2048',
                'description' => 'required|string',
                'active' => 'required|boolean',
            ]);
if ($request->hasFile('image')) {
    // Generate a unique filename
    $imageName = time() . '.' . $request->image->getClientOriginalExtension();

    // Move the file to the public/updateabout directory
    $request->image->move(public_path('updateabout'), $imageName);

    // Store only the filename in the database
    $validatedData['image'] = $imageName;
}


            About::create($validatedData);

            return redirect()->route('dashboard.about')->with('success', 'About data created successfully');
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors());
        }
    }

    public function edit($id)
    {
        $updateAbout = About::findOrFail($id);
        return view('Createandupdate.updateupdateabout', compact('updateAbout'));
    }

public function update(Request $request, $id)
{
    $updateAbout = About::findOrFail($id);

    $request->validate([
        'title' => 'required|string',
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:webp,jpeg,png,jpg,gif,svg|max:2048',
        'active' => 'required|boolean',
    ]);

    // Handle Image Update
    if ($request->hasFile('image')) {
        // Delete old image if it exists
        if ($updateAbout->image && file_exists(public_path('updateabout/' . $updateAbout->image))) {
            unlink(public_path('updateabout/' . $updateAbout->image));
        }

        // Generate a unique filename
        $imageName = time() . '.' . $request->image->getClientOriginalExtension();

        // Move the file to the public/updateabout directory
        $request->image->move(public_path('updateabout'), $imageName);

        // Save the new image filename in the database
        $updateAbout->image = $imageName;
    }

    // Update other fields
    $updateAbout->title = $request->title;
    $updateAbout->description = $request->description;
    $updateAbout->active = $request->active;
    
    $updateAbout->save();

    return redirect()->route('dashboard.about')->with('success', 'About Data updated successfully!');
}


    public function destroy($id)
    {
        $updateAbout = About::findOrFail($id);
        $updateAbout->delete();

        return redirect('/dashboard/about')->with('success', 'About data deleted successfully.');
    }

    public function getByIds($id)
    {
        $updateAbout = About::find($id);

        if (!$updateAbout) {
            return response()->json(['error' => 'About data not found'], 404);
        }

        return response()->json($updateAbout);
    }
    public function getById($id)
    {
        // Fetch the service by ID
        $updateAbout = About::findOrFail($id);
        // Return the view with the service data
        return view('Createandupdate.updateabout', compact('updateAbout'));
    }
}
