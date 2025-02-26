<?php

namespace App\Http\Controllers;

use App\Models\SeoPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\ValidationException;

class SeoPageController
{
    public function __construct()
    {
        try {
            $seoPages = SeoPage::all();
            View::share('seoPages', $seoPages);
        } catch (\Throwable $th) {
            View::share('seoPages', []);
        }
    }

    // Fetch all SEO pages for the home page
    public function index()
    {
        return view('home');
    }

    // Fetch all SEO pages for the dashboard
    public function dashboard()
    {
        return view('dashboard.seopages');
    }

    // Create a new SEO Page
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'seopage'         => 'required|string|unique:seopages,seopage',
                'title'           => 'nullable|string|max:255',
                'meta_description'=> 'nullable|string',
                'meta_keywords'   => 'nullable|string',
                'author'          => 'nullable|string|max:100',
            ]);

            SeoPage::create($validatedData);

            return redirect()->route('dashboard.seopages')->with('success', 'SEO Page created successfully');
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors());
        }
    }

    // Show SEO page details (JSON response)
    public function show($id)
    {
        $seoPage = SeoPage::find($id);
        if (!$seoPage) {
            return response()->json(['error' => 'SEO Page not found'], 404);
        }
        return response()->json($seoPage);
    }

    public function getByIds($id)
    {
        $seoPage = SeoPage::findOrFail($id);
        return view('Createandupdate.updateseo', compact('seoPage'));
    }

    // Update SEO Page
    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'seopage'         => 'required|string|unique:seopages,seopage,' . $id,
                'title'           => 'nullable|string|max:255',
                'meta_description'=> 'nullable|string',
                'meta_keywords'   => 'nullable|string',
                'author'          => 'nullable|string|max:100',
            ]);

            $seoPage = SeoPage::find($id);
            if (!$seoPage) {
                return back()->withErrors(['message' => 'SEO Page not found']);
            }

            $seoPage->update($validatedData);
            return redirect()->route('dashboard.seo')->with('success', 'SEO Page updated successfully');
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors());
        }
    }

    // Delete an SEO Page
    public function destroy($id)
    {
        $seoPage = SeoPage::find($id);
        if (!$seoPage) {
            return back()->withErrors(['message' => 'SEO Page not found']);
        }

        $seoPage->delete();
        return redirect()->route('dashboard.seopages')->with('success', 'SEO Page deleted successfully');
    }
}
