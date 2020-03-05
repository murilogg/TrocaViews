<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRankingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rankings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('qtdViewVisitor'); // qtd view do msm visitante
            $table->string('msgVisitor');   // msg do visitante
            $table->integer('ranking');     // avaliação 1 a 5 int
            $table->dateTime('counter');    // dia da msg
            $table->timestamps();
            $table->bigInteger('visitor_id')->unsigned(); 
            $table->bigInteger('video_id')->unsigned();
            $table->foreign('visitor_id')->references('id')->on('users');
            $table->foreign('video_id')->references('id')->on('videos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rankings');
    }
}
