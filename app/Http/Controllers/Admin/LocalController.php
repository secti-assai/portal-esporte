<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Local;
use Illuminate\Http\Request;

class LocalController extends Controller
{
    public function index()
    {
        $locais = Local::orderBy('nome')->get();
        return view('admin.locais.index', compact('locais'));
    }

    public function create()
    {
        return view('admin.locais.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'endereco' => 'required|string|max:1000',
        ]);
    $data = $request->all();
    Local::create($data);
        return redirect()->route('admin.locais.index')->with('ok', 'Local adicionado!');
    }

    public function edit(Local $local)
    {
        return view('admin.locais.form', compact('local'));
    }

    public function update(Request $request, Local $local)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'endereco' => 'required|string|max:1000',
        ]);
    $data = $request->all();
    $local->update($data);
        return redirect()->route('admin.locais.index')->with('ok', 'Local atualizado!');
    }

    public function destroy(Local $local)
    {
        $local->delete();
        return redirect()->route('admin.locais.index')->with('ok', 'Local removido!');
    }

    /**
     * Retorna locais para uso em selects via AJAX
     */
    public function getLocais()
    {
    $locais = Local::where('portal', config('portal.key'))
              ->select('id', 'nome', 'endereco')
              ->orderBy('nome')
              ->get()
                      ->map(function($local) {
                          return [
                              'id' => $local->id,
                              'text' => $local->nome . ' - ' . $local->endereco,
                              'nome' => $local->nome,
                              'endereco' => $local->endereco
                          ];
                      });

        return response()->json($locais);
    }
}
