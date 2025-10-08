@extends('layouts.admin')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-map-marker-alt text-blue-600 text-xl"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">
                            {{ isset($local) ? 'Editar Local' : 'Novo Local' }}
                        </h1>
                        <p class="text-gray-600 text-sm">
                            {{ isset($local) ? 'Atualize as informações do local' : 'Adicione um novo local ao sistema' }}
                        </p>
                    </div>
                </div>
                <a href="{{ route('admin.locais.index') }}" 
                   class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg transition-colors">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Voltar
                </a>
            </div>
        </div>

        <!-- Form -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8">
            <form action="{{ isset($local) ? route('admin.locais.update', $local->id) : route('admin.locais.store') }}"
                  method="POST" class="space-y-8">
                @csrf
                @if(isset($local))
                    @method('PUT')
                @endif

                <!-- Informações Básicas -->
                <div class="space-y-6">
                    <div class="border-b border-gray-200 pb-4">
                        <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                            <i class="fas fa-info-circle text-blue-600 mr-2"></i>
                            Informações Básicas
                        </h3>
                        <p class="text-gray-600 text-sm mt-1">Dados principais do local</p>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <div class="lg:col-span-2">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-building text-gray-400 mr-1"></i>
                                Nome do Local *
                            </label>
                            <input type="text" 
                                   name="nome" 
                                   value="{{ old('nome', $local->nome ?? '') }}" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('nome') border-red-500 ring-2 ring-red-200 @enderror" 
                                   placeholder="Ex: Prefeitura Municipal"
                                   required>
                            @error('nome')
                                <p class="text-red-600 text-sm mt-1 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="lg:col-span-2">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-map-marker-alt text-gray-400 mr-1"></i>
                                Endereço Completo *
                            </label>
                            <input type="text" 
                                   name="endereco" 
                                   value="{{ old('endereco', $local->endereco ?? '') }}" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('endereco') border-red-500 ring-2 ring-red-200 @enderror" 
                                   placeholder="Ex: Rua Principal, 123 - Centro"
                                   required>
                            @error('endereco')
                                <p class="text-red-600 text-sm mt-1 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Contato e Funcionamento -->
                <div class="space-y-6">
                    <div class="border-b border-gray-200 pb-4">
                        <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                            <i class="fas fa-phone text-green-600 mr-2"></i>
                            Contato e Funcionamento
                        </h3>
                        <p class="text-gray-600 text-sm mt-1">Informações de contato e horários</p>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-phone text-gray-400 mr-1"></i>
                                Telefone
                            </label>
                            <input type="text" 
                                   name="telefone" 
                                   value="{{ old('telefone', $local->telefone ?? '') }}" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('telefone') border-red-500 ring-2 ring-red-200 @enderror" 
                                   placeholder="(43) 3262-1234">
                            @error('telefone')
                                <p class="text-red-600 text-sm mt-1 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-clock text-gray-400 mr-1"></i>
                                Horário de Funcionamento
                            </label>
                            <input type="text" 
                                   name="horario_funcionamento" 
                                   value="{{ old('horario_funcionamento', $local->horario_funcionamento ?? '') }}" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('horario_funcionamento') border-red-500 ring-2 ring-red-200 @enderror" 
                                   placeholder="Segunda a Sexta, das 8h às 17h">
                            @error('horario_funcionamento')
                                <p class="text-red-600 text-sm mt-1 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-map text-gray-400 mr-1"></i>
                            Link do Google Maps
                        </label>
                        <div class="relative">
                            <input type="url" 
                                   name="mapa_url" 
                                   value="{{ old('mapa_url', $local->mapa_url ?? '') }}" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('mapa_url') border-red-500 ring-2 ring-red-200 @enderror" 
                                   placeholder="https://maps.google.com/...">
                            @if(isset($local) && $local->mapa_url)
                                <a href="{{ $local->mapa_url }}" target="_blank" 
                                   class="absolute right-3 top-1/2 transform -translate-y-1/2 text-blue-600 hover:text-blue-800">
                                    <i class="fas fa-external-link-alt"></i>
                                </a>
                            @endif
                        </div>
                        @error('mapa_url')
                            <p class="text-red-600 text-sm mt-1 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
                        <p class="text-gray-500 text-xs mt-1">
                            <i class="fas fa-info-circle mr-1"></i>
                            Cole o link completo do Google Maps para facilitar a localização
                        </p>
                    </div>
                </div>

                <!-- Serviços -->
                <div class="space-y-6">
                    <div class="border-b border-gray-200 pb-4">
                        <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                            <i class="fas fa-cogs text-purple-600 mr-2"></i>
                            Serviços Oferecidos
                        </h3>
                        <p class="text-gray-600 text-sm mt-1">Descreva os serviços disponíveis neste local</p>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-list text-gray-400 mr-1"></i>
                            Descrição dos Serviços
                        </label>
                        <textarea name="servicos_oferecidos" 
                                  rows="5" 
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('servicos_oferecidos') border-red-500 ring-2 ring-red-200 @enderror" 
                                  placeholder="Ex: Atendimento ao cidadão, emissão de certidões, protocolo de documentos, etc.">{{ old('servicos_oferecidos', $local->servicos_oferecidos ?? '') }}</textarea>
                        @error('servicos_oferecidos')
                            <p class="text-red-600 text-sm mt-1 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
                        <p class="text-gray-500 text-xs mt-1">
                            <i class="fas fa-info-circle mr-1"></i>
                            Liste os principais serviços disponíveis, separados por vírgula ou em linhas
                        </p>
                    </div>
                </div>

                <!-- Botões -->
                <div class="flex items-center justify-between pt-8 border-t border-gray-200">
                    <div class="text-sm text-gray-500">
                        <i class="fas fa-info-circle mr-1"></i>
                        Campos marcados com * são obrigatórios
                    </div>
                    
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('admin.locais.index') }}" 
                           class="inline-flex items-center px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg transition-colors border border-gray-300">
                            <i class="fas fa-times mr-2"></i>
                            Cancelar
                        </a>
                        
                        <button type="submit" 
                                class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold rounded-lg shadow-md hover:shadow-lg transition-all transform hover:-translate-y-0.5">
                            <i class="fas fa-save mr-2"></i>
                            {{ isset($local) ? 'Atualizar Local' : 'Salvar Local' }}
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Dicas -->
        <div class="mt-6 bg-blue-50 border border-blue-200 rounded-xl p-6">
            <h4 class="text-blue-900 font-semibold mb-3 flex items-center">
                <i class="fas fa-lightbulb mr-2"></i>
                Dicas para preenchimento
            </h4>
            <ul class="text-blue-800 text-sm space-y-2">
                <li class="flex items-start">
                    <i class="fas fa-check-circle text-blue-600 mr-2 mt-0.5"></i>
                    <span><strong>Nome:</strong> Use o nome oficial do local (ex: "Secretaria de Saúde")</span>
                </li>
                <li class="flex items-start">
                    <i class="fas fa-check-circle text-blue-600 mr-2 mt-0.5"></i>
                    <span><strong>Endereço:</strong> Inclua rua, número, bairro e pontos de referência</span>
                </li>
                <li class="flex items-start">
                    <i class="fas fa-check-circle text-blue-600 mr-2 mt-0.5"></i>
                    <span><strong>Google Maps:</strong> Facilita para os cidadãos encontrarem o local</span>
                </li>
                <li class="flex items-start">
                    <i class="fas fa-check-circle text-blue-600 mr-2 mt-0.5"></i>
                    <span><strong>Serviços:</strong> Seja específico sobre o que é oferecido no local</span>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection