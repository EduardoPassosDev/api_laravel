<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('encomenda', function (Blueprint $table) {
            $table->id();
            $table->string('nome_completo')->nullable();
            $table->foreignId('setor_id')->references('id')->on('setor');
            $table->text('descricao')->nullable();
            $table->boolean('is_coletado')->default(false);
            $table->foreignId('unidade_id')->references('id')->on('unidade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('encomenda');
    }
};
