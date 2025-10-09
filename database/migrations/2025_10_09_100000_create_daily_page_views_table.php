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
        Schema::create('daily_page_views', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->tinyInteger('hour')->nullable();
            $table->string('path');
            $table->string('device')->nullable();
            $table->unsignedBigInteger('view_count')->default(0);
            $table->timestamps();

            $table->unique(['date', 'hour', 'path', 'device'], 'daily_pv_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_page_views');
    }
};
