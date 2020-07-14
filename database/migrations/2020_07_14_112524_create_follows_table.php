<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follows', function (Blueprint $table) {
            $table->bigInteger('following_id')->unsigned();
            $table->bigInteger('followed_id')->unsigned();
            $table->timestamps();
            
            
            $table->primary(["following_id", "followed_id"]);
            $table->foreign('following_id')->references('id')->on('users');
            $table->foreign('followed_id')->references('id')->on('users');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('follows');
    }
}
