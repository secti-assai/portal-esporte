@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-md p-8">
    <div class="flex justify-between items-center mb-8 border-b pb-4">
        <h1 class="text-2xl font-bold text-gray-800 flex items-center gap-3">
            <i class="fas fa-user-tie text-blue-500"></i>
            <span>{{ isset($membro) ? 'Editar Membro' : 'Novo Membro da Equipe' }}</span>
        </h1>
        <a href="{{ route('admin.equipe.index') }}" class="text-sm text-gray-600 hover:text-gray-900">
             <i class="fas fa-arrow-left mr-2"></i> Voltar
        </a>
    </div>

    <form action="{{ isset($membro) ? route('admin.equipe.update', $membro->id) : route('admin.equipe.store') }}"
            method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @if(isset($membro))
            @method('PUT')
        @endif

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-700">Nome Completo *</label>
                <input type="text" name="nome" value="{{ old('nome', $membro->nome ?? '') }}" class="w-full mt-1 border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700">Ordem *</label>
                <input type="number" name="ordem" value="{{ old('ordem', $membro->ordem ?? 99) }}" class="w-full mt-1 border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500" required>
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700">Cargo *</label>
            @php
                $cargos = [
                    // Nível 1
                    'Secretário(a) Municipal',
                    'Secretário(a) Adjunto(a)',
                    // Nível 2
                    'Diretor(a) de Departamento',
                    'Coordenador(a)',
                    'Chefe de Divisão',
                    'Assessor(a)',
                    // Nível 3
                    'Assistente Social',
                    'Psicólogo(a)',
                    'Técnico(a) Administrativo',
                    'Agente Social',
                    'Recepcionista',
                ];
                // Garante que o cargo atual (se existir e não estiver na lista) apareça como uma opção
                if (isset($membro) && !in_array($membro->cargo, $cargos)) {
                    $cargos[] = $membro->cargo;
                }
            @endphp
            <select name="cargo" class="w-full mt-1 border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500" required>
                <option value="">Selecione um cargo...</option>
                @foreach ($cargos as $cargo)
                    <option value="{{ $cargo }}" {{ (old('cargo', $membro->cargo ?? '') == $cargo) ? 'selected' : '' }}>
                        {{ $cargo }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700">E-mail</label>
                <input type="email" name="email" value="{{ old('email', $membro->email ?? '') }}" class="w-full mt-1 border border-gray-300 rounded-lg p-3">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700">Telefone</label>
                <input type="text" name="telefone" value="{{ old('telefone', $membro->telefone ?? '') }}" class="w-full mt-1 border border-gray-300 rounded-lg p-3">
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700">Foto</label>
            <input type="file" name="foto" class="w-full mt-1 border border-gray-300 rounded-lg p-2 file:rounded-md file:border-0 file:bg-gray-100 file:px-4 file:py-2">
            @if(isset($membro) && $membro->foto)
                <img src="{{ asset('storage/' . $membro->foto) }}" alt="Foto atual" class="mt-4 w-32 h-32 object-cover rounded-full shadow">
            @endif
        </div>

        <div class="flex justify-end pt-4 border-t">
            <a href="{{ route('admin.equipe.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold px-6 py-3 rounded-lg mr-4">Cancelar</a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg shadow-md flex items-center gap-2"><i class="fas fa-save"></i> Salvar</button>
        </div>
    </form>
</div>
@endsection