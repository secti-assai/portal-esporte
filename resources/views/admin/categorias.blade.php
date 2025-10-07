@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto bg-white rounded-2xl shadow p-6">
    <div class="flex justify-between items-center mb-6 border-b pb-3">
        <h1 class="text-2xl font-bold text-gray-800 flex items-center gap-2">
            <i class="fa-solid fa-tags text-blue-600"></i> Gerenciar Categorias
        </h1>
        <a href="{{ route('admin.dashboard') }}"
           class="text-sm bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium px-4 py-2 rounded-lg transition">
           <i class="fa-solid fa-arrow-left"></i> Voltar
        </a>
    </div>

    @if(session('ok'))
      <div class="mb-4 bg-green-100 text-green-800 px-4 py-2 rounded">{{ session('ok') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.categorias.store') }}" class="flex gap-3 mb-6">
        @csrf
        <input type="text" name="nome" placeholder="Nova categoria..."
               class="flex-grow border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500"
               required>
        <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-3 rounded-lg shadow transition">
            <i class="fa-solid fa-plus"></i> Adicionar
        </button>
    </form>

    @if($categorias->count())
      <table class="w-full text-left text-sm text-gray-700">
        <thead class="bg-gray-100 uppercase text-xs font-semibold">
          <tr>
            <th class="px-4 py-3">Nome</th>
            <th class="px-4 py-3 text-right">Ações</th>
          </tr>
        </thead>
        <tbody>
          @foreach($categorias as $cat)
            <tr class="border-b hover:bg-gray-50">
              <td class="px-4 py-3">{{ $cat->nome }}</td>
              <td class="px-4 py-3 text-right">
                <form action="{{ route('admin.categorias.destroy', $cat->id) }}" method="POST" class="inline">
                  @csrf
                  @method('DELETE')
                  <button onclick="return confirm('Excluir categoria {{ $cat->nome }}?')"
                          class="text-red-600 hover:text-red-800 font-medium">
                    <i class="fa-solid fa-trash"></i> Excluir
                  </button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <p class="text-center text-gray-500 py-6">Nenhuma categoria criada ainda.</p>
    @endif
</div>
@endsection
