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
            $table->foreignId('team1_id')->nullable()
                ->references('id')->on('teams');
            $table->foreignId('team2_id')->nullable()
                ->references('id')->on('teams');
            $table->integer('team1_score')->nullable();
            $table->integer('team2_score')->nullable();
            $table->unsignedBigInteger('round_num')->nullable();
            $table->bigInteger('field_id')->unsigned();
            $table->foreign('field_id')->references('id')->on('fields');
            $table->bigInteger('referee_id')->unsigned();
            $table->foreign('referee_id')->references('id')->on('users');
            $table->dateTime('datetime')->nullable();
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
