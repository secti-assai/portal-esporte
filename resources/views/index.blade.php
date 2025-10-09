<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal da Assistência Social</title>
    {{-- Removi os links do Tailwind, pois agora os estilos estão no portal.css --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/portal.css') }}" rel="stylesheet">
    {{-- Alpine.js para interatividade (usado no FAQ) --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body>

@include('layouts.header')

{{-- SEÇÃO DE ABERTURA --}}
<section id="inicio" class="hero-section">
    <div class="hero-texture"></div>
    <div class="container hero-content">
        <h1>Portal da Assistência Social</h1>
        <p>
            Bem-vindo ao portal institucional. Aqui você encontra notícias, serviços públicos, projetos em andamento e informações de transparência.
        </p>
    </div>
</section>

{{-- QUEM É QUEM --}}
<section id="equipe" class="section bg-white">
    <div class="container">
        <div class="section-header">
            <h2>Gestão da Secretaria</h2>
            <p>Conheça os profissionais que compõem nossa secretaria.</p>
        </div>
        @if(isset($equipe) && $equipe->count() > 0)
            <div class="team-grid">
                @php
                    // Define os cargos por nível de hierarquia
                    $nivel1 = ['Secretário(a) Municipal', 'Secretário(a) Adjunto(a)'];
                    $nivel2 = ['Diretor(a) de Departamento', 'Coordenador(a)', 'Chefe de Divisão', 'Assessor(a)'];
                @endphp

                @foreach($equipe as $membro)
                    @php
                        // Determina as classes da FOTO e do BADGE
                        $levelClass = 'team-member-photo--level-3';
                        $badgeClass = 'team-member-badge--level-3';
                        $isLevel1 = in_array($membro->cargo, $nivel1);
                        $isLevel2 = in_array($membro->cargo, $nivel2);

                        if ($isLevel1) {
                            $levelClass = 'team-member-photo--level-1';
                            $badgeClass = 'team-member-badge--level-1';
                        } elseif ($isLevel2) {
                            $levelClass = 'team-member-photo--level-2';
                            $badgeClass = 'team-member-badge--level-2';
                        }
                    @endphp
                    <div class="team-member-card">
                        {{-- NOVO: Wrapper para a foto e coroa --}}
                        <div class="team-photo-wrapper">
                            {{-- Adiciona a coroa se for Nível 1 --}}
                            @if($isLevel1)
                                <i class="fas fa-crown team-member-crown"></i>
                            @endif

                            <img src="{{ $membro->foto ? asset('storage/' . $membro->foto) : 'https://via.placeholder.com/150' }}" 
                                alt="Foto de {{ $membro->nome }}" 
                                class="team-member-photo {{ $levelClass }}">
                        </div>

                        <div class="team-member-badge {{ $badgeClass }}">
                            {{ $membro->cargo }}
                        </div>
                        
                        <h3 class="team-member-name">{{ $membro->nome }}</h3>
                        
                        @if($membro->email)
                            <p class="team-member-contact"><i class="fas fa-envelope"></i>{{ $membro->email }}</p>
                        @endif
                        @if($membro->telefone)
                            <p class="team-member-contact"><i class="fas fa-phone"></i>{{ $membro->telefone }}</p>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <p class="placeholder-text">Informações da equipe em breve.</p>
        @endif
    </div>
</section>

{{-- ENDEREÇOS E CONTATOS --}}
<section id="locais" class="section">
    <div class="container">
        <div class="section-header">
            <h2>Endereços e Contatos</h2>
            <p>Encontre nossas unidades de atendimento.</p>
        </div>
        @if(isset($locais) && $locais->count() > 0)
            <div class="locations-grid">
                @foreach($locais as $local)
                    <div class="location-card">
                        <h3>{{ $local->nome }}</h3>
                        <p class="location-info"><i class="fas fa-map-marker-alt"></i><span>{{ $local->endereco }}</span></p>
                        
                        @if($local->telefone)
                            <p class="location-info"><i class="fas fa-phone"></i><span>{{ $local->telefone }}</span></p>
                        @endif
                        
                        @if($local->horario_funcionamento)
                            <p class="location-info"><i class="fas fa-clock"></i><span>{{ $local->horario_funcionamento }}</span></p>
                        @endif

                        @if($local->servicos_oferecidos)
                            <div class="location-services">
                                <h4 class="services-title">
                                    <span>Serviços Oferecidos</span>
                                </h4>
                                <div class="services-list">
                                    {!! nl2br(e($local->servicos_oferecidos)) !!}
                                </div>
                            </div>
                        @endif
                        
                        @if($local->mapa_url)
                            <a href="{{ $local->mapa_url }}" target="_blank" class="map-link">Ver no mapa <i class="fas fa-external-link-alt"></i></a>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <p class="placeholder-text">Informações de contato em breve.</p>
        @endif
    </div>
</section>

{{-- SERVIÇOS (LINKS RÁPIDOS) --}}
<section id="servicos" class="section bg-white">
    <div class="container">
        <div class="section-header">
            <h2>Serviços</h2>
            <p>Acesso rápido aos principais serviços e informações.</p>
        </div>
        @if(isset($links_rapidos) && $links_rapidos->count() > 0)
            <div class="services-grid">
                @foreach($links_rapidos as $link)
                    <a href="{{ $link->url }}" target="_blank" class="service-card">
                        <div class="service-card-icon">
                            <i class="{{ $link->icone }}"></i>
                        </div>
                        <h3>{{ $link->titulo }}</h3>
                        <p>{{ $link->descricao_curta }}</p>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</section>

{{-- NOTÍCIAS --}}
<section id="noticias" class="section">
    <div class="container">
        <div class="section-header">
            <h2>Últimas Notícias</h2>
            <p>Acompanhe as ações e comunicados oficiais do município.</p>
        </div>
        @if(isset($noticias) && $noticias->count() > 0)
            <div class="news-grid">
                @foreach($noticias as $noticia)
                    <article class="news-card">
                        @if($noticia->imagem)
                            <a href="{{ route('noticias.show', $noticia->id) }}"><img src="{{ asset('storage/'.$noticia->imagem) }}" alt="{{ $noticia->titulo }}" class="news-card-image"></a>
                        @else
                            <a href="{{ route('noticias.show', $noticia->id) }}"><img src="/placeholder.svg?height=220&width=400&text=Sem+Imagem" alt="Sem imagem" class="news-card-image"></a>
                        @endif
                        <div class="news-card-content">
                            <span class="news-card-date">{{ $noticia->data_publicacao ? $noticia->data_publicacao->format('d/m/Y') : $noticia->created_at->format('d/m/Y') }}</span>
                            <h3 class="news-card-title">{{ $noticia->titulo }}</h3>
                            <p class="news-card-summary">{{ Str::limit($noticia->resumo, 130) }}</p>
                            <a href="{{ route('noticias.show', $noticia->id) }}" class="news-card-link">Ler mais <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <p class="placeholder-text">Nenhuma notícia publicada ainda.</p>
        @endif
    </div>
</section>

{{-- EVENTOS --}}
<section id="eventos" class="section bg-white">
    <div class="container">
        <div class="section-header">
            <h2>Agenda de Eventos</h2>
            <p>Participe dos próximos eventos, workshops e atividades.</p>
        </div>
        <div class="events-container">
            @if(isset($eventos) && $eventos->count() > 0)
                <ul class="events-list">
                    @foreach($eventos as $evento)
                        <li class="event-card">
                            <div class="event-date">
                                <span>{{ $evento->data_evento->format('d') }}</span>
                                <span>{{ $evento->data_evento->format('M') }}</span>
                            </div>
                            <div class="event-details">
                                <div class="event-header">
                                    <h3 class="event-title">{{ $evento->titulo }}</h3>
                                    <div class
                                    ="event-meta">
                                        {{-- Espaço adicionado depois do ":" --}}
                                        <p><i class="fas fa-clock"></i><strong>Horário: </strong>&nbsp;{{ $evento->data_evento->format('H:i') }}</p>
                                        <p><i class="fas fa-map-marker-alt"></i><strong>Local: </strong>&nbsp;{{ $evento->local }}</p>
                                    </div>
                                </div>
                                @if($evento->descricao)
                                    <div class="event-description">
                                        {!! nl2br(e($evento->descricao)) !!}
                                    </div>
                                @endif
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="placeholder-text">Nenhum evento agendado no momento.</p>
            @endif
        </div>
    </div>
</section>

{{-- LEGISLAÇÃO --}}
<section id="legislacao" class="section">
    <div class="container">
        <div class="section-header">
            <h2>Legislação</h2>
            <p>Acesse as leis.</p>
        </div>

        {{-- BOTÃO CENTRALIZADO (sempre visível) --}}
        <div class="legislation-footer">
            <a href="https://leismunicipais.com.br/prefeitura/pr/assai/categorias/assistencia-social" target="_blank" class="btn-secondary">
                <span>Acessar Repositório de Leis</span>
                <i class="fas fa-external-link-alt"></i>
            </a>
        </div>

        @if(isset($legislacoes) && $legislacoes->count() > 0)
            {{-- A lista de documentos continua aqui --}}
            <div class="legislation-container">
                <ul class="legislation-list">
                    @foreach($legislacoes as $legislacao)
                        <li class="legislation-item">
                            <div>
                                <h3>{{ $legislacao->titulo }}</h3>
                                @if($legislacao->data_publicacao)
                                    <p>Publicado em: {{ $legislacao->data_publicacao->format('d/m/Y') }}</p>
                                @endif
                            </div>
                            <a href="{{ asset('storage/' . $legislacao->arquivo) }}" target="_blank" class="download-button">
                                <i class="fas fa-download"></i>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</section>

{{-- CANAIS DE ATENDIMENTO --}}
<section id="atendimento" class="cta-section">
    <div class="container">
        <h2>Canais de Atendimento</h2>
        <p>Sua opinião é importante. Entre em contato conosco.</p>
        <div class="cta-buttons">
            {{-- Whatsapp da secretaria --}}
             <a href="#" class="btn btn-primary">Fale Conosco</a>
        </div>
    </div>
</section>

{{-- FAQ --}}
<section id="faq" class="section bg-white">
    <div class="container">
        <div class="section-header">
            <h2>Perguntas Frequentes</h2>
            <p>Tire suas dúvidas sobre nossos serviços e programas.</p>
        </div>
        @if(isset($faqs) && $faqs->count() > 0)
            <div class="faq-container" x-data="{ open: null }">
                @foreach($faqs as $faq)
                    <div class="faq-item">
                        <h2>
                            <button @click="open = (open === '{{ $faq->id }}' ? null : '{{ $faq->id }}')" class="faq-question">
                                <span>{{ $faq->pergunta }}</span>
                                <i class="fas fa-xs" :class="open === '{{ $faq->id }}' ? 'fa-minus' : 'fa-plus'"></i>
                            </button>
                        </h2>
                        <div x-show="open === '{{ $faq->id }}'" x-collapse.duration.500ms class="faq-answer">
                            <div>
                               <p>{{ $faq->resposta }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
             <p class="placeholder-text">Nenhuma pergunta frequente cadastrada.</p>
        @endif
    </div>
</section>

@include('layouts.footer')

</body>
</html>