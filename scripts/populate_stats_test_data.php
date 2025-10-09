<?php

/**
 * Script para popular dados de teste nas tabelas de estatísticas
 * Execute: php scripts/populate_stats_test_data.php
 */

require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\PageView;
use App\Models\DailyPageView;
use Illuminate\Support\Facades\DB;

echo "🔄 Populando dados de teste para estatísticas...\n\n";

// Limpar dados antigos de teste (opcional)
// PageView::truncate();
// DailyPageView::truncate();

// 1. Popular PageView (totais agregados por path)
echo "📊 Criando dados em PageView...\n";
$paths = [
    '/' => rand(500, 1000),
    'noticias' => rand(300, 600),
    'noticias/1' => rand(150, 300),
    'noticias/2' => rand(100, 250),
    'noticias/3' => rand(80, 200),
    'eventos' => rand(200, 400),
    'faq' => rand(150, 300),
    'locais' => rand(100, 250),
];

foreach ($paths as $path => $views) {
    PageView::updateOrCreate(
        ['path' => $path],
        [
            'view_count' => $views,
            'last_viewed_at' => now()->subHours(rand(1, 24))
        ]
    );
    echo "  ✓ {$path}: {$views} views\n";
}

// 2. Popular DailyPageView (dados detalhados por dia/hora/device)
echo "\n📈 Criando dados em DailyPageView...\n";

$devices = ['desktop', 'mobile', 'bot'];
$totalRecords = 0;

// Últimos 30 dias
for ($d = 0; $d < 30; $d++) {
    $date = now()->subDays($d)->toDateString();
    
    foreach ($paths as $path => $baseViews) {
        // Dados por dispositivo (sem hora específica - agregado do dia)
        foreach ($devices as $device) {
            $views = rand(10, intval($baseViews / 30)); // Distribuir ao longo dos 30 dias
            
            DailyPageView::create([
                'date' => $date,
                'hour' => null,
                'path' => $path,
                'device' => $device,
                'view_count' => $views
            ]);
            $totalRecords++;
        }
    }
}

// Adicionar dados por hora para as últimas 48 horas
echo "\n⏰ Criando dados por hora (últimas 48h)...\n";
for ($h = 0; $h < 48; $h++) {
    $datetime = now()->subHours($h);
    $date = $datetime->toDateString();
    $hour = $datetime->hour;
    
    foreach (array_slice(array_keys($paths), 0, 3) as $path) { // Apenas algumas páginas
        foreach ($devices as $device) {
            $views = rand(1, 20);
            
            DailyPageView::create([
                'date' => $date,
                'hour' => $hour,
                'path' => $path,
                'device' => $device,
                'view_count' => $views
            ]);
            $totalRecords++;
        }
    }
}

echo "\n✅ Concluído!\n";
echo "   📊 " . PageView::count() . " registros em PageView\n";
echo "   📈 " . DailyPageView::count() . " registros em DailyPageView\n";
echo "\n🌐 Acesse: http://localhost:8000/admin/stats\n";
