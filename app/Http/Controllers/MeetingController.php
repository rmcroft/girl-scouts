<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meeting;
use App\Models\Badge;
use App\Models\Level;

class MeetingController extends Controller
{
    public function index()
    {
        $meetings = Meeting::orderBy('date', 'asc')->get();

        return view('meetings.index', compact('meetings'));
    }

    public function create()
    {
        $badges = Badge::all();

        $levels = Level::with('badges')->get();


        return view('meetings.create', compact('badges', 'levels'));
    }

    public function store(Request $request)
    {
        echo "<script>console.log('request'," . json_encode($request) . ");</script>";


        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
        ]);

        $id = Meeting::create([
            'title' => $request->input('title'),
            'date' => $request->input('date'),
        ]);

        echo "<script>console.log('id'," . json_encode($id) . ");</script>";

        return redirect()->route('meetings.index')->with('success', 'Meeting created successfully!');
    }


}

