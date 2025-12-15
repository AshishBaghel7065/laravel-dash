<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductCategoryController 
{
    public function getAll()
    {
        // Fetch all product categories
        $categories = ProductCategory::all();

        // Return the dashboard view with product categories
        return view('Createandupdate.addproduct', compact('categories'));
    }
    
    public function getAll2()
    {
        // Fetch all product categories
        $categories = ProductCategory::all();

        // Return the dashboard view with product categories
        return view('Createandupdate.addproductcategory', compact('categories'));
    }
    public function getAll3()
    {
        // Fetch all product categories
        $categories = ProductCategory::all();

        // Return the dashboard view with product categories
        return view('Createandupdate.updateproduct', compact('categories'));
    }

    public function create(Request $request)
    {
        // Validate request and ensure category_title is unique
        $request->validate([
            'category_title' => ['required', 'string', 'max:255', Rule::unique('product_category', 'category_title')]
        ]);

        // Create new product category
        ProductCategory::create([
            'category_title' => strtolower($request->category_title)
        ]);

        return redirect()->back()->with('success', 'Product category created successfully.');
    }

    public function delete($id)
    {
        $category = ProductCategory::find($id);

        if (!$category) {
            return response()->json(['success' => false, 'message' => 'Product category not found'], 404);
        }

        $category->delete();

        return response()->json(['success' => true, 'message' => 'Product category deleted successfully']);
    }
}
