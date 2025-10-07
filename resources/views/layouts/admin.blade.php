<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="bg-gray-100">

    <div class="sidebar" id="sidebar">
        <div class="text-center mb-10">
            <h2 class="text-xl font-bold text-white">Painel Admin</h2>
            <span class="text-xs text-gray-400">Portal de Ass. Social</span>
        </div>
        <nav>
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard*') || request()->routeIs('admin.noticias*') ? 'active' : '' }}">
                <i class="fas fa-newspaper fa-fw w-6 text-center"></i>
                <span>Notícias</span>
            </a>
            <a href="{{ route('admin.eventos.index') }}" class="{{ request()->routeIs('admin.eventos*') ? 'active' : '' }}">
                <i class="fas fa-calendar fa-fw w-6 text-center"></i>
                <span>Eventos</span>
            </a>
            <a href="#">
                <i class="fas fa-user-cog fa-fw w-6 text-center"></i>
                <span>Usuários</span>
            </a>
            <hr class="my-4 border-gray-700">
            <a href="{{ route('home') }}" target="_blank">
                <i class="fas fa-globe fa-fw w-6 text-center"></i>
                <span>Ver Site</span>
            </a>
            <a href="{{ route('admin.logout') }}" class="text-red-400 hover:text-red-300">
                <i class="fas fa-sign-out-alt fa-fw w-6 text-center"></i>
                <span>Sair</span>
            </a>
        </nav>
    </div>

    <div class="sidebar-overlay" id="sidebar-overlay"></div>

    <div class="main-content-wrapper" id="main-content-wrapper">
        <header class="admin-top-bar">
            <button id="hamburger-btn" class="hamburger-btn">
                <i class="fas fa-bars"></i>
            </button>
            <h1 class="text-lg font-semibold text-gray-800">Painel Administrativo</h1>
        </header>

        <main class="main-content">
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

            if (hamburgerBtn) {
                hamburgerBtn.addEventListener('click', toggleSidebar);
            }

            if (overlay) {
                overlay.addEventListener('click', toggleSidebar);
            }
        });
    </script>

</body>
</html>
