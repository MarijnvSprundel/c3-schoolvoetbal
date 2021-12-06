<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('team1_id')->unsigned();
            $table->foreign('team1_id')->references('id')->on('teams');
            $table->bigInteger('team2_id')->unsigned();
            $table->foreign('team2_id')->references('id')->on('teams');
            $table->integer('team1_score');
            $table->integer('team2_score');
            $table->bigInteger('field_id')->unsigned();
            $table->foreign('field_id')->references('id')->on('fields');
            $table->bigInteger('referee_id')->unsigned();
            $table->foreign('referee_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
