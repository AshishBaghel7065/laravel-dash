<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Achievement;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\ValidationException;

class AchievementController
{
    public function __construct()
    {
        try {
            $achievements = Achievement::all();
            View::share('achievement', $achievements); // Share Achievements globally
        } catch (\Throwable $th) {
            View::share('achievement', []);
        }
    }
    public function getDashboardAchievements()
{
    $achievements = Achievement::all(); // Adjust query as needed
    return redirect()->route('dashboard.achievement')->with('success', 'Achievement created successfully');


}

   public function createAchievementForm()
    {
        return view('Createandupdate.addachievement');
    }

    // Create Achievement and redirect to the dashboard
    public function createAchievement(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|string',
                'count' => 'required|integer',
            ]);

            Achievement::create($validatedData);
            return redirect()->route('dashboard.achievement')->with('success', 'Achievement created successfully');

        } catch (ValidationException $e) {
            return back()->withErrors($e->errors());
        }
    }

    public function updateAchievement(Request $request, $id)
    {
        try {
            // Validate the input data
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'count' => 'required|integer',
            ]);
    
            // Find the Achievement by ID
            $achievement = Achievement::find($id);
            if (!$achievement) {
                return back()->withErrors(['message' => 'Achievement not found']);
            }
    
            // Update Achievement details
            $achievement->update($validatedData);
    
            // Redirect with success message
            return redirect()->route('dashboard.achievement')->with('success', 'Achievement updated successfully');
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors());
        }
    }
    public function destroy($id)
    {
        $achievement = Achievement::findOrFail($id);
        $achievement->delete();
    
        // Absolute path redirection
        return redirect('/dashboard/achievement')->with('success', 'Achievement deleted successfully.');
    }
    
    public function getById($id)
    {
        $achievement = Achievement::find($id);
    
        if (!$achievement) {
            return response()->json(['error' => 'Achievement not found'], 404);
        }
    
        return response()->json($achievement);
    }
    
    public function edit($id)
    {
        $achievement = Achievement::findOrFail($id);
        return view('Createandupdate.updateachievement', compact('achievement'));
    }
    
    
}
