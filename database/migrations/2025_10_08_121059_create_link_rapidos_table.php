<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('link_rapidos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('descricao_curta');
            $table->string('url');
            $table->string('icone')->comment('Classe do Font Awesome, ex: fas fa-file-alt');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('link_rapidos');
    }
};