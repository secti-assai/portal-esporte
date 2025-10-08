@extends('layouts.admin')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">📍 Locais de Atendimento</h1>
        <a href="{{ route('admin.locais.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded-lg shadow-md transition-colors">
            <i class="fas fa-plus mr-2"></i> Novo Local
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-md p-4 sm:p-6">
        @if($locais->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-600">
                     <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                        <tr>
                            <th class="px-6 py-3">Nome</th>
                            <th class="px-6 py-3">Endereço</th>
                            <th class="px-6 py-3">Telefone</th>
                            <th class="px-6 py-3 text-right">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($locais as $local)
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="px-6 py-4 font-medium text-gray-900">{{ $local->nome }}</td>
                                <td class="px-6 py-4">{{ Str::limit($local->endereco, 40) }}</td>
                                <td class="px-6 py-4">{{ $local->telefone ?? '—' }}</td>
                                <td class="px-6 py-4 text-right whitespace-nowrap">
                                    <a href="{{ route('admin.locais.edit', $local->id) }}" class="font-medium text-blue-600 hover:underline mr-4"><i class="fas fa-edit mr-1"></i> Editar</a>
                                    <form action="{{ route('admin.locais.destroy', $local->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="font-medium text-red-600 hover:underline" onclick="return confirm('Tem certeza?')"><i class="fas fa-trash-alt mr-1"></i> Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-center text-gray-500 py-10">Nenhum local cadastrado.</p>
        @endif
    </div>
@endsection