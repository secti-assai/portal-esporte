<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index()
    {
        $eventos = Evento::orderBy('data_evento', 'desc')->get();
        return view('admin.eventos.index', compact('eventos'));
    }

    public function create()
    {
        return view('admin.eventos.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'local' => 'required|string|max:255',
            'data_evento' => 'required|date',
            'descricao' => 'nullable|string',
        ]);

        Evento::create($request->all());
        return redirect()->route('admin.eventos.index')->with('ok', 'Evento criado com sucesso!');
    }

    public function edit(Evento $evento)
    {
        return view('admin.eventos.form', compact('evento'));
    }

    public function update(Request $request, Evento $evento)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'local' => 'required|string|max:255',
            'data_evento' => 'required|date',
            'descricao' => 'nullable|string',
        ]);

        $evento->update($request->all());
        return redirect()->route('admin.eventos.index')->with('ok', 'Evento atualizado com sucesso!');
    }

    public function destroy(Evento $evento)
    {
        $evento->delete();
        return redirect()->route('admin.eventos.index')->with('ok', 'Evento excluído com sucesso!');
    }
}