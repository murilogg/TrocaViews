<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nomeVideo');
            $table->string('videoId');
            $table->integer('vistoVideo');
            $table->boolean('ativo');
            $table->dateTime('contadorHr'); //exibir video dentro de 1 hr
            $table->dateTime('contadorDia'); //alterar video dentro de 1 dia
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            // ALTER TABLE videos
            // ADD CONSTRAINT user_id
            // FOREIGN KEY (id) REFERENCES users(id);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}
