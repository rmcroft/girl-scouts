<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoutsTable extends Migration
{
    public function up()
    {
        Schema::create('scouts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('birth_date');
            $table->unsignedBigInteger('level_id'); // Foreign key to levels table
            $table->timestamps();

            // Define foreign key constraint
            $table->foreign('level_id')->references('id')->on('levels');
        });
    }

    public function down()
    {
        Schema::dropIfExists('scouts');
    }
}

