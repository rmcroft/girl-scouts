<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scout;
use App\Models\Level;

class ScoutController extends Controller
{
    public function create()
    {
        $levels = Level::all(); // Retrieve all levels for dropdown
        
        return view('scouts.create', compact('levels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'level_id' => 'required|exists:levels,id',
        ]);

        $scout = Scout::create($request->all());

        return redirect()->route('scouts.create')->with('success', 'Scout created successfully!');
    }

    public function index()
    {
        $scouts = Scout::all();
        
        return view('scouts.index', compact('scouts'));
    }

    public function manage($id)
    {

        $scout = Scout::find($id);
        
        return view('scouts.manage', compact('scout'));
    }
}
