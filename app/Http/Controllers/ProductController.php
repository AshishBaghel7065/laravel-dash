<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;

class ProductController
{
    public function __construct()
    {
        try {
            $products = Product::all();
            View::share('products', $products); // Share Products globally
        } catch (\Throwable $th) {
            View::share('products', []);
        }
    }

    // Get all products and redirect to the dashboard
    public function getDashboardProducts()
    {
        return redirect()->route('dashboard.product')->with('success', 'Products loaded successfully');
    }

    // Show form to create a new product
    public function createProductForm()
    {
        return view('Createandupdate.addproduct');
    }

    // Create a new product and redirect to the dashboard
    public function createProduct(Request $request)
    {
        
        
        try {
            // Validate the request
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'price' => 'required|numeric',
                'product_image' => 'required|image|mimes:webp,jpeg,png,jpg,gif|max:2048',
                'category' => 'required|string|max:255',
                'description' => 'required|string',
            ]);

                    // Handle the file upload
if ($request->hasFile('product_image')) {
    // Generate a unique file name
    $imageName = time() . '.' . $request->product_image->getClientOriginalExtension();

    // Move the file to the public/reviews directory
    $request->product_image->move(public_path('products'), $imageName);

    // Save only the file name in the database
    $validatedData['product_image'] = $imageName;
}

            // Generate a unique product slug
            $validatedData['product_slug'] = Str::slug($validatedData['name']);

            // Create the product record
            Product::create($validatedData);

            return redirect()->route('dashboard.product')->with('success', 'Product created successfully');
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors());
        }
    }

    // Update an existing product
    public function updateProduct(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'string|max:255',
            'price' => 'numeric',
            'category' => 'string|max:255',
            'image' => 'image|mimes:webp,jpeg,png,jpg,gif|max:2048',
            'description' => 'string',
        ]);

        $product = Product::findOrFail($id);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->description = $request->description;

      
                    // Handle the file upload
if ($request->hasFile('product_image')) {
    // Generate a unique file name
    $imageName = time() . '.' . $request->product_image->getClientOriginalExtension();

    // Move the file to the public/reviews directory
    $request->product_image->move(public_path('products'), $imageName);

    // Save only the file name in the database
    $validatedData['product_image'] = $imageName;
}

        $product->save();

        return redirect()->route('dashboard.product')->with('success', 'Product updated successfully!');
    }

    // Delete a product
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image && file_exists(public_path('products/' . $product->image))) {
            unlink(public_path('products/' . $product->image));
        }

        $product->delete();

        return redirect('/dashboard/product')->with('success', 'Product deleted successfully.');
    }

    // Get a product by ID
    public function getById($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        return response()->json($product);
    }

    // Show the form to edit an existing product
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('Createandupdate.updateproduct', compact('product'));
    }

    // Get product by slug
    public function getProductBySlug($name)
    {
        $productSlug = Str::slug($name);
        $product = Product::whereRaw("LOWER(REPLACE(name, ' ', '-')) = ?", [$productSlug])->firstOrFail();

        return view('eventpage', compact('product'));
    }
}
