@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-md p-8">
    <div class="flex justify-between items-center mb-8 border-b pb-4">
        <h1 class="text-2xl font-bold text-gray-800 flex items-center gap-3">
            <i class="fas fa-question-circle text-blue-500"></i>
            <span>{{ isset($faq) ? 'Editar Pergunta' : 'Nova Pergunta Frequente' }}</span>
        </h1>
        <a href="{{ route('admin.faqs.index') }}" class="text-sm text-gray-600 hover:text-gray-900">
             <i class="fas fa-arrow-left mr-2"></i> Voltar
        </a>
    </div>

    <form action="{{ isset($faq) ? route('admin.faqs.update', $faq->id) : route('admin.faqs.store') }}"
            method="POST" class="space-y-6">
        @csrf
        @if(isset($faq))
            @method('PUT')
        @endif
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="md:col-span-3">
                <label class="block text-sm font-semibold text-gray-700">Pergunta *</label>
                <input type="text" name="pergunta" value="{{ old('pergunta', $faq->pergunta ?? '') }}" class="w-full mt-1 border border-gray-300 rounded-lg p-3" required>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700">Ordem *</label>
                <input type="number" name="ordem" value="{{ old('ordem', $faq->ordem ?? 99) }}" class="w-full mt-1 border border-gray-300 rounded-lg p-3" required>
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700">Resposta *</label>
            <textarea name="resposta" rows="6" class="w-full mt-1 border border-gray-300 rounded-lg p-3" required>{{ old('resposta', $faq->resposta ?? '') }}</textarea>
        </div>

        <div class="flex justify-end pt-4 border-t">
            <a href="{{ route('admin.faqs.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold px-6 py-3 rounded-lg mr-4">Cancelar</a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg shadow-md flex items-center gap-2"><i class="fas fa-save"></i> Salvar</button>
        </div>
    </form>
</div>
@endsection