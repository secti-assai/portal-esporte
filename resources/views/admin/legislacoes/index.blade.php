@extends('layouts.admin')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">⚖️ Legislação</h1>
        <a href="{{ route('admin.legislacoes.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded-lg shadow-md transition-colors">
            <i class="fas fa-plus mr-2"></i> Novo Documento
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-md p-4 sm:p-6">
        @if($legislacoes->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-600">
                     <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                        <tr>
                            <th class="px-6 py-3">Título</th>
                            <th class="px-6 py-3">Data de Publicação</th>
                            <th class="px-6 py-3">Arquivo</th>
                            <th class="px-6 py-3 text-right">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($legislacoes as $legislacao)
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="px-6 py-4 font-medium text-gray-900">{{ $legislacao->titulo }}</td>
                                <td class="px-6 py-4">{{ $legislacao->data_publicacao ? $legislacao->data_publicacao->format('d/m/Y') : '—' }}</td>
                                <td class="px-6 py-4"><a href="{{ asset('storage/' . $legislacao->arquivo) }}" target="_blank" class="text-blue-600 hover:underline"><i class="fas fa-download mr-2"></i>Baixar</a></td>
                                <td class="px-6 py-4 text-right whitespace-nowrap">
                                    <a href="{{ route('admin.legislacoes.edit', $legislacao->id) }}" class="font-medium text-blue-600 hover:underline mr-4"><i class="fas fa-edit mr-1"></i> Editar</a>
                                    <form action="{{ route('admin.legislacoes.destroy', $legislacao->id) }}" method="POST" class="inline-block">
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
            <p class="text-center text-gray-500 py-10">Nenhum documento cadastrado.</p>
        @endif
    </div>
@endsection