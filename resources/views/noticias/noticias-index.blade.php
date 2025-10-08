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

    <!-- Buscar -->
    <div class="mb-8 flex items-center justify-between">
      <form method="GET" action="{{ route('noticias.index') }}" class="flex w-full max-w-xl">
        <input type="text" name="q" value="{{ old('q', $q ?? '') }}" placeholder="Pesquisar notícias..." class="w-full p-3 rounded-l border border-gray-200" />
        <button type="submit" class="bg-blue-600 text-white px-4 rounded-r">
          <i class="fa-solid fa-magnifying-glass"></i>
        </button>
        @if(!empty($q ?? ''))
          <a href="{{ route('noticias.index') }}" class="ml-3 text-sm text-gray-600 underline">Limpar</a>
        @endif
      </form>
      <div class="text-sm text-gray-600 ml-4">{{ $noticias->total() }} resultado(s)</div>
    </div>

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

      <!-- Paginação personalizada -->
      @if($noticias->lastPage() > 1)
        <nav class="mt-12 flex items-center justify-center" role="navigation" aria-label="Pagination Navigation">
          <ul class="inline-flex items-center space-x-2">
            {{-- Previous --}}
            <li>
              @if($noticias->onFirstPage())
                <span class="px-3 py-2 bg-gray-200 text-gray-400 rounded"><i class="fa-solid fa-chevron-left"></i></span>
              @else
                <a href="{{ $noticias->previousPageUrl() }}" class="px-3 py-2 bg-white border rounded hover:bg-gray-50"><i class="fa-solid fa-chevron-left"></i></a>
              @endif
            </li>

            {{-- Page numbers (compact window) --}}
            @php
              $last = $noticias->lastPage();
              $current = $noticias->currentPage();
              $start = max(1, $current - 2);
              $end = min($last, $current + 2);
            @endphp

            @if($start > 1)
              <li><a href="{{ $noticias->url(1) }}" class="px-3 py-2 bg-white border rounded">1</a></li>
              @if($start > 2)
                <li class="px-2 text-gray-500">…</li>
              @endif
            @endif

            @for($i = $start; $i <= $end; $i++)
              <li>
                @if($i == $current)
                  <span class="px-3 py-2 bg-blue-600 text-white rounded">{{ $i }}</span>
                @else
                  <a href="{{ $noticias->url($i) }}" class="px-3 py-2 bg-white border rounded hover:bg-gray-50">{{ $i }}</a>
                @endif
              </li>
            @endfor

            @if($end < $last)
              @if($end < $last - 1)
                <li class="px-2 text-gray-500">…</li>
              @endif
              <li><a href="{{ $noticias->url($last) }}" class="px-3 py-2 bg-white border rounded">{{ $last }}</a></li>
            @endif

            {{-- Next --}}
            <li>
              @if($noticias->hasMorePages())
                <a href="{{ $noticias->nextPageUrl() }}" class="px-3 py-2 bg-white border rounded hover:bg-gray-50"><i class="fa-solid fa-chevron-right"></i></a>
              @else
                <span class="px-3 py-2 bg-gray-200 text-gray-400 rounded"><i class="fa-solid fa-chevron-right"></i></span>
              @endif
            </li>
          </ul>
        </nav>
      @endif
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
