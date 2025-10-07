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
    Schema::create('categorias', function (Blueprint $table) {
        $table->id();
        $table->string('nome')->unique();
        $table->timestamps();
    });

    // adiciona relação à tabela noticias
    Schema::table('noticias', function (Blueprint $table) {
        $table->foreignId('categoria_id')->nullable()->constrained('categorias')->nullOnDelete();
    });
}

public function down(): void
{
    Schema::table('noticias', function (Blueprint $table) {
        $table->dropForeign(['categoria_id']);
        $table->dropColumn('categoria_id');
    });

    Schema::dropIfExists('categorias');
}

};
