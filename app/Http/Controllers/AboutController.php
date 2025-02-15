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
        return redirect()->route('dashboard.updateabout')->with('success', 'UpdateAbout data loaded successfully');
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
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'description' => 'required|string',
                'active' => 'required|boolean',
            ]);

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('updateabout', 'public');
                $validatedData['image'] = $imagePath;
            }

            About::create($validatedData);

            return redirect()->route('dashboard.about')->with('success', 'UpdateAbout data created successfully');
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'active' => 'required|boolean',
        ]);

        if ($request->hasFile('image')) {
            $imageName = $request->image->store('updateabout_images', 'public');
            $updateAbout->image = $imageName;
        }

        $updateAbout->title = $request->title;
        $updateAbout->description = $request->description;
        $updateAbout->active = $request->active;
        $updateAbout->save();

        return redirect()->route('dashboard.about')->with('success', 'UpdateAbout section updated successfully!');
    }

    public function destroy($id)
    {
        $updateAbout = About::findOrFail($id);
        $updateAbout->delete();

        return redirect('/dashboard/about')->with('success', 'UpdateAbout data deleted successfully.');
    }

    public function getByIds($id)
    {
        $updateAbout = About::find($id);

        if (!$updateAbout) {
            return response()->json(['error' => 'UpdateAbout data not found'], 404);
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
