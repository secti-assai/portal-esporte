@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-md p-8">
    <div class="flex justify-between items-center mb-8 border-b pb-4">
        <h1 class="text-2xl font-bold text-gray-800 flex items-center gap-3">
            <i class="fas fa-gavel text-blue-500"></i>
            <span>{{ isset($legislacao) ? 'Editar Documento' : 'Novo Documento' }}</span>
        </h1>
        <a href="{{ route('admin.legislacoes.index') }}" class="text-sm text-gray-600 hover:text-gray-900">
             <i class="fas fa-arrow-left mr-2"></i> Voltar
        </a>
    </div>

    <form action="{{ isset($legislacao) ? route('admin.legislacoes.update', $legislacao->id) : route('admin.legislacoes.store') }}"
            method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @if(isset($legislacao))
            @method('PUT')
        @endif

        <div>
            <label class="block text-sm font-semibold text-gray-700">Título do Documento *</label>
            <input type="text" name="titulo" value="{{ old('titulo', $legislacao->titulo ?? '') }}" class="w-full mt-1 border border-gray-300 rounded-lg p-3" required>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700">Descrição</label>
            <textarea name="descricao" rows="3" class="w-full mt-1 border border-gray-300 rounded-lg p-3">{{ old('descricao', $legislacao->descricao ?? '') }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700">Data de Publicação</label>
            <input type="date" name="data_publicacao" value="{{ old('data_publicacao', isset($legislacao) ? $legislacao->data_publicacao->format('Y-m-d') : '') }}" class="w-full mt-1 border border-gray-300 rounded-lg p-3">
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700">Arquivo (PDF, DOC, DOCX) *</label>
            <input type="file" name="arquivo" class="w-full mt-1 border border-gray-300 rounded-lg p-2" {{ isset($legislacao) ? '' : 'required' }}>
            @if(isset($legislacao) && $legislacao->arquivo)
                <p class="text-xs text-gray-500 mt-2">Arquivo atual: <a href="{{ asset('storage/' . $legislacao->arquivo) }}" target="_blank" class="text-blue-600">Visualizar</a>.</p>
            @endif
        </div>

        <div class="flex justify-end pt-4 border-t">
            <a href="{{ route('admin.legislacoes.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold px-6 py-3 rounded-lg mr-4">Cancelar</a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg shadow-md flex items-center gap-2"><i class="fas fa-save"></i> Salvar</button>
        </div>
    </form>
</div>
@endsection