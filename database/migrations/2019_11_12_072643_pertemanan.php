<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pertemanan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pertemanan', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->bigInteger('member_id')->unsigned();
            $table->foreign('member_id')->on('member')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('teman_id')->unsigned();
            $table->foreign('teman_id')->on('member')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->string('status')->comment('pending, terima, tolak')->default('pending');
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
        Schema::dropIfExists('pertemanan');
    }
}
