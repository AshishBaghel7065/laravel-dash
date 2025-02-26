<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController 
{
    /**
     * Get all blog categories.
     */
    public function getAll()
    {
        $categories = BlogCategory::all();
        return response()->json($categories);
    }

    /**
     * Create a new blog category.
     */
    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $category = BlogCategory::create([
            'title' => $request->title,
        ]);

        return response()->json(['message' => 'Category created successfully', 'category' => $category]);
    }

    /**
     * Delete a blog category.
     */
    public function delete($id)
    {
        $category = BlogCategory::find($id);

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        $category->delete();
        return response()->json(['message' => 'Category deleted successfully']);
    }
}
