<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portal de Assitência Social - Secretaria Municipal de Assaí')</title>
    <meta name="description"
        content="@yield('description', 'Promovendo saúde, bem-estar e integração social através do esporte em nossa cidade')">

    {{-- Fontes e Ícones --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        /* === CORES BASE === */
        :root {
            --azul-escuro: #0B1629;
            --cinza-claro: #A5B0C5;
            --azul-claro: #60a5fa;
        }

        body {
            font-family: "Inter", sans-serif;
            /* O padding-top é removido quando a view é do admin, para não empurrar o conteúdo para baixo */
            padding-top:
                {{ request()->is('admin/*') ? '0' : '64px' }}
            ;
        }

        /* === HEADER === */
        .main-header {
            background-color: var(--azul-escuro) !important;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3) !important;
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
            font-size: 1rem;
            font-weight: 700;
            color: white !important;
        }

        /* === MENU === */
        .main-header .nav-link {
            color: rgba(255, 255, 255, 0.85) !important;
        }

        .main-header .nav-link:hover,
        .main-header .nav-link.active {
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

        @media (max-width: 991px) {
            .main-header .navbar-collapse {
                background-color: var(--azul-escuro) !important;
            }

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

        @media (max-width: 356px) {
            .brand-text span {
                font-size: 0.75rem !important;
            }
        }
    </style>

    @yield('styles')
</head>

<body>
    {{-- O header só será exibido se a rota não for do painel de admin --}}
    @unless(request()->is('admin/*'))
        <header class="main-header fixed-top">
            <nav class="navbar navbar-expand-lg navbar-dark py-1">
                <div class="container">
                    <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center text-decoration-none text-white">
                        <img src="{{ asset('img/prefeitura.png') }}" alt="Brasão de Assaí" class="header-logo me-2">
                        <div class="brand-text">
                            <span>Portal da Assistência Social</span>
                        </div>
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuPrincipal"
                        aria-controls="menuPrincipal" aria-expanded="false" aria-label="Abrir menu">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="menuPrincipal">
                        <ul class="navbar-nav ms-auto gap-lg-3 mt-3 mt-lg-0">
                            <li><a href="{{ url('/#inicio') }}" class="nav-link">Início</a></li>
                            <li><a href="{{ url('/#equipe') }}" class="nav-link">Gestão</a></li>
                            <li><a href="{{ url('/#locais') }}" class="nav-link">Locais</a></li>
                            <li><a href="{{ url('/#servicos') }}" class="nav-link">Serviços</a></li>
                            <li><a href="{{ route('noticias.index') }}" class="nav-link">Notícias</a></li> 
                            <li><a href="{{ url('/#eventos') }}" class="nav-link">Eventos</a></li>
                            <li><a href="{{ url('/#legislacao') }}" class="nav-link">Legislação</a></li>
                            <li><a href="{{ url('/#atendimento') }}" class="nav-link">Atendimento</a></li>
                            <li><a href="{{ url('/#faq') }}" class="nav-link">FAQ</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
    @endunless

    <main>
        @yield('content')
    </main>

    @yield('scripts')
</body>

</html>
