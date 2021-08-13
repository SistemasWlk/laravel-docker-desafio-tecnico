<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProva extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_tp_prova')->nullable(false);
            $table->date('data')->nullable(false);
            $table->foreign('id_tp_prova')->references('id')->on('tipo_provas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prova');
    }
}
