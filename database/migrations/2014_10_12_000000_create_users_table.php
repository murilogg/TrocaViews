<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('credit')->nullable();    // total de tempo c/desconto
            $table->integer('totCredit')->nullable(); // total de tempo acumulado
            $table->integer('totView')->nullable();   // total de visto
            $table->integer('limit')->default(2);     // limit 2 por video
            $table->integer('concluded')->nullable(); // missoes concluidas
            $table->binary('image')->nullable();      
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
