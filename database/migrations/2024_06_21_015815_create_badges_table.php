<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBadgesTable extends Migration
{
    public function up()
    {
        Schema::create('badges', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('level_id'); // Adding level_id column
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade'); // Assuming levels table exists
            $table->string('step1');
            $table->string('step2');
            $table->string('step3');
            $table->string('step4');
            $table->string('step5');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('badges');
    }
}

