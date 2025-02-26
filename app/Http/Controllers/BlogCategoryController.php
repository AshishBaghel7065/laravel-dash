<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BlogCategoryController 
{
    public function getAll()
    {
        // Fetch all blog categories
        $Blogcategories = BlogCategory::all();

        // Return the dashboard view with categories
        return view('Createandupdate.addblog', compact('Blogcategories'));
    }
    public function getAll2()
    {
        // Fetch all blog categories
        $Blogcategories = BlogCategory::all();

        // Return the dashboard view with categories
        return view('Createandupdate.addblogcategory', compact('Blogcategories'));
    }

    public function create(Request $request)
    {
        // Validate request and ensure title is unique
        $request->validate([
            'title' => ['required', 'string', 'max:255', Rule::unique('blog_category', 'title')]
        ]);

        $lowercaseTitle = strtolower($request->title);

        // Create new blog category
        BlogCategory::create(['title' => $lowercaseTitle]);

        return redirect()->back()->with('success', 'Blog category created successfully.');
    }

    public function delete($id)
    {
        $category = BlogCategory::find($id);

        if (!$category) {
            return response()->json(['success' => false, 'message' => 'Category not found'], 404);
        }

        $category->delete();

        return response()->json(['success' => true, 'message' => 'Blog category deleted successfully']);
    }
}
