<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $noticia->titulo }} — Portal da Assistência Social</title>

  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/9eac3d54d3.js" crossorigin="anonymous"></script>

  <style>
    .prose img {
      border-radius: 12px;
      margin: 1.5rem auto;
      max-width: 100%;
      height: auto;
    }

    .prose iframe {
      width: 100%;
      border-radius: 12px;
      margin: 1.5rem 0;
      min-height: 360px;
    }

    .capa-container {
      aspect-ratio: 16/9;
      overflow: hidden;
      border-radius: 1rem;
      box-shadow: 0 6px 20px rgba(0,0,0,0.15);
      background-color: #f1f1f1;
    }

    .capa-container img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.5s ease;
    }

    .capa-container:hover img {
      transform: scale(1.05);
    }
  </style>
</head>

<body class="bg-gray-50 text-gray-800 font-sans">

  @include('layouts.header')

  <section class="relative bg-gray-900 text-white">
    @if($noticia->imagem)
      <img src="{{ asset('storage/'.$noticia->imagem) }}" alt="{{ $noticia->titulo }}"
           class="absolute inset-0 w-full h-full object-cover opacity-40">
    @endif
    <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/50 to-black/80"></div>

    <div class="relative z-10 max-w-5xl mx-auto text-center py-20 px-6">
      @if($noticia->categoria)
        <p class="text-sm uppercase text-blue-200 tracking-widest mb-2">{{ $noticia->categoria }}</p>
      @endif
      <h1 class="text-4xl md:text-5xl font-extrabold leading-tight mb-4">{{ $noticia->titulo }}</h1>
      <p class="text-blue-100 text-sm flex justify-center items-center gap-4">
        <span><i class="fa-regular fa-calendar"></i> {{ \Carbon\Carbon::parse($noticia->data_publicacao)->format('d/m/Y H:i') }}</span>
        <span><i class="fa-solid fa-user-pen"></i> {{ $noticia->autor ?? 'Admin' }}</span>
      </p>
    </div>
  </section>

  <main class="max-w-5xl mx-auto px-6 py-16">

    <div class="bg-white shadow-xl rounded-2xl overflow-hidden p-8">

      <!-- Botões de compartilhamento -->
      <div class="flex justify-center md:justify-end gap-4 mb-10">
        @php
          $url = urlencode(request()->fullUrl());
          $titulo = urlencode($noticia->titulo);
        @endphp

        <a href="https://www.facebook.com/sharer/sharer.php?u={{ $url }}"
           target="_blank"
           class="flex items-center justify-center bg-gray-100 hover:bg-blue-50 text-blue-600 p-3 rounded-xl shadow transition">
           <i class="fa-brands fa-facebook-f text-xl"></i>
        </a>

        <a href="https://api.whatsapp.com/send?text={{ $titulo }}%20{{ $url }}"
           target="_blank"
           class="flex items-center justify-center bg-gray-100 hover:bg-green-50 text-green-600 p-3 rounded-xl shadow transition">
           <i class="fa-brands fa-whatsapp text-xl"></i>
        </a>

        <button onclick="navigator.clipboard.writeText(window.location.href)"
           class="flex items-center justify-center bg-gray-100 hover:bg-gray-200 text-gray-700 p-3 rounded-xl shadow transition">
           <i class="fa-solid fa-share-nodes text-xl"></i>
        </button>
      </div>

      @if($noticia->resumo)
        <p class="text-lg text-gray-700 italic border-l-4 border-blue-600 pl-4 mb-8 leading-relaxed">
          {{ $noticia->resumo }}
        </p>
      @endif

      @if($noticia->imagem)
        <div class="capa-container mb-10 mx-auto max-w-4xl">
          <img src="{{ asset('storage/'.$noticia->imagem) }}" alt="{{ $noticia->titulo }}">
        </div>
      @endif

      <article class="prose prose-lg max-w-none text-gray-800 leading-relaxed">
        {!! $noticia->conteudo !!}
      </article>

      <div class="mt-10 flex justify-between items-center border-t pt-6">
        <a href="{{ route('noticias.index') }}"
           class="inline-flex items-center gap-2 px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition">
          <i class="fa-solid fa-arrow-left"></i> Voltar às notícias
        </a>

        <p class="text-sm text-gray-500">
          Atualizado em {{ $noticia->updated_at->format('d/m/Y H:i') }}
        </p>
      </div>
    </div>

    @if($relacionadas->count())
      <div class="mt-20">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b-4 border-blue-600 inline-block pb-1">
          Outras notícias
        </h2>

        <div class="grid md:grid-cols-3 gap-8">
          @foreach($relacionadas as $rel)
            <div class="bg-white rounded-xl shadow hover:shadow-2xl overflow-hidden transition">
              <a href="{{ route('noticias.show', $rel->id) }}">
                @if($rel->imagem)
                  <div class="aspect-w-16 aspect-h-9">
                    <img src="{{ asset('storage/'.$rel->imagem) }}"
                         alt="{{ $rel->titulo }}"
                         class="w-full h-full object-cover">
                  </div>
                @else
                  <div class="bg-gray-200 h-48 flex items-center justify-center text-gray-400 text-5xl">
                    <i class="fa-solid fa-image"></i>
                  </div>
                @endif
              </a>
              <div class="p-5">
                <h3 class="text-lg font-semibold text-blue-800 hover:text-blue-900 leading-tight mb-2">
                  <a href="{{ route('noticias.show', $rel->id) }}">{{ $rel->titulo }}</a>
                </h3>
                <p class="text-sm text-gray-600 mb-2">
                  {{ Str::limit(strip_tags($rel->resumo ?? $rel->conteudo), 100, '...') }}
                </p>
                <a href="{{ route('noticias.show', $rel->id) }}" class="text-blue-600 font-semibold text-sm hover:underline">
                  Ler mais →
                </a>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    @endif
  </main>

  <footer class="bg-gray-900 text-gray-400 text-center py-6 mt-20">
    <p>© {{ date('Y') }} Prefeitura Municipal de Assaí — Secretaria de Assistência Social</p>
  </footer>

</body>
</html>
