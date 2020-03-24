<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_polls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('poll_option_id')->index();
            $table->foreign('poll_option_id')->references('id')->on('poll_options')->onDelete('cascade');

            $table->unsignedBigInteger('poll_id')->index();
            $table->foreign('poll_id')->references('id')->on('polls')->onDelete('cascade');

            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('user_polls');
    }
}
