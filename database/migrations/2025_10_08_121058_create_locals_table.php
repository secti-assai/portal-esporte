<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('locais', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('endereco');
            $table->text('mapa_url')->nullable();
            $table->string('telefone')->nullable();
            $table->string('horario_funcionamento')->nullable();
            $table->text('servicos_oferecidos')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('locais');
    }
};