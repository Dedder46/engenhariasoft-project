<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpportunitiesTable extends Migration
{
    public function up()
    {
        Schema::create('opportunities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empresa_id');
            $table->string('titulo');
            $table->text('descricao');
            $table->string('competencias')->nullable();
            $table->string('tipo_trabalho');
            $table->string('modo_trabalho');
            $table->string('localizacao');
            $table->string('periodo_trabalho');
            $table->string('tipo_contrato');
            $table->string('urgencia');
            $table->timestamps();

            $table->foreign('empresa_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('opportunities');
    }
}