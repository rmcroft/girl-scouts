<?php

namespace App\Http\Controllers;

use App\Models\Scout;
use App\Models\BadgeProgress;
use Illuminate\Http\Request;

class BadgeProgressController extends Controller
{
    public function markStepCompleted(Request $request, $scoutId, $stepId)
    {
        $request->validate([
            'completed' => 'required|boolean',
        ]);

        $scout = Scout::findOrFail($scoutId);
        $step = Step::findOrFail($stepId);

        // Find existing progress or create new one
        $progress = BadgeProgress::firstOrNew([
            'scout_id' => $scout->id,
            'step_id' => $step->id,
        ]);

        $progress->is_completed = $request->input('completed');
        $progress->save();

        return redirect()->back()->with('success', 'Step progress updated successfully!');
    }
}
