<?php

require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Noticia;

try {
    $defaultCat = config('portal.category', 'Assistência Social');

    $noticia = Noticia::create([
        'titulo' => 'Teste automático ' . date('YmdHis'),
        'resumo' => 'Resumo gerado por teste automático',
        'conteudo' => '<p>Conteúdo de teste</p>',
        'imagem' => null,
        'status' => 'publicada',
        'data_publicacao' => now(),
        'autor' => 'AutomatedScript',
        'categoria' => $defaultCat,
    ]);

    echo "CREATED: id={$noticia->id}, categoria={$noticia->categoria}\n";
} catch (Throwable $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
}
