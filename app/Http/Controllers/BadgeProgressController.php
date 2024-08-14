<?php

namespace App\Http\Controllers;

use App\Models\Scout;
use App\Models\BadgeProgress;
use Illuminate\Http\Request;

class BadgeProgressController extends Controller
{
    public function manage($id)
    {
        $progress = BadgeProgress::find($id);
        
        return view('badgeprogress.manage', compact('progress'));
    }
    
    public function store(Request $request, $id)
    {
        error_log(implode(" ", $request->all()));
        
        $request->validate([
            'step1_complete' => 'int|min:0|max:1',
            'step2_complete' => 'int|min:0|max:1',
            'step3_complete' => 'int|min:0|max:1',
            'step4_complete' => 'int|min:0|max:1',
            'step5_complete' => 'int|min:0|max:1',
        ]);

        $progress = BadgeProgress::find($id);

        $progress->step1_complete = $request->input('step1_complete') == 1 ? 1:0;
        $progress->step2_complete = $request->input('step2_complete') == 1 ? 1:0;
        $progress->step3_complete = $request->input('step3_complete') == 1 ? 1:0;
        $progress->step4_complete = $request->input('step4_complete') == 1 ? 1:0;
        $progress->step5_complete = $request->input('step5_complete') == 1 ? 1:0;

        
        $progress->save();

        return redirect()->route('scouts.manage', ['id'=>$progress->scout->id])->with('success', "Badge progress updated successfully!");
    }
}
