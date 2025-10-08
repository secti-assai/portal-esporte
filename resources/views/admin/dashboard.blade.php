@extends('layouts.admin')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">📊 Painel de Notícias</h1>
    <a href="{{ route('admin.noticias.create') }}"
       class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded-lg shadow-md transition-colors">
        <i class="fas fa-plus mr-2"></i> Nova Notícia
    </a>
</div>

<!-- Resumo -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-green-500">
        <p class="text-gray-500 text-sm font-semibold uppercase">Total</p>
        <h3 class="text-3xl font-bold text-gray-800 mt-2">{{ $noticias->count() }}</h3>
    </div>
    <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-blue-500">
        <p class="text-gray-500 text-sm font-semibold uppercase">Publicadas</p>
        <h3 class="text-3xl font-bold text-gray-800 mt-2">{{ $noticias->where('status','publicada')->count() }}</h3>
    </div>
    <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-yellow-500">
        <p class="text-gray-500 text-sm font-semibold uppercase">Rascunhos</p>
        <h3 class="text-3xl font-bold text-gray-800 mt-2">{{ $noticias->where('status','rascunho')->count() }}</h3>
    </div>
    <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-purple-500">
        <p class="text-gray-500 text-sm font-semibold uppercase">Categorias</p>
        <h3 class="text-3xl font-bold text-gray-800 mt-2">
            {{ $noticias->pluck('categoria')->filter()->unique()->count() }}
        </h3>
    </div>
</div>

<!-- Listagem -->
<div class="bg-white rounded-xl shadow-md p-4 sm:p-6">
    @if($noticias->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-600">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-3">Título</th>
                        <th scope="col" class="px-6 py-3">Categoria</th>
                        <th scope="col" class="px-6 py-3">Data</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                        <th scope="col" class="px-6 py-3 text-right">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($noticias as $noticia)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ Str::limit($noticia->titulo, 50) }}
                            </th>
                            <td class="px-6 py-4 text-gray-700">
                                {{ $noticia->categoria ?? '—' }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $noticia->data_publicacao ? $noticia->data_publicacao->format('d/m/Y') : '-' }}
                            </td>
                            <td class="px-6 py-4">
                                @if($noticia->status == 'publicada')
                                    <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Publicada</span>
                                @else
                                    <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Rascunho</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right whitespace-nowrap">
                                <a href="{{ route('admin.noticias.edit', $noticia->id) }}"
                                   class="font-medium text-blue-600 hover:underline mr-4">
                                    <i class="fas fa-edit mr-1"></i> Editar
                                </a>
                                <form action="{{ route('admin.noticias.destroy', $noticia->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="font-medium text-red-600 hover:underline"
                                            onclick="return confirm('Tem certeza que deseja excluir esta notícia?')">
                                        <i class="fas fa-trash-alt mr-1"></i> Excluir
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-center text-gray-500 py-10">Nenhuma notícia cadastrada ainda.</p>
    @endif
</div>

<!-- Gráficos & BI -->
<!-- BI movido para /admin/stats -->
<div class="mt-8">
    <a href="{{ route('admin.stats') }}" class="inline-block bg-indigo-600 text-white px-4 py-2 rounded-lg">Ir para Estatísticas</a>
</div>
@endsection
