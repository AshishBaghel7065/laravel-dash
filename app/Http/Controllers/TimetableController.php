<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timetable;
use Illuminate\Support\Facades\View;

class TimetableController 
{
    public function __construct()
    {
        try {
            $timetables = Timetable::all();
            View::share('globalTimetable', $timetables); // Share globally
        } catch (\Throwable $th) {
            View::share('globalTimetable', []); // Fallback if an error occurs
        }
    }

    public function index()
    {
        return view('dashboard.otherpage');
    }

    public function update(Request $request)
    {
        foreach ($request->timetable as $id => $data) {
            Timetable::where('id', $id)->update([
                'opening_time' => $data['opening_time'],
                'closing_time' => $data['closing_time'],
            ]);
        }

        return back()->with('success', 'Timetable updated successfully!');
    }
}
