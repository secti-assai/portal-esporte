<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $default = config('portal.category', 'Assistência Social');
        DB::table('noticias')->whereNull('categoria')->orWhere('categoria', '')->update(['categoria' => $default]);
    }

    public function down(): void
    {
        // não desfazer automaticamente
    }
};
