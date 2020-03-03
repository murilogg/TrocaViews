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
            $table->integer('viewVisitante'); // qtd view do msm visitante
            $table->string('msgVisitante');   // msg do visitante
            $table->integer('ranking');       // avaliação 1 a 5 int
            $table->timestamps();
            $table->bigInteger('visitante_id')->unsigned(); 
            $table->bigInteger('video_id')->unsigned();
            $table->foreign('visitante_id')->references('id')->on('users');
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
