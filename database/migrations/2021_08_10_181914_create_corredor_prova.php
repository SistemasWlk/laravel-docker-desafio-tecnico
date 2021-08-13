<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorredorProva extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corredor_provas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_corredor')->nullable(false);
            $table->unsignedBigInteger('id_prova')->nullable(false);
            $table->foreign('id_corredor')->references('id')->on('corredors')->nullable(false);
            $table->foreign('id_prova')->references('id')->on('provas')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('corredor_prova');
    }
}
