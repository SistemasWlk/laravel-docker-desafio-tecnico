<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultadoCorredor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultado_corredors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_prova');     
            $table->unsignedBigInteger('id_corredor');  
            $table->time('hora_inicial', $precision = 0)->nullable(false);
            $table->time('hora_final', $precision = 0)->nullable(false);
            $table->time('tempo', $precision = 0)->nullable(false);
            $table->foreign('id_prova')->references('id')->on('provas')->nullable(false);
            $table->foreign('id_corredor')->references('id')->on('corredors')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resultado_corredor');
    }
}
