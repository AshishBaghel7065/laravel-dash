<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ServiceCategoryController 
{
    public function getAll()
    {
        // Fetch all service categories
        $categories = ServiceCategory::all();

        // Return the dashboard view with categories
        return view('Createandupdate.addservice', compact('categories'));
    }
    public function getAll2()
    {
        // Fetch all service categories
        $categories = ServiceCategory::all();

        // Return the dashboard view with categories
        return view('Createandupdate.addservicecategory', compact('categories'));
    }

    public function create(Request $request)
    {
        // Validate request and ensure title is unique
        $request->validate([
            'title' => ['required', 'string', 'max:255', Rule::unique('service_category', 'title')]
        ]);

        $lowercaseTitle = strtolower($request->title);

        // Create new service category
        ServiceCategory::create(['title' => $lowercaseTitle]);

        return redirect()->back()->with('success', 'Service category created successfully.');
    }

    public function delete($id)
    {
        $category = ServiceCategory::find($id);

        if (!$category) {
            return response()->json(['success' => false, 'message' => 'Category not found'], 404);
        }

        $category->delete();

        return response()->json(['success' => true, 'message' => 'Service category deleted successfully']);
    }
}
