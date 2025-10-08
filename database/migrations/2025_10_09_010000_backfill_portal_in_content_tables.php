<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        $default = config('portal.key');
        $tables = [
            'noticias',
            'eventos',
            'locais',
            'link_rapidos',
            'faqs',
            'legislacoes',
            'membro_equipes',
        ];

        foreach ($tables as $table) {
            if (Schema::hasTable($table) && Schema::hasColumn($table, 'portal')) {
                DB::table($table)->whereNull('portal')->update(['portal' => $default]);
            }
        }
    }

    public function down(): void
    {
        // no-op: we don't revert data backfill
    }
};
