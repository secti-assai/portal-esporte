<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $tables = ['noticias','eventos','locals','link_rapidos','faqs','legislacaos','membro_equipes'];
        foreach ($tables as $t) {
            if (Schema::hasTable($t) && !Schema::hasColumn($t, 'portal')) {
                Schema::table($t, function (Blueprint $table) use ($t) {
                    $table->string('portal')->nullable()->after('id')->index();
                });
            }
        }
    }

    public function down(): void
    {
        $tables = ['noticias','eventos','locals','link_rapidos','faqs','legislacaos','membro_equipes'];
        foreach ($tables as $t) {
            if (Schema::hasTable($t) && Schema::hasColumn($t, 'portal')) {
                Schema::table($t, function (Blueprint $table) {
                    $table->dropColumn('portal');
                });
            }
        }
    }
};
