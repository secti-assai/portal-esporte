@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-md p-8">
     <div class="flex justify-between items-center mb-8 border-b pb-4">
        <h1 class="text-2xl font-bold text-gray-800 flex items-center gap-3">
            <i class="fas fa-link text-blue-500"></i>
            <span>{{ isset($linkRapido) ? 'Editar Link Rápido' : 'Novo Link Rápido' }}</span>
        </h1>
        <a href="{{ route('admin.links-rapidos.index') }}" class="text-sm text-gray-600 hover:text-gray-900">
             <i class="fas fa-arrow-left mr-2"></i> Voltar
        </a>
    </div>

    <form action="{{ isset($linkRapido) ? route('admin.links-rapidos.update', $linkRapido->id) : route('admin.links-rapidos.store') }}"
            method="POST" class="space-y-6">
        @csrf
        @if(isset($linkRapido))
            @method('PUT')
        @endif

        <div>
            <label class="block text-sm font-semibold text-gray-700">Título *</label>
            <input type="text" name="titulo" value="{{ old('titulo', $linkRapido->titulo ?? '') }}" class="w-full mt-1 border border-gray-300 rounded-lg p-3" required>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700">Descrição Curta *</label>
            <input type="text" name="descricao_curta" value="{{ old('descricao_curta', $linkRapido->descricao_curta ?? '') }}" class="w-full mt-1 border border-gray-300 rounded-lg p-3" required>
        </div>
        
        <div>
            <label class="block text-sm font-semibold text-gray-700">URL (Link de destino) *</label>
            <input type="url" name="url" value="{{ old('url', $linkRapido->url ?? '') }}" class="w-full mt-1 border border-gray-300 rounded-lg p-3" required>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700">Ícone (Classe do Font Awesome) *</label>
            <input type="text" name="icone" value="{{ old('icone', $linkRapido->icone ?? 'fas fa-link') }}" class="w-full mt-1 border border-gray-300 rounded-lg p-3" required>
            <small class="text-gray-500">Ex: fas fa-file-alt. Veja os ícones em <a href="https://fontawesome.com/search?o=r&m=free" target="_blank" class="text-blue-600">fontawesome.com</a></small>
        </div>

        <div class="flex justify-end pt-4 border-t">
            <a href="{{ route('admin.links-rapidos.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold px-6 py-3 rounded-lg mr-4">Cancelar</a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg shadow-md flex items-center gap-2"><i class="fas fa-save"></i> Salvar</button>
        </div>
    </form>
</div>
@endsection