<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index()
    {
        $eventos = Evento::where('portal', config('portal.key'))->orderBy('data_evento', 'desc')->get();
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
            'descricao' => 'nullable|string|max:500',
        ]);

    $data = $request->all();
    $data['portal'] = config('portal.key');
    Evento::create($data);
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
            'descricao' => 'nullable|string|max:500',
        ]);

    $data = $request->all();
    $data['portal'] = $evento->portal ?? config('portal.key');
    $evento->update($data);
        return redirect()->route('admin.eventos.index')->with('ok', 'Evento atualizado com sucesso!');
    }

    public function destroy(Evento $evento)
    {
        $evento->delete();
        return redirect()->route('admin.eventos.index')->with('ok', 'Evento excluído com sucesso!');
    }
}
