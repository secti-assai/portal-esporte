<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('membro_equipes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('cargo');
            $table->string('foto')->nullable();
            $table->string('email')->nullable();
            $table->string('telefone')->nullable();
            $table->integer('ordem')->default(99);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('membro_equipes');
    }
};