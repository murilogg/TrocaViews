<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVistosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vistos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('visto');
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('vistos');
    }
}
