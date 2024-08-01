<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//class PopulateLevelsTable extends Migration
return new class extends Migration
{
    public function up()
    {

        DB::table('levels')->insert([
            ['name' => 'Daisy'],
            ['name' => 'Brownie'],
            ['name' => 'Junior'],
            ['name' => 'Cadette'],
            ['name' => 'Senior'],
            ['name' => 'Ambassador'],
        ]);
    }

    public function down()
    {
    }
};

