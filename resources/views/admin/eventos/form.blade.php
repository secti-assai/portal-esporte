@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-md p-6 sm:p-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-2xl sm:text-3xl font-bold text-gray-800 flex items-center gap-3">
            <i class="fas fa-calendar-plus text-blue-500"></i>
            <span>{{ isset($evento) ? 'Editar Evento' : 'Criar Novo Evento' }}</span>
        </h1>
    </div>

    <form action="{{ isset($evento) ? route('admin.eventos.update', $evento->id) : route('admin.eventos.store') }}"
            method="POST" class="space-y-6">
        @csrf
        @if(isset($evento))
            @method('PUT')
        @endif

        {{-- Título do Evento (Sem ícone) --}}
        <div>
            <label for="titulo" class="block text-sm font-semibold mb-2 text-gray-700">Título do Evento</label>
            <input type="text" id="titulo" name="titulo" value="{{ old('titulo', $evento->titulo ?? '') }}" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 transition" placeholder="Ex: Feirão da Cidadania" required>
        </div>

        {{-- Grid para Local e Data/Hora --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="local" class="block text-sm font-semibold mb-2 text-gray-700">Local</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-map-marker-alt text-gray-400"></i>
                    </div>
                    <input type="text" id="local" name="local" value="{{ old('local', $evento->local ?? '') }}" class="w-full border border-gray-300 rounded-lg p-3 pl-10 focus:outline-none focus:ring-2 focus:ring-blue-500 transition" placeholder="Ex: Ginásio de Esportes" required>
                </div>
            </div>
            <div>
                <label for="data_evento" class="block text-sm font-semibold mb-2 text-gray-700">Data e Hora</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-calendar-alt text-gray-400"></i>
                    </div>
                    <input type="datetime-local" id="data_evento" name="data_evento" value="{{ old('data_evento', isset($evento) ? $evento->data_evento->format('Y-m-d\TH:i') : '') }}" class="w-full border border-gray-300 rounded-lg p-3 pl-10 focus:outline-none focus:ring-2 focus:ring-blue-500 transition" required>
                </div>
            </div>
        </div>

        {{-- Descrição --}}
        <div>
            <label for="descricao" class="block text-sm font-semibold mb-2 text-gray-700">Descrição (Opcional)</label>
            <textarea id="descricao" name="descricao" rows="5" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 transition" placeholder="Forneça mais detalhes sobre o evento...">{{ old('descricao', $evento->descricao ?? '') }}</textarea>
        </div>

        {{-- Botões de Ação --}}
        <div class="flex justify-end items-center pt-4">
            <a href="{{ route('admin.eventos.index') }}"
                class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold px-6 py-3 rounded-lg transition mr-4">
                Cancelar
            </a>
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg shadow-md transition flex items-center">
                <i class="fas fa-save mr-2"></i> Salvar
            </button>
        </div>
    </form>
</div>
@endsection