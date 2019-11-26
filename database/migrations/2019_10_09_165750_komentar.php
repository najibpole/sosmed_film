<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Komentar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komentar', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('isi');
            $table->bigInteger('film_id')->unsigned();
            $table->foreign('film_id')->on('film')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('member_id')->unsigned();
            $table->foreign('member_id')->on('member')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('balasan_untuk')->unsigned()->nullable();
            $table->foreign('balasan_untuk')->on('komentar')->references('id')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('komentar');
    }
}
