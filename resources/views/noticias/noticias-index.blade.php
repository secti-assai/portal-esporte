<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notícias — Portal da Assistência Social</title>

  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/9eac3d54d3.js" crossorigin="anonymous"></script>

  <style>
    .news-card img {
      height: 240px;
      width: 100%;
      object-fit: cover;
      transition: transform 0.4s ease;
    }

    .news-card:hover img {
      transform: scale(1.05);
    }

    .news-card {
      transition: box-shadow 0.4s ease, transform 0.3s ease;
    }

    .news-card:hover {
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
      transform: translateY(-3px);
    }
  </style>
</head>

<body class="bg-gray-50 text-gray-800 font-sans">
@include('layouts.header')

  <!-- Seção de Destaque -->
  <section class="bg-gray-900 text-white py-16">
    <div class="max-w-6xl mx-auto px-6 text-center">
      <h1 class="text-4xl md:text-5xl font-extrabold mb-4">Últimas Notícias</h1>
      <p class="text-gray-300 text-lg">Acompanhe as ações, eventos e comunicados oficiais da Secretaria de Assistência Social de Assaí.</p>
    </div>
  </section>

  <!-- Listagem -->
  <main class="max-w-6xl mx-auto px-6 py-12">

    <!-- Categoria removida: todas as notícias são da Assistência Social -->

    @if($noticias->count() > 0)
      <div class="grid md:grid-cols-3 sm:grid-cols-2 gap-8">
        @foreach($noticias as $noticia)
          <div class="bg-white rounded-xl shadow news-card overflow-hidden flex flex-col">
            <a href="{{ route('noticias.show', $noticia->id) }}">
              @if($noticia->imagem)
                <img src="{{ asset('storage/'.$noticia->imagem) }}" alt="{{ $noticia->titulo }}">
              @else
                <div class="bg-gray-200 h-[240px] flex items-center justify-center text-gray-400 text-5xl">
                  <i class="fa-solid fa-image"></i>
                </div>
              @endif
            </a>

            <div class="p-5 flex flex-col flex-grow">
              @if($noticia->categoria)
                <p class="text-xs font-semibold text-blue-600 uppercase mb-1 tracking-wider">
                  {{ $noticia->categoria }}
                </p>
              @endif

              <div class="text-sm text-gray-500 mb-2 flex items-center gap-2">
                <i class="fa-regular fa-calendar"></i>
                {{ \Carbon\Carbon::parse($noticia->data_publicacao)->format('d/m/Y') }}
              </div>

              <h2 class="text-xl font-semibold text-blue-900 hover:text-blue-700 mb-3 leading-snug">
                <a href="{{ route('noticias.show', $noticia->id) }}">
                  {{ $noticia->titulo }}
                </a>
              </h2>

              <p class="text-gray-600 text-sm flex-grow">
                {{ Str::limit(strip_tags($noticia->resumo ?? $noticia->conteudo), 130, '...') }}
              </p>

              <div class="mt-4">
                <a href="{{ route('noticias.show', $noticia->id) }}"
                   class="inline-flex items-center gap-1 text-blue-600 font-semibold text-sm hover:underline">
                  Ler mais <i class="fa-solid fa-arrow-right text-xs"></i>
                </a>
              </div>
            </div>
          </div>
        @endforeach
      </div>

      <!-- Paginação -->
      <div class="mt-12">
        {{ $noticias->links('pagination::tailwind') }}
      </div>
    @else
      <div class="text-center py-24 text-gray-500">
        <i class="fa-regular fa-newspaper text-6xl mb-4"></i>
        <p class="text-lg">Nenhuma notícia publicada no momento.</p>
      </div>
    @endif
  </main>

  <!-- Rodapé -->
  <footer class="bg-gray-900 text-gray-400 text-center py-6 mt-20">
    <p>© {{ date('Y') }} Prefeitura Municipal de Assaí — Secretaria de Assistência Social</p>
  </footer>

</body>
</html>
