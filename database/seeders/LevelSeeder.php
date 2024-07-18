<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Level;

class LevelSeeder extends Seeder
{
    public function run()
    {
        Level::create(['name' => 'Daisy']);
        Level::create(['name' => 'Brownie']);
        Level::create(['name' => 'Junior']);
        Level::create(['name' => 'Cadette']);
        Level::create(['name' => 'Senior']);
        Level::create(['name' => 'Ambassador']);
    }
}
