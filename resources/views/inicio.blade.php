@extends('layouts.layout')

@section('title', 'Secretaria de Esporte')

@section('content')

    <section id="inicio" class="hero">
        <div class="hero-slide active">
            <div class="hero-bg" style="background-image: url('{{ asset('assets/secretaria.jpg') }}')"></div>
            <div class="hero-overlay"></div>
        </div>
        <div class="hero-slide">
            <div class="hero-bg" style="background-image: url('https://placehold.co/1200x800/dc2626/white?text=Instalações')"></div>
            <div class="hero-overlay"></div>
        </div>
        <div class="hero-slide">
            <div class="hero-bg" style="background-image: url('https://placehold.co/1200x800/1f2937/white?text=Eventos')"></div>
            <div class="hero-overlay"></div>
        </div>

        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title" id="heroTitle">Esporte para Todos</h1>
                <p class="hero-subtitle" id="heroSubtitle">Promovendo saúde, bem-estar e integração social através do esporte em nossa cidade</p>
                <div class="hero-buttons">
                    <a href="#modalidades" class="btn btn-primary">
                        <i class="fas fa-running"></i>
                        Conheça as Modalidades
                    </a>
                    <a href="#eventos" class="btn btn-outline">
                        <i class="fas fa-calendar"></i>
                        Próximos Eventos
                    </a>
                </div>
            </div>
        </div>

        <div class="hero-controls">
            <button class="btn-ghost" id="heroPlayPause" title="Play/Pause">
                <i class="fas fa-pause"></i>
            </button>
            <div class="hero-indicators">
                <div class="hero-indicator active" data-slide="0"></div>
                <div class="hero-indicator" data-slide="1"></div>
                <div class="hero-indicator" data-slide="2"></div>
            </div>
        </div>
    </section>

    <section class="stats">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-icon"><i class="fas fa-users"></i></div>
                    <div class="stat-number" data-count="600">0</div>
                    <div class="stat-label">Atletas Ativos</div>
                </div>
                <div class="stat-item">
                    <div class="stat-icon"><i class="fas fa-trophy"></i></div>
                    <div class="stat-number" data-count="12">0</div>
                    <div class="stat-label">Modalidades</div>
                </div>
                <div class="stat-item">
                    <div class="stat-icon"><i class="fas fa-map-marker-alt"></i></div>
                    <div class="stat-number" data-count="8">0</div>
                    <div class="stat-label">Instalações</div>
                </div>
                <div class="stat-item">
                    <div class="stat-icon"><i class="fas fa-calendar"></i></div>
                    <div class="stat-number" data-count="25">0</div>
                    <div class="stat-label">Eventos/Ano</div>
                </div>
            </div>
        </div>
    </section>

    <section class="section scoreboard-section">
        <div class="container">
            <h2 class="section-title">Placares e Resultados</h2>
            <p class="section-subtitle">Acompanhe os resultados dos jogos e próximas partidas</p>
            <div class="scoreboard-tabs">
                <button class="scoreboard-tab active" data-tab="live"><i class="fas fa-play-circle"></i> Ao Vivo</button>
                <button class="scoreboard-tab" data-tab="results"><i class="fas fa-trophy"></i> Resultados</button>
                <button class="scoreboard-tab" data-tab="upcoming"><i class="fas fa-calendar-alt"></i> Próximos Jogos</button>
            </div>
            <div class="scoreboard-content">
                <div class="scoreboard-tab-content active" id="live"><div class="scoreboard-grid" id="liveGames"></div></div>
                <div class="scoreboard-tab-content" id="results"><div class="scoreboard-grid" id="resultsGames"></div></div>
                <div class="scoreboard-tab-content" id="upcoming"><div class="scoreboard-grid" id="upcomingGames"></div></div>
            </div>
        </div>
    </section>

    <section id="noticias" class="section section-alt">
        <div class="container">
            <h2 class="section-title">Últimas Notícias</h2>
            <p class="section-subtitle">Fique por dentro de tudo que acontece no mundo dos esportes em nossa cidade</p>
            <div class="news-grid" id="newsGrid"></div>
        </div>
    </section>

    <section id="modalidades" class="section">
        <div class="container">
            <h2 class="section-title">Modalidades Esportivas</h2>
            <p class="section-subtitle">Descubra as diversas modalidades esportivas disponíveis em nossa cidade</p>
            <div class="modalities-filters">
                <button class="filter-btn active" data-filter="all"><i class="fas fa-filter"></i> Todas</button>
                <button class="filter-btn" data-filter="coletivo"><i class="fas fa-users"></i> Coletivo</button>
                <button class="filter-btn" data-filter="individual"><i class="fas fa-user"></i> Individual</button>
            </div>
            <div class="modalities-grid" id="modalitiesGrid"></div>
        </div>
    </section>

    <section id="eventos" class="section section-alt">
        <div class="container">
            <h2 class="section-title">Próximos Eventos</h2>
            <p class="section-subtitle">Não perca os eventos esportivos mais importantes da cidade</p>
            <div class="events-grid" id="eventsGrid"></div>
        </div>
    </section>

    <section id="instalacoes" class="instalacoes">
        <div class="container">
            <h2 class="section-title" style="color: white;">Nossas Instalações</h2>
            <p class="section-subtitle" style="color: rgba(255,255,255,0.9);">Conheça nossas modernas instalações esportivas</p>
            <div class="facilities-grid">
                <div class="facility-card card">
                    <div class="facility-image"><img src="https://placehold.co/400x300/e5e7eb/374151?text=Ginásio" alt="Ginásio Municipal"></div>
                    <div class="facility-content">
                        <h3 class="facility-title">Ginásio Municipal</h3>
                        <p class="facility-description">Espaço completo para modalidades indoor com capacidade para 500 pessoas</p>
                        <div class="facility-features">
                            <span class="badge">500 lugares</span>
                            <span class="badge">6h às 22h</span>
                            <span class="badge">Ar condicionado</span>
                        </div>
                    </div>
                </div>
                <div class="facility-card card">
                    <div class="facility-image"><img src="https://placehold.co/400x300/e5e7eb/374151?text=Piscina" alt="Piscina Olímpica"></div>
                    <div class="facility-content">
                        <h3 class="facility-title">Piscina Olímpica</h3>
                        <p class="facility-description">Piscina semiolímpica para natação, polo aquático e atividades aquáticas</p>
                        <div class="facility-features">
                            <span class="badge">25m</span>
                            <span class="badge">Aquecida</span>
                            <span class="badge">8 raias</span>
                        </div>
                    </div>
                </div>
                <div class="facility-card card">
                    <div class="facility-image"><img src="https://placehold.co/400x300/e5e7eb/374151?text=Campo" alt="Campo Municipal"></div>
                    <div class="facility-content">
                        <h3 class="facility-title">Campo Municipal</h3>
                        <p class="facility-description">Campo oficial de futebol com grama sintética e iluminação noturna</p>
                        <div class="facility-features">
                            <span class="badge">Oficial</span>
                            <span class="badge">Iluminado</span>
                            <span class="badge">Grama sintética</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal" id="newsModal">
        <div class="modal-content">
            <button class="modal-close" id="modalClose"><i class="fas fa-times"></i></button>
            <div id="modalBody"></div>
        </div>
    </div>
@endsection