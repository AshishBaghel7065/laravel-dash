<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\ValidationException;


class ReviewController
{
    public function __construct()
    {
        try {
            $reviews = Review::all();
            View::share('reviews', $reviews); // Share reviews globally
        } catch (\Throwable $th) {
            View::share('reviews', []);
        }
    }

    // Create Review and redirect to the dashboard with image upload
    public function createReview(Request $request)
    {
        try {
            // Validate the input data
            $validatedData = $request->validate([
                'username' => 'required|string',
                'posted_date' => 'required|date',
                'review' => 'required|string',
                'stars' => 'required|integer|min:1|max:5', // Rating between 1 and 5
                'user_image' => 'nullable|image|mimes:webp,jpeg,png,jpg,gif,svg|max:2048', // Image validation
            ]);

           // Handle the file upload
if ($request->hasFile('user_image')) {
    // Generate a unique file name
    $imageName = time() . '.' . $request->user_image->getClientOriginalExtension();

    // Move the file to the public/reviews directory
    $request->user_image->move(public_path('reviews'), $imageName);

    // Save only the file name in the database
    $validatedData['user_image'] = $imageName;
}

            // Create the review with the validated data
            Review::create($validatedData);

            return redirect()->route('dashboard.review')->with('success', 'Review created successfully');
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors());
        }
    }

  // Update Review with Image Upload
public function updateReview(Request $request, $id)
{
    $validated = $request->validate([
        'username' => 'required|string|max:255',
        'posted_date' => 'required|date',
        'stars' => 'required|integer|between:1,5',
        'review' => 'required|string|max:500',
        'user_image' => 'nullable|image|mimes:webp,jpeg,png,jpg,gif|max:2048',
    ]);

    $review = Review::find($id);

    if ($review) {
        $review->username = $request->username;
        $review->posted_date = $request->posted_date;
        $review->stars = $request->stars;
        $review->review = $request->review;

        // Handle the file upload
        if ($request->hasFile('user_image')) {
            // Generate a unique file name
            $imageName = time() . '.' . $request->user_image->getClientOriginalExtension();

            // Move the file to the public/reviews directory
            $request->user_image->move(public_path('reviews'), $imageName);

            // Delete old image if it exists
            if ($review->user_image && file_exists(public_path('reviews/' . $review->user_image))) {
                unlink(public_path('reviews/' . $review->user_image));
            }

            // Save only the new image name in the database
            $review->user_image = $imageName;
        }

        $review->save();

        return redirect()->route('dashboard.review')->with('success', 'Review updated successfully!');
    }

    return back()->with('error', 'Review not found!');
}


    public function getByIds($id)
    {
        $review = Review::findOrFail($id);
        return view('Createandupdate.updatereview', compact('review'));
    }

    public function getById($id)
    {
        $review = Review::find($id);
    
        if (!$review) {
            return response()->json(['error' => 'Service not found'], 404);
        }
    
        return response()->json($review);
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();
    
        // Absolute path redirection
        return redirect('/dashboard/review')->with('success', 'Service deleted successfully.');
    }

}
