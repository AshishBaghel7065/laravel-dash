<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\ValidationException;

class BlogController 
{
    public function __construct()
    {
        try {
            $blogs = Blog::all();
            View::share('blogs', $blogs); // Share Blogs globally
        } catch (\Throwable $th) {
            View::share('blogs', []);
        }
    }

    // Get all blogs and redirect to the dashboard
    public function getDashboardBlogs()
    {
        $blogs = Blog::all(); // Adjust query as needed
        return redirect()->route('dashboard.blog')->with('success', 'Blogs loaded successfully');
    }

    // Show form to create a new blog
    public function createBlogForm()
    {
        return view('Createandupdate.addblog');
    }

    // Create a new blog and redirect to the dashboard
    public function createBlog(Request $request)
    {
        try {
            // Validate the request
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'image' => 'required|image|mimes:webp,jpeg,png,jpg,gif|max:2048',
                'category' => 'required|string|max:255',
                'description' => 'required|string',
                'publish' => 'required|date',
                'active' => 'required|boolean',
                'slug' => 'required|string|max:255|unique:blogs,slug',
                'meta_keywords' => 'nullable|string',
                'meta_description' => 'nullable|string',
                'meta_tags' => 'string',
            ]);
            
    
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('blogs', 'public');
                $validatedData['image'] = $imagePath;
            }
    
            Blog::create($validatedData);
    
            return redirect()->route('dashboard.blog')->with('success', 'Blog created successfully');
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors());
        }
    }

    public function updateBlog(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'string|max:255',
            'category' => 'string|max:255',
            'image' => 'image|mimes:webp,jpeg,png,jpg,gif|max:2048',
            'active' => 'boolean',
            'description' => 'string',
            'publish' => 'date',
            'slug' => 'string|max:255|unique:blogs,slug,'.$id,
            'meta_keywords' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'meta_tags' => 'nullable|string',
        ]);
    
        $blog = Blog::findOrFail($id);
        $blog->fill($validated);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blogs', 'public');
            $blog->image = $imagePath;
        }

        $blog->save();
    
        return redirect()->route('dashboard.blog', $blog->id)->with('success', 'Blog updated successfully!');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
    
        return redirect('dashboard/blog')->with('success', 'Blog deleted successfully.');
    }

    public function getById($id)
    {
        $blog = Blog::find($id);
    
        if (!$blog) {
            return response()->json(['error' => 'Blog not found'], 404);
        }
    
        return response()->json($blog);
    }

        public function getByIds($id)
        {
            $blog = Blog::findOrFail($id);
            return view('Createandupdate.updateblog', compact('blog'));
        }

        public function edit($id)
        {
            $blog = Blog::findOrFail($id);
            return view('Createandupdate.updateblog', compact('blog'));
        }
}

