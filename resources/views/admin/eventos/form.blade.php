@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-md p-6 sm:p-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-2xl sm:text-3xl font-bold text-gray-800 flex items-center gap-3">
            <i class="fas fa-calendar-plus text-blue-500"></i>
            <span>{{ isset($evento) ? 'Editar Evento' : 'Criar Novo Evento' }}</span>
        </h1>
        <a href="{{ route('admin.eventos.index') }}" class="text-sm text-gray-600 hover:text-gray-900">
             <i class="fas fa-arrow-left mr-2"></i> Voltar
        </a>
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
                    <select id="local-select" name="local" class="w-full border border-gray-300 rounded-lg p-3 pl-10 focus:outline-none focus:ring-2 focus:ring-blue-500 transition" required>
                        <option value="">Selecione um local...</option>
                        <option value="custom">✏️ Digitar local personalizado</option>
                    </select>
                    <input type="text" 
                           id="local-custom" 
                           name="local_custom" 
                           value="{{ old('local', $evento->local ?? '') }}" 
                           class="w-full border border-gray-300 rounded-lg p-3 pl-10 focus:outline-none focus:ring-2 focus:ring-blue-500 transition mt-2 hidden" 
                           placeholder="Digite o local do evento">
                </div>
                <p class="text-xs text-gray-500 mt-1">
                    <i class="fas fa-info-circle mr-1"></i>
                    Escolha da lista ou digite um local personalizado
                </p>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    const localSelect = document.getElementById('local-select');
    const localCustomInput = document.getElementById('local-custom');
    const currentLocal = '{{ old("local", $evento->local ?? "") }}';
    
    // Carrega os locais do servidor
    fetch('{{ route("admin.api.locais") }}')
        .then(response => response.json())
        .then(locais => {
            // Limpa opções exceto as padrão
            const defaultOptions = localSelect.querySelectorAll('option');
            
            // Adiciona os locais carregados
            locais.forEach(local => {
                const option = document.createElement('option');
                option.value = local.nome;
                option.textContent = local.text;
                option.dataset.endereco = local.endereco;
                localSelect.appendChild(option);
            });
            
            // Se há um local atual, tenta selecioná-lo
            if (currentLocal) {
                let found = false;
                for (let option of localSelect.options) {
                    if (option.value === currentLocal) {
                        option.selected = true;
                        found = true;
                        break;
                    }
                }
                
                // Se não encontrou nas opções, assume que é customizado
                if (!found) {
                    localSelect.value = 'custom';
                    localCustomInput.classList.remove('hidden');
                    localCustomInput.value = currentLocal;
                    localCustomInput.name = 'local'; // Muda o name para ser enviado
                    localSelect.name = 'local_select'; // Remove name do select
                }
            }
        })
        .catch(error => {
            console.error('Erro ao carregar locais:', error);
            // Em caso de erro, mostra input customizado
            localSelect.value = 'custom';
            localCustomInput.classList.remove('hidden');
            localCustomInput.value = currentLocal;
            localCustomInput.name = 'local';
            localSelect.name = 'local_select';
        });
    
    // Gerencia a alternância entre select e input customizado
    localSelect.addEventListener('change', function() {
        if (this.value === 'custom') {
            localCustomInput.classList.remove('hidden');
            localCustomInput.name = 'local';
            localSelect.name = 'local_select';
            localCustomInput.focus();
        } else {
            localCustomInput.classList.add('hidden');
            localCustomInput.name = 'local_custom';
            localSelect.name = 'local';
        }
    });
});
</script>
@endsection