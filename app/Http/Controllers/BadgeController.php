<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Badge;
use App\Models\Level; // Import Level model if not already imported

class BadgeController extends Controller
{
    public function create()
    {
        $levels = Level::all(); // Fetch all levels to populate dropdown
        
        return view('badges.create', compact('levels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'level_id' => 'required|exists:levels,id', // Validate level_id exists in levels table
            'step1' => 'required|string|max:255',
            'step2' => 'required|string|max:255',
            'step3' => 'required|string|max:255',
            'step4' => 'required|string|max:255',
            'step5' => 'required|string|max:255',
        ]);

        /*
        $badge = Badge::create([
            'name' => $request->input('name'),
            'level_id' => $request->input('level_id'),
            'step1' => $request->input('step1'),
            'step2' => $request->input('step2'),
            'step3' => $request->input('step3'),
            'step4' => $request->input('step4'),
            'step5' => $request->input('step5'),
        ]);
        */

        

        $id = $request->input('id');

        if ($id == '') {
            $badges = Badge::create($request->all());
            $verb = 'created';
        } else {
            $badges= Badge::find($id);
            $badges->update($request->all());
            $verb = 'updated';
        }

        
        return redirect()->route('badges.index')->with('success', "Badge $verb successfully!");

        // Optionally, you can redirect to a view or route after creating the badge
    }

    public function index()
    {
        $badges = Badge::all(); // Retrieve all badges

        return view('badges.index', compact('badges'));
    }

    public function manage($id)
    {
        $badges = Badge::find($id);

        $levels = Level::all(); // Retrieve all levels for dropdown
        
        return view('badges.create', compact('levels', 'badges'));
    }
}
