<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTroopsTable extends Migration
{
    public function up()
    {
        Schema::create('troops', function (Blueprint $table) {
            $table->id();
            $table->string('troop_number')->unique();
            $table->string('email')->unique();
            $table->boolean('enabled')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('troops');
    }
}

