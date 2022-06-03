<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_scores', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('game_id');
            $table->string('score');
            $table->string('detail');
            $table->string('word', 5)->nullable();
            $table->string('status', 10)->default('pending');
            $table->smallInteger('points')->nullable();
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
        Schema::dropIfExists('daily_scores');
    }
};
