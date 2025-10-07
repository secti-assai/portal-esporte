<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Oficial</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/portal.css') }}" rel="stylesheet">
</head>

<body class="font-inter bg-gray-50 text-gray-800">

@include('layouts.header')

<section id="inicio" class="bg-gradient-to-r from-blue-900 to-blue-600 text-white py-20 md:py-24 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/asfalt-dark.png')]"></div>
    <div class="container mx-auto text-center px-6 relative z-10">
        <h1 class="text-4xl md:text-5xl text-white font-extrabold mb-4">
            Portal Oficial
        </h1>
        <p class="text-lg md:text-xl max-w-3xl mx-auto mb-8 opacity-90">
            Bem-vindo ao portal institucional. Aqui você encontra notícias, serviços públicos, projetos em andamento e informações de transparência.
        </p>
    </div>
</section>

<section id="servicos" class="py-16 md:py-20 bg-gray-100">
    <div class="container mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-blue-900 mb-3">Serviços em Destaque</h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">Acesso rápido aos principais serviços e informações para o cidadão.</p>
        </div>
        <div class="grid md:grid-cols-4 sm:grid-cols-2 grid-cols-1 gap-8">
            <a href="#" class="block bg-white p-8 rounded-xl shadow-md hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 text-center no-underline">
                <div class="text-4xl text-blue-600 mb-4 mx-auto w-16 h-16 flex items-center justify-center bg-blue-50 rounded-full">
                    <i class="fas fa-file-alt"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Agendamentos</h3>
                <p class="text-gray-600 text-sm">Marque consultas, matrículas ou atendimentos.</p>
            </a>
            <a href="#" class="block bg-white p-8 rounded-xl shadow-md hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 text-center no-underline">
                <div class="text-4xl text-blue-600 mb-4 mx-auto w-16 h-16 flex items-center justify-center bg-blue-50 rounded-full">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Calendário Oficial</h3>
                <p class="text-gray-600 text-sm">Confira as datas e eventos importantes.</p>
            </a>
            <a href="#" class="block bg-white p-8 rounded-xl shadow-md hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 text-center no-underline">
                <div class="text-4xl text-blue-600 mb-4 mx-auto w-16 h-16 flex items-center justify-center bg-blue-50 rounded-full">
                    <i class="fas fa-bullhorn"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Editais e Licitações</h3>
                <p class="text-gray-600 text-sm">Acompanhe os processos de seleção e contratação.</p>
            </a>
            <a href="#" class="block bg-white p-8 rounded-xl shadow-md hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 text-center no-underline">
                <div class="text-4xl text-blue-600 mb-4 mx-auto w-16 h-16 flex items-center justify-center bg-blue-50 rounded-full">
                    <i class="fas fa-info-circle"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Perguntas Frequentes</h3>
                <p class="text-gray-600 text-sm">Tire suas dúvidas de forma rápida e fácil.</p>
            </a>
        </div>
    </div>
</section>

<section id="noticias" class="py-16 md:py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-blue-900 mb-3">Últimas Notícias</h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">Acompanhe as ações e comunicados oficiais do município</p>
        </div>

        @if($noticias->count() > 0)
            <div class="grid md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-10">
                @foreach($noticias as $noticia)
                    <article class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition transform hover:-translate-y-1 border border-gray-100">
                        @if($noticia->imagem)
                            <img src="{{ asset('storage/'.$noticia->imagem) }}" alt="{{ $noticia->titulo }}" class="w-full h-56 object-cover">
                        @else
                            <img src="/placeholder.svg?height=220&width=400&text=Sem+Imagem" alt="Sem imagem" class="w-full h-56 object-cover">
                        @endif
                        <div class="p-6 text-center sm:text-left">
                            <span class="text-sm text-blue-600 font-semibold block mb-2">
                                {{ $noticia->data_publicacao ? $noticia->data_publicacao->format('d/m/Y') : $noticia->created_at->format('d/m/Y') }}
                            </span>
                            <h3 class="text-xl font-bold text-gray-800 mb-2 leading-tight">
                                {{ $noticia->titulo }}
                            </h3>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                                {{ Str::limit($noticia->resumo, 130) }}
                            </p>
                            <a href="{{ route('noticias.show', $noticia->id) }}" class="text-blue-700 font-semibold hover:text-blue-900 transition flex items-center gap-1 justify-center sm:justify-start">
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

<section id="projetos" class="py-16 md:py-20 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="text-center mb-12 md:mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-blue-900 mb-3">Projetos e Ações em Andamento</h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">Conheça as principais iniciativas que estão transformando nossa cidade.</p>
        </div>

        <div class="space-y-12 md:space-y-16">
            <div class="grid md:grid-cols-2 gap-8 md:gap-12 items-center">
                <div>
                    <img src="{{ asset('img/exemplo.jpg') }}" alt="Imagem do Projeto 1" class="rounded-lg shadow-lg w-full h-80 object-cover">
                </div>
                <div class="text-center md:text-left">
                    <span class="text-sm font-semibold text-blue-600">INFRAESTRUTURA</span>
                    <h3 class="text-2xl md:text-3xl font-bold text-gray-800 mt-2 mb-4">Título do Projeto Genérico</h3>
                    <p class="text-gray-600 mb-6">
                        Descrição do projeto, explicando seus objetivos, o público-alvo e os benefícios esperados para a comunidade. Este texto deve ser conciso e informativo, destacando o impacto positivo da ação.
                    </p>
                    <a href="#" class="bg-blue-700 text-white font-bold py-3 px-6 rounded-lg hover:bg-blue-800 transition inline-block no-underline">
                        Saiba Mais
                    </a>
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-8 md:gap-12 items-center">
                <div class="md:order-last">
                    <img src="{{ asset('img/exemplo2.jpg') }}" alt="Imagem do Projeto 2" class="rounded-lg shadow-lg w-full h-80 object-cover">
                </div>
                <div class="text-center md:text-left">
                    <span class="text-sm font-semibold text-blue-600">DESENVOLVIMENTO SOCIAL</span>
                    <h3 class="text-2xl md:text-3xl font-bold text-gray-800 mt-2 mb-4">Outra Iniciativa Importante</h3>
                    <p class="text-gray-600 mb-6">
                        Outra descrição de um projeto, com foco em uma área diferente. A alternância de imagem e texto cria uma dinâmica visual interessante na página, mantendo o usuário engajado.
                    </p>
                    <a href="#" class="bg-blue-700 text-white font-bold py-3 px-6 rounded-lg hover:bg-blue-800 transition inline-block no-underline">
                        Saiba Mais
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="eventos" class="py-16 md:py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-blue-900 mb-3">Agenda de Eventos</h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">Participe dos próximos eventos, workshops e atividades.</p>
        </div>
        <div class="max-w-4xl mx-auto">
            <ul class="space-y-6">
                <li class="flex items-center bg-gray-50 p-4 sm:p-6 rounded-xl shadow-sm border border-gray-200">
                    <div class="text-center mr-4 sm:mr-6">
                        <div class="text-2xl sm:text-3xl font-bold text-blue-700">15</div>
                        <div class="text-sm font-semibold text-gray-600 uppercase">OUT</div>
                    </div>
                    <div>
                        <h3 class="text-lg sm:text-xl font-bold text-gray-800">Nome do Evento Genérico</h3>
                        <p class="text-gray-500 text-sm sm:text-base"><i class="fas fa-clock mr-2"></i>19:00 - 21:00</p>
                        <p class="text-gray-500 text-sm sm:text-base"><i class="fas fa-map-marker-alt mr-2"></i>Local do Evento, Auditório Principal</p>
                    </div>
                </li>
                <li class="flex items-center bg-gray-50 p-4 sm:p-6 rounded-xl shadow-sm border border-gray-200">
                    <div class="text-center mr-4 sm:mr-6">
                        <div class="text-2xl sm:text-3xl font-bold text-blue-700">22</div>
                        <div class="text-sm font-semibold text-gray-600 uppercase">OUT</div>
                    </div>
                    <div>
                        <h3 class="text-lg sm:text-xl font-bold text-gray-800">Workshop sobre Tema Relevante</h3>
                        <p class="text-gray-500 text-sm sm:text-base"><i class="fas fa-clock mr-2"></i>09:00 - 17:00</p>
                        <p class="text-gray-500 text-sm sm:text-base"><i class="fas fa-map-marker-alt mr-2"></i>Centro de Convenções</p>
                    </div>
                </li>
                <li class="flex items-center bg-gray-50 p-4 sm:p-6 rounded-xl shadow-sm border border-gray-200">
                    <div class="text-center mr-4 sm:mr-6">
                        <div class="text-2xl sm:text-3xl font-bold text-blue-700">05</div>
                        <div class="text-sm font-semibold text-gray-600 uppercase">NOV</div>
                    </div>
                    <div>
                        <h3 class="text-lg sm:text-xl font-bold text-gray-800">Audiência Pública Municipal</h3>
                        <p class="text-gray-500 text-sm sm:text-base"><i class="fas fa-clock mr-2"></i>14:00</p>
                        <p class="text-gray-500 text-sm sm:text-base"><i class="fas fa-map-marker-alt mr-2"></i>Câmara de Vereadores</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</section>

@include('layouts.footer')

</body>
</html>