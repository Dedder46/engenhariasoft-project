<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('applications', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('aluno_id');
        $table->unsignedBigInteger('oportunidade_id');
        $table->timestamps();

        // Relacionamentos
        $table->foreign('aluno_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('oportunidade_id')->references('id')->on('opportunities')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
