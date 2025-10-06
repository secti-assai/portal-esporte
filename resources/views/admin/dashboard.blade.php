@extends('layouts.header')

@section('content')
<style>
    .sidebar {
        background: #0b1a33;
        color: white;
        position: fixed;
        left: 0;
        top: 0;
        bottom: 0;
        width: 250px;
        padding: 30px 20px;
        z-index: 20;
    }

    .sidebar h2 {
        font-size: 1.4rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        color: #fff;
    }

    .sidebar a {
        display: block;
        color: #d1d5db;
        padding: 10px 0;
        font-weight: 500;
        transition: 0.2s;
    }

    .sidebar a:hover,
    .sidebar a.active {
        color: #fff;
        font-weight: 600;
    }

    .content {
        margin-left: 260px;
        background: #f9fafb;
        min-height: 100vh;
        padding: 30px;
    }

    .card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.06);
        padding: 20px;
        transition: 0.2s;
    }

    .card:hover {
        transform: translateY(-3px);
    }

    .table th {
        background-color: #2563eb;
        color: white;
        font-weight: 600;
    }

    .table td {
        color: #333;
        vertical-align: middle;
    }

    .dashboard-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .dashboard-header h1 {
        font-size: 1.8rem;
        font-weight: 700;
        color: #111827;
    }
</style>

<div class="sidebar">
    <h2>Administração</h2>
    <a href="{{ route('admin.dashboard') }}" class="active"><i class="fas fa-newspaper mr-2"></i> Notícias</a>
    <a href="#"><i class="fas fa-chart-line mr-2"></i> Estatísticas</a>
    <a href="#"><i class="fas fa-user-cog mr-2"></i> Usuários</a>
    <hr class="my-3 border-gray-600">
    <a href="{{ route('admin.logout') }}" class="text-red-400 hover:text-red-300"><i class="fas fa-sign-out-alt mr-2"></i> Sair</a>
</div>

<div class="content">
    <div class="dashboard-header">
        <h1>📊 Painel de Controle</h1>
        <a href="{{ route('admin.noticias.create') }}" class="bg-green-600 hover:bg-green-700 text-white font-semibold px-5 py-2 rounded-lg shadow">
            <i class="fas fa-plus"></i> Nova Notícia
        </a>
    </div>

    <!-- Cards -->
    <div class="grid md:grid-cols-3 sm:grid-cols-2 gap-6 mb-10">
        <div class="card border-l-4 border-green-500">
            <p class="text-gray-600 text-sm">Total de Notícias</p>
            <h3 class="text-3xl font-bold text-gray-800">{{ $noticias->count() }}</h3>
        </div>
        <div class="card border-l-4 border-blue-500">
            <p class="text-gray-600 text-sm">Publicadas</p>
            <h3 class="text-3xl font-bold text-gray-800">{{ $noticias->where('status','publicada')->count() }}</h3>
        </div>
        <div class="card border-l-4 border-yellow-500">
            <p class="text-gray-600 text-sm">Rascunhos</p>
            <h3 class="text-3xl font-bold text-gray-800">{{ $noticias->where('status','rascunho')->count() }}</h3>
        </div>
    </div>

    <!-- Tabela -->
    <div class="card">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6 flex items-center gap-2">
            <i class="fas fa-newspaper text-blue-500"></i> Gerenciar Notícias
        </h2>

        @if($noticias->count() > 0)
            <div class="overflow-x-auto">
                <table class="table table-bordered w-full border">
                    <thead>
                        <tr>
                            <th class="px-4 py-3">Título</th>
                            <th class="px-4 py-3">Data</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3 text-right">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($noticias as $noticia)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3">{{ $noticia->titulo }}</td>
                                <td class="px-4 py-3">{{ $noticia->data_publicacao ? $noticia->data_publicacao->format('d/m/Y') : '-' }}</td>
                                <td class="px-4 py-3">
                                    @if($noticia->status == 'publicada')
                                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">Publicada</span>
                                    @else
                                        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">Rascunho</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-right">
                                    <a href="{{ route('admin.noticias.edit', $noticia->id) }}" class="text-blue-600 hover:text-blue-800 mr-3"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('admin.noticias.destroy', $noticia->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('Excluir esta notícia?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-center text-gray-500 text-lg py-10">Nenhuma notícia cadastrada ainda.</p>
        @endif
    </div>
</div>
@endsection
