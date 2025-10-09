<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="bg-gray-100 flex">

    <div class="sidebar" id="sidebar">
        <div class="text-center mb-10">
            <h2 class="text-xl font-bold text-white">Painel Admin</h2>
            <span class="text-xs text-gray-400">Portal da Assistência Social</span>
        </div>

        <nav class="flex-1 space-y-1">
            <p class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Conteúdo</p>

            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard*') || request()->routeIs('admin.noticias*') ? 'active' : '' }}">
                <i class="fas fa-newspaper fa-fw w-5 text-center"></i>
                <span>Notícias</span>
            </a>
            <a href="{{ route('admin.eventos.index') }}" class="nav-link {{ request()->routeIs('admin.eventos*') ? 'active' : '' }}">
                <i class="fas fa-calendar-alt fa-fw w-5 text-center text-yellow-400"></i>
                <span>Eventos</span>
            </a>
            <!-- Categorias removidas (categoria fixa: Assistência Social) -->
            <a href="{{ route('admin.equipe.index') }}" class="nav-link {{ request()->routeIs('admin.equipe*') ? 'active' : '' }}">
                <i class="fas fa-users fa-fw w-5 text-center text-orange-400"></i>
                <span>Quem é Quem</span>
            </a>
            <a href="{{ route('admin.locais.index') }}" class="nav-link {{ request()->routeIs('admin.locais*') ? 'active' : '' }}">
                <i class="fas fa-map-marked-alt fa-fw w-5 text-center text-cyan-400"></i>
                <span>Locais</span>
            </a>
            <a href="{{ route('admin.links-rapidos.index') }}" class="nav-link {{ request()->routeIs('admin.links-rapidos*') ? 'active' : ''}}">
                <i class="fas fa-link fa-fw w-5 text-center text-indigo-400"></i>
                <span>Links Rápidos</span>
            </a>
            <a href="{{ route('admin.faqs.index') }}" class="nav-link {{ request()->routeIs('admin.faqs*') ? 'active' : ''}}">
                <i class="fas fa-question-circle fa-fw w-5 text-center text-pink-400"></i>
                <span>FAQ</span>
            </a>

            <hr class="my-4 border-gray-700">

            <p class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2 mt-4">Análise</p>

            <a href="{{ route('admin.stats') }}" class="nav-link {{ request()->routeIs('admin.stats*') ? 'active' : ''}}">
                <i class="fas fa-chart-line fa-fw w-5 text-center text-green-400"></i>
                <span>Estatísticas & BI</span>
            </a>

            <hr class="my-4 border-gray-700">

            <a href="{{ route('home') }}" target="_blank" class="nav-link">
                <i class="fas fa-globe fa-fw w-5 text-center text-teal-400"></i>
                <span>Ver Site</span>
            </a>
            <a href="{{ route('admin.logout') }}" class="nav-link text-red-400 hover:text-red-300 hover:bg-gray-800">
                <i class="fas fa-sign-out-alt fa-fw w-5 text-center"></i>
                <span>Sair</span>
            </a>
        </nav>
    </div>

    <div class="sidebar-overlay" id="sidebar-overlay"></div>

    <div class="main-content-wrapper flex-1" id="main-content-wrapper">
        <header class="admin-top-bar flex items-center gap-4 bg-white shadow p-4 md:hidden">
            <button id="hamburger-btn" class="hamburger-btn text-gray-700">
                <i class="fas fa-bars"></i>
            </button>
            <h1 class="text-lg font-semibold text-gray-800">Painel Administrativo</h1>
        </header>

        <main class="main-content p-8 overflow-y-auto">
            @yield('content')
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const hamburgerBtn = document.getElementById('hamburger-btn');
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');

            function toggleSidebar() {
                sidebar.classList.toggle('open');
                overlay.classList.toggle('open');
            }

            if (hamburgerBtn) hamburgerBtn.addEventListener('click', toggleSidebar);
            if (overlay) overlay.addEventListener('click', toggleSidebar);
        });
    </script>
</body>
</html>
