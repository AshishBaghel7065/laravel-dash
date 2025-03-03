<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SocialLink;

class SocialLinkController
{
    /**
     * Display a listing of social links.
     */
    public function index()
    {
        $socialLinks = SocialLink::all();
        return view('sociallink.index', compact('socialLinks'));
    }

    /**
     * Store a newly created social link in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'link' => 'required|url|max:255'
        ]);

        SocialLink::create([
            'name' => $request->name,
            'link' => $request->link,
        ]);

        return redirect()->route('social-links.index')->with('success', 'Social link added successfully.');
    }

    /**
     * Update the specified social link.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'link' => 'required|url|max:255'
        ]);

        $socialLink = SocialLink::findOrFail($id);
        $socialLink->update([
            'name' => $request->name,
            'link' => $request->link,
        ]);

        return redirect()->route('dashboard.otherpage')->with('success', 'Social link deleted successfully.');
    }

    /**
     * Remove the specified social link.
     */
    public function destroy($id)
    {
        $socialLink = SocialLink::findOrFail($id);
        $socialLink->delete();

        return redirect()->route('social-links.index')->with('success', 'Social link deleted successfully.');
    }
}
