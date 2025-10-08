<?php

return [
    // Categoria padrão para este portal (exibida em notícias criadas via admin)
    'category' => 'Assistência Social',
    // Identificador curto do portal (usado para isolar conteúdo no mesmo banco)
    'key' => env('PORTAL_KEY', 'assistencia_social'),
    // Nome público do portal
    'name' => env('PORTAL_NAME', 'Assistência Social'),
];
