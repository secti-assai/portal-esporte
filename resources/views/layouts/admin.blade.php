<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>

    <!-- TailwindCSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="bg-gray-100 flex">

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="text-center mb-10">
            <h2 class="text-xl font-bold text-white">Painel Admin</h2>
            <span class="text-xs text-gray-400">Portal da Assistência Social</span>
        </div>

        <nav class="flex-1 space-y-2">
            <!-- Notícias -->
            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center gap-3 py-2.5 px-3 rounded-lg hover:bg-gray-800 transition
                      {{ request()->routeIs('admin.dashboard*') || request()->routeIs('admin.noticias*') ? 'bg-gray-800 text-white' : '' }}">
                <i class="fas fa-newspaper fa-fw w-5 text-center"></i>
                <span>Notícias</span>
            </a>

            <!-- Eventos -->
            <a href="{{ route('admin.eventos.index') }}"
               class="flex items-center gap-3 py-2.5 px-3 rounded-lg hover:bg-gray-800 transition
                      {{ request()->routeIs('admin.eventos*') ? 'bg-gray-800 text-white' : '' }}">
                <i class="fas fa-calendar fa-fw w-5 text-center text-yellow-400"></i>
                <span>Eventos</span>
            </a>

            <!-- Categorias -->
            <a href="{{ route('admin.categorias.index') }}"
               class="flex items-center gap-3 py-2.5 px-3 rounded-lg hover:bg-gray-800 transition
                      {{ request()->routeIs('admin.categorias*') ? 'bg-gray-800 text-white' : '' }}">
                <i class="fas fa-tags fa-fw w-5 text-center text-purple-400"></i>
                <span>Categorias</span>
            </a>

            <!-- Estatísticas -->
            <a href="#"
               class="flex items-center gap-3 py-2.5 px-3 rounded-lg hover:bg-gray-800 transition">
                <i class="fas fa-chart-line fa-fw w-5 text-center text-green-400"></i>
                <span>Estatísticas</span>
            </a>

            <!-- Usuários -->
            <a href="#"
               class="flex items-center gap-3 py-2.5 px-3 rounded-lg hover:bg-gray-800 transition">
                <i class="fas fa-user-cog fa-fw w-5 text-center text-blue-400"></i>
                <span>Usuários</span>
            </a>

            <hr class="my-4 border-gray-700">

            <!-- Ver Site -->
            <a href="{{ route('home') }}" target="_blank"
               class="flex items-center gap-3 py-2.5 px-3 rounded-lg hover:bg-gray-800 transition">
                <i class="fas fa-globe fa-fw w-5 text-center text-teal-400"></i>
                <span>Ver Site</span>
            </a>

            <!-- Logout -->
            <a href="{{ route('admin.logout') }}"
               class="flex items-center gap-3 py-2.5 px-3 rounded-lg text-red-400 hover:text-red-300 transition">
                <i class="fas fa-sign-out-alt fa-fw w-5 text-center"></i>
                <span>Sair</span>
            </a>
        </nav>
    </div>

    <!-- Overlay escuro ao abrir menu mobile -->
    <div class="sidebar-overlay" id="sidebar-overlay"></div>

    <!-- Conteúdo -->
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
