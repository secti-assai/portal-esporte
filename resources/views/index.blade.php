<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Oficial</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f9fafb;
        }
    </style>
</head>
<body>

@include('layouts.header')

<!-- HERO -->
<section class="bg-gradient-to-r from-green-700 to-green-500 text-white py-24">
    <div class="container mx-auto text-center px-6">
        <h1 class="text-5xl font-extrabold mb-4">Bem-vindo ao Portal</h1>
        <p class="text-xl max-w-2xl mx-auto mb-6 opacity-90">
            Acompanhe as principais notícias, projetos e iniciativas.
            Este portal pode ser usado por qualquer secretaria ou instituição pública.
        </p>
        <a href="#noticias" class="bg-white text-green-700 font-semibold px-8 py-3 rounded-lg shadow hover:bg-gray-100 transition">
            <i class="fas fa-newspaper mr-2"></i> Ver Notícias
        </a>
    </div>
</section>

<!-- SEÇÃO DE NOTÍCIAS -->
<section id="noticias" class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-800 mb-3">Últimas Notícias</h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">Fique por dentro das novidades e ações mais recentes</p>
        </div>

        @if($noticias->count() > 0)
            <div class="grid md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-10">
                @foreach($noticias as $noticia)
                    <article class="bg-white rounded-2xl overflow-hidden shadow hover:shadow-2xl transition transform hover:-translate-y-1">
                        @if($noticia->imagem)
                            <img src="{{ asset('storage/'.$noticia->imagem) }}" alt="{{ $noticia->titulo }}" class="w-full h-56 object-cover">
                        @else
                            <img src="/placeholder.svg?height=220&width=400&text=Sem+Imagem" alt="Sem imagem" class="w-full h-56 object-cover">
                        @endif

                        <div class="p-6">
                            <span class="text-sm text-green-600 font-semibold block mb-2">
                                {{ $noticia->data_publicacao ? $noticia->data_publicacao->format('d/m/Y') : $noticia->created_at->format('d/m/Y') }}
                            </span>

                            <h3 class="text-xl font-bold text-gray-800 mb-2 leading-tight">
                                {{ $noticia->titulo }}
                            </h3>

                            <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                                {{ Str::limit($noticia->resumo, 130) }}
                            </p>

                            <a href="{{ route('noticias.show', $noticia->id) }}"
                               class="text-green-600 font-semibold hover:text-green-700 transition flex items-center gap-1">
                                Ler mais <i class="fas fa-arrow-right text-xs"></i>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <p class="text-center text-gray-500 text-lg mt-10">Nenhuma notícia publicada ainda.</p>
        @endif
    </div>
</section>

<!-- SEÇÃO SOBRE -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold text-gray-800 mb-4">Sobre este Portal</h2>
        <p class="max-w-2xl mx-auto text-gray-600 text-lg leading-relaxed">
            Este é um modelo genérico de portal institucional feito para ser facilmente adaptável.
            Você pode usá-lo em qualquer secretaria, programa municipal ou instituição.
            Ele foi projetado para ser moderno, limpo e responsivo.
        </p>
    </div>
</section>

@include('layouts.footer')

</body>
</html>
