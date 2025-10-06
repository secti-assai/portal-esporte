<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portal de Esportes - Secretaria Municipal de Assaí')</title>
    <meta name="description" content="@yield('description', 'Promovendo saúde, bem-estar e integração social através do esporte em nossa cidade')">

    {{-- Fontes e Ícones --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    
    {{-- CSS da Página de Conteúdo --}}
    <link href="{{ asset('/css/styles.css') }}" rel="stylesheet">

    <style>
        /* === CORES BASE === */
        :root {
            --azul-escuro: #0B1629;
            --cinza-claro: #A5B0C5;
            --azul-claro: #60a5fa;
        }

        body {
            font-family: "Inter", sans-serif;
            padding-top: 64px;
        }

        /* === HEADER === */
        .main-header {
            background-color: var(--azul-escuro) !important;
            box-shadow: 0 2px 8px rgba(0,0,0,0.3) !important;
            z-index: 1050 !important;
        }

        .header-logo {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            background-color: white;
            padding: 5px;
        }

        .brand-text span {
            font-size: 1.15rem;
            font-weight: 700;
            color: white !important;
        }

        /* === MENU === */
        .main-header .nav-link {
            color: rgba(255, 255, 255, 0.85) !important;
        }
        .main-header .nav-link:hover, .main-header .nav-link.active {
            color: var(--azul-claro) !important;
        }
        .main-header .navbar-toggler {
            border: 1px solid rgba(255, 255, 255, 0.4) !important;
            padding: .25rem .6rem;
        }
        .main-header .navbar-toggler:focus {
            box-shadow: 0 0 0 0.25rem rgba(96, 165, 250, 0.25);
        }
        .main-header .navbar-toggler-icon {
             background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.8%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e") !important;
        }

        /* === FOOTER === */
        footer.footer {
            background-color: var(--azul-escuro);
            color: white;
            padding: 3rem 1rem 1rem;
            margin-top: 4rem;
        }
        footer .fw-bold { color: white; }
        footer .text-secondary { color: var(--cinza-claro) !important; }
        footer ul li a { color: var(--cinza-claro); text-decoration: none; transition: color 0.2s; }
        footer ul li a:hover { color: var(--azul-claro); }
        footer .bi { color: var(--azul-claro); }
        footer .border-top { border-color: rgba(255, 255, 255, 0.1) !important; }
        footer .social-links a { color: white; font-size: 1.25rem; transition: color 0.3s ease; }
        footer .social-links a:hover { color: var(--azul-claro); }
        @media (max-width: 768px) {
            footer .row { text-align: center; }
            footer .d-flex { justify-content: center !important; }
        }

        /* === CORREÇÃO FINAL PARA CONFLITO DE MENU === */
        @media (max-width: 991px) {
            .main-header .navbar-collapse {
                background-color: var(--azul-escuro) !important;
            }
            /* Esta é a regra crucial que anula o conflito do styles.css */
            .main-header .navbar-nav {
                position: static !important;
                flex-direction: column !important;
                opacity: 1 !important;
                visibility: visible !important;
                transform: none !important;
                box-shadow: none !important;
                padding: 0 !important;
                background: transparent !important;
                align-items: center !important;
            }
             .main-header .nav-link {
                border-bottom: none !important;
                padding: 0.75rem 1rem !important;
            }
        }
    </style>

    @yield('styles')
</head>

<body>
<header class="main-header fixed-top">
    <nav class="navbar navbar-expand-lg navbar-dark py-1">
        <div class="container">
            <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center text-decoration-none text-white">
                <img src="{{ asset('assets/brasao.png') }}" alt="Brasão de Assaí" class="header-logo me-2">
                <div class="brand-text">
                    <span>Portal de Esportes</span>
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuPrincipal"
                    aria-controls="menuPrincipal" aria-expanded="false" aria-label="Abrir menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menuPrincipal">
                <ul class="navbar-nav ms-auto gap-lg-3 mt-3 mt-lg-0">
                    <li class="nav-item"><a href="#inicio" class="nav-link">Início</a></li>
                    <li class="nav-item"><a href="#noticias" class="nav-link">Notícias</a></li>
                    <li class="nav-item"><a href="#modalidades" class="nav-link">Modalidades</a></li>
                    <li class="nav-item"><a href="#eventos" class="nav-link">Eventos</a></li>
                    <li class="nav-item"><a href="#instalacoes" class="nav-link">Instalações</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<main>
    @yield('content')
</main>

<footer class="footer">
    <div class="container">
        <div class="row gy-4 justify-content-between"> 
            <div class="col-lg-4 col-md-6">
                <div class="d-flex align-items-center mb-3">
                    <img src="{{ asset('assets/brasao.png') }}" alt="Prefeitura de Assaí" width="60" class="me-3">
                    <div>
                        <h5 class="fw-bold mb-0">Prefeitura Municipal de Assaí</h5>
                        <small class="text-secondary d-block">{{ 'Portal de Esportes' }}</small>
                    </div>
                </div>
                <p class="small text-secondary mb-3">
                    Trabalhando para o desenvolvimento e bem-estar dos cidadãos assaiense com transparência e eficiência.
                </p>
                <div class="d-flex gap-3 social-links">
                    <a href="https://www.facebook.com/prefeituraassai" target="_blank"><i class="bi bi-facebook"></i></a>
                    <a href="https://www.instagram.com/prefeituraassai" target="_blank"><i class="bi bi-instagram"></i></a>
                    <a href="https://www.youtube.com/channel/UCME3TZ6wVWFkIoTd4R9lyFw" target="_blank"><i class="bi bi-youtube"></i></a>
                    <a href="https://wa.me/554332621313" target="_blank"><i class="bi bi-whatsapp"></i></a>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <h6 class="fw-bold mb-3 fs-5">Serviços</h6>
                <ul class="list-unstyled small">
                    <li class="mb-2"><a href="https://transparencia.betha.cloud/#/yyGw8hIiYdv6bs-avrzVUg==">Portal da Transparência</a></li>
                    <li class="mb-2"><a href="https://transparencia.betha.cloud/#/yyGw8hIiYdv6bs-avrzVUg==/consulta/95802">Licitações</a></li>
                    <li class="mb-2"><a href="https://www.assai.pr.gov.br/concurso">Concursos Públicos</a></li>
                    <li class="mb-2"><a href="https://www.doemunicipal.com.br/prefeituras/4">Diário Oficial</a></li>
                    <li class="mb-2"><a href="https://assai.pr.gov.br/ouvidoria">Ouvidoria</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-6">
                <h6 class="fw-bold mb-3 fs-5">Secretarias</h6>
                <ul class="list-unstyled small">
                    <li class="mb-2"><a href="https://assai.pr.gov.br/secretaria/5">Educação</a></li>
                    <li class="mb-2"><a href="https://assai.pr.gov.br/secretaria/4">Saúde</a></li>
                    <li class="mb-2"><a href="https://assai.pr.gov.br/secretaria/7">Assistência Social</a></li>
                    <li class="mb-2"><a href="https://assai.pr.gov.br/secretaria/11">Obras e Serviços</a></li>
                    <li class="mb-2"><a href="https://assai.pr.gov.br/secretaria/9">Trabalho</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6">
                <h6 class="fw-bold mb-3 fs-5">Contato</h6>
                <ul class="list-unstyled small mb-0">
                    <li class="mb-2"><i class="bi bi-geo-alt-fill me-2"></i> Av. Rio de Janeiro, 720 - Centro - Assaí/PR</li>
                    <li class="mb-2"><i class="bi bi-telephone-fill me-2"></i> (43) 3262-1313</li>
                    <li class="mb-2"><i class="bi bi-envelope-fill me-2"></i>  assai@assai.pr.gov.br</li>
                </ul>
            </div>
        </div>
        <div class="border-top mt-4 pt-3 text-center small text-secondary">
            © {{ date('Y') }} Prefeitura Municipal de Assaí. Todos os direitos reservados.
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/script.js') }}"></script>

@yield('scripts')
</body>
</html>