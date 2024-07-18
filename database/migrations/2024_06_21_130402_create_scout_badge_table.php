<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoutBadgeTable extends Migration
{
    public function up()
    {
        Schema::create('scout_badge', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('scout_id');
            $table->unsignedBigInteger('badge_id');
            $table->timestamps();

            $table->foreign('scout_id')->references('id')->on('scouts')->onDelete('cascade');
            $table->foreign('badge_id')->references('id')->on('badges')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('scout_badge');
    }
}

