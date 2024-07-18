<?php

namespace App\Http\Controllers;

use App\Models\Troop;

class ProfileController extends Controller {

    public function createTroop()
    {
        // Create a new troop object
        $troop = new Troop();

        // Set attributes
        $troop->troop_number = 'Troop001';
        $troop->email = 'troop001@example.com';
        $troop->enabled = true;

        // Save the troop object
        $troop->save();

        //return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function getTroop()
    {
        // Find troop by ID
        $troop = Troop::find($troopId);

        // Access attributes
        echo $troop->troop_number; // Troop001
        echo $troop->email; // troop001@example.com
        echo $troop->enabled ? 'Enabled' : 'Disabled'; // Enabled
    }

    public function updateTroop()
    {
        $troop = Troop::find($troopId);

        // Update attributes
        $troop->troop_number = 'Troop002';
        $troop->save();
    }

    public function deleteTroop()
    {
        $troop = Troop::find($troopId);

        $troop->delete();
    }

}