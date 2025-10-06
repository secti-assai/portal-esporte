@extends('layouts.header')

@section('content')
<div class="min-h-screen bg-gray-50 py-10 px-6">
    <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow p-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-8 flex items-center gap-3">
            <i class="fas fa-pen"></i>
            {{ isset($noticia) ? 'Editar Notícia' : 'Nova Notícia' }}
        </h1>

        <form action="{{ isset($noticia) ? route('admin.noticias.update', $noticia->id) : route('admin.noticias.store') }}"
              method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($noticia))
                @method('PUT')
            @endif

            <div class="mb-6">
                <label class="block text-sm font-semibold mb-2">Título</label>
                <input type="text" name="titulo" value="{{ old('titulo', $noticia->titulo ?? '') }}"
                    class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-green-600" required>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-semibold mb-2">Resumo</label>
                <textarea name="resumo" rows="3"
                    class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-green-600"
                    required>{{ old('resumo', $noticia->resumo ?? '') }}</textarea>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-semibold mb-2">Conteúdo</label>
                <textarea name="conteudo" rows="7"
                    class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-green-600"
                    required>{{ old('conteudo', $noticia->conteudo ?? '') }}</textarea>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-semibold mb-2">Imagem (opcional)</label>
                <input type="file" name="imagem" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-green-600">
                @if(isset($noticia) && $noticia->imagem)
                    <img src="{{ asset('storage/' . $noticia->imagem) }}" alt="Imagem atual" class="mt-3 w-48 rounded shadow">
                @endif
            </div>

            <div class="mb-6">
                <label class="block text-sm font-semibold mb-2">Status</label>
                <select name="status" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-green-600">
                    <option value="rascunho" {{ old('status', $noticia->status ?? '') == 'rascunho' ? 'selected' : '' }}>Rascunho</option>
                    <option value="publicada" {{ old('status', $noticia->status ?? '') == 'publicada' ? 'selected' : '' }}>Publicada</option>
                </select>
            </div>

            <div class="flex justify-between mt-8">
                <a href="{{ route('admin.dashboard') }}"
                   class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold px-5 py-3 rounded-lg transition">
                   Cancelar
                </a>
                <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white font-semibold px-5 py-3 rounded-lg shadow transition">
                    <i class="fas fa-save"></i> Salvar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
