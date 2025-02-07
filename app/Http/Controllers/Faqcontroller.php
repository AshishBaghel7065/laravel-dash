<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\ValidationException;

class FaqController
{
    public function __construct()
    {
        try {
            $faqs = Faq::all();
            View::share('faqs', $faqs); // Share FAQs globally
        } catch (\Throwable $th) {
            View::share('faqs', []);
        }
    }

    // Fetch all FAQs for the home page
    public function getAllFaqs()
    {
        return view('home'); // No need to pass $faqs manually
    }

    // Fetch all FAQs for the dashboard
    public function getDashboardFaqs()
    {
        return view('dashboard.faq'); // No need to pass $faqs manually
    }

    // Create FAQ and redirect to the dashboard
    public function createFaq(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'question' => 'required|string',
                'answer' => 'required|string',
                'written_by' => 'required|string',
            ]);

            Faq::create($validatedData);
            return redirect()->route('dashboard.faq')->with('success', 'FAQ created successfully');
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors());
        }
    }

    public function updateFaq(Request $request, $id)
    {
        try {
            // Validate the input data
            $validatedData = $request->validate([
                'question' => 'required|string|max:255',
                'answer' => 'required|string',
                'written_by' => 'required|string|max:100',
            ]);
    
            // Find the FAQ by ID
            $faq = Faq::find($id);
            if (!$faq) {
                return back()->withErrors(['message' => 'FAQ not found']);
            }
    
            // Update FAQ details
            $faq->update($validatedData);
    
            // Redirect with success message
            return redirect()->route('dashboard.faq')->with('success', 'FAQ updated successfully');
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors());
        }
    }
    
    public function deleteFaq($id)
    {
        $faq = Faq::find($id);
    
        if (!$faq) {
            return back()->withErrors(['message' => 'FAQ not found']);
        }
    
        $faq->delete();
    
        return redirect()->route('dashboard.faq')->with('success', 'FAQ deleted successfully');
    }
    public function getById($id)
    {
        $faq = Faq::find($id);
    
        if (!$faq) {
            return response()->json(['error' => 'FAQ not found'], 404);
        }
    
        return response()->json($faq);
    }
    
    public function edit($id)
    {
        // Find the FAQ by ID
        $faq = Faq::find($id);
    
        // Check if the FAQ exists
        if (!$faq) {
            return redirect()->route('dashboard.faq')->withErrors(['message' => 'FAQ not found']);
        }
    
        // Return the edit view with FAQ data
        return view('Createandupdate.updatefaq', compact('faq'));
    }
    

    

}

