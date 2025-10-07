@extends('layouts.admin')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">📅 Agenda de Eventos</h1>
        <a href="{{ route('admin.eventos.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded-lg shadow-md transition-colors">
            <i class="fas fa-plus mr-2"></i> Novo Evento
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-purple-500">
            <p class="text-gray-500 text-sm font-semibold uppercase">Total de Eventos</p>
            <h3 class="text-3xl font-bold text-gray-800 mt-2">{{ $eventos->count() }}</h3>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-blue-500">
            <p class="text-gray-500 text-sm font-semibold uppercase">Próximos Eventos</p>
            <h3 class="text-3xl font-bold text-gray-800 mt-2">{{ $eventos->where('data_evento', '>=', now())->count() }}</h3>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-gray-400">
            <p class="text-gray-500 text-sm font-semibold uppercase">Eventos Passados</p>
            <h3 class="text-3xl font-bold text-gray-800 mt-2">{{ $eventos->where('data_evento', '<', now())->count() }}</h3>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-md p-4 sm:p-6">
        @if($eventos->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-600">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                        <tr>
                            <th scope="col" class="px-6 py-3">Evento</th>
                            <th scope="col" class="px-6 py-3">Data e Hora</th>
                            <th scope="col" class="px-6 py-3">Local</th>
                            <th scope="col" class="px-6 py-3 text-right">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($eventos as $evento)
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $evento->titulo }}</td>
                                <td class="px-6 py-4">{{ $evento->data_evento->format('d/m/Y H:i') }}</td>
                                <td class="px-6 py-4">{{ $evento->local }}</td>
                                <td class="px-6 py-4 text-right whitespace-nowrap">
                                    <a href="{{ route('admin.eventos.edit', $evento->id) }}" class="font-medium text-blue-600 hover:underline mr-4"><i class="fas fa-edit mr-1"></i> Editar</a>
                                    <form action="{{ route('admin.eventos.destroy', $evento->id) }}" method="POST" class="inline-block">
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
            <p class="text-center text-gray-500 py-10">Nenhum evento cadastrado ainda.</p>
        @endif
    </div>
@endsection