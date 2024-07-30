<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLevelsTable extends Migration
{
    public function up()
    {
        Schema::create('levels', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Daisy, Brownie, Junior
            $table->timestamps();
        });

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
        Schema::dropIfExists('levels');
    }
}

