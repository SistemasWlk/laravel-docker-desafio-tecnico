<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorredor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corredor', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome', 190)->nullable(false);
            $table->string('cpf', 11)->nullable(false)->unique();
            $table->date('data_nascimento')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('corredor');
    }
}
