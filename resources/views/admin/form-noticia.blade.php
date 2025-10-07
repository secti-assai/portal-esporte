@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-md p-6 sm:p-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-2xl sm:text-3xl font-bold text-gray-800 flex items-center gap-3">
            <i class="fas fa-pen text-blue-500"></i>
            <span>{{ isset($noticia) ? 'Editar Notícia' : 'Criar Nova Notícia' }}</span>
        </h1>
    </div>

    <form action="{{ isset($noticia) ? route('admin.noticias.update', $noticia->id) : route('admin.noticias.store') }}"
            method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @if(isset($noticia))
            @method('PUT')
        @endif

        <div>
            <label class="block text-sm font-semibold mb-2 text-gray-700">Título</label>
            <input type="text" name="titulo" value="{{ old('titulo', $noticia->titulo ?? '') }}"
                class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 transition" required>
        </div>

        <div>
            <label class="block text-sm font-semibold mb-2 text-gray-700">Resumo (Max: 500 caracteres)</label>
            <textarea name="resumo" rows="3"
                class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                required>{{ old('resumo', $noticia->resumo ?? '') }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-semibold mb-2 text-gray-700">Conteúdo Completo</label>
            <textarea name="conteudo" rows="8"
                class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                required>{{ old('conteudo', $noticia->conteudo ?? '') }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-semibold mb-2 text-gray-700">Imagem de Destaque</label>
            <input type="file" name="imagem" class="w-full border border-gray-300 rounded-lg p-2 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
            @if(isset($noticia) && $noticia->imagem)
                <img src="{{ asset('storage/' . $noticia->imagem) }}" alt="Imagem atual" class="mt-4 w-48 rounded-lg shadow">
                <p class="text-xs text-gray-500 mt-2">Imagem atual. Enviar um novo arquivo irá substituí-la.</p>
            @endif
        </div>

        <div>
            <label class="block text-sm font-semibold mb-2 text-gray-700">Status</label>
            <select name="status" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                <option value="rascunho" {{ old('status', $noticia->status ?? '') == 'rascunho' ? 'selected' : '' }}>Rascunho</option>
                <option value="publicada" {{ old('status', $noticia->status ?? '') == 'publicada' ? 'selected' : '' }}>Publicada</option>
            </select>
        </div>

        <div class="flex justify-end items-center pt-4">
            <a href="{{ route('admin.dashboard') }}"
                class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold px-6 py-3 rounded-lg transition mr-4">
                Cancelar
            </a>
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg shadow-md transition">
                <i class="fas fa-save mr-2"></i> Salvar
            </button>
        </div>
    </form>
</div>
@endsection