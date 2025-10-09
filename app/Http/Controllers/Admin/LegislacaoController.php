<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Legislacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LegislacaoController extends Controller
{
    public function index()
    {
        $legislacoes = Legislacao::orderBy('data_publicacao', 'desc')->get();
        return view('admin.legislacoes.index', compact('legislacoes'));
    }

    public function create()
    {
        return view('admin.legislacoes.form');
    }

    public function store(Request $request)
    {
        // (método store continua igual)
        $request->validate([
            'titulo' => 'required|string|max:255',
            'arquivo' => 'required|file|mimes:pdf,doc,docx|max:10240',
            'data_publicacao' => 'nullable|date',
        ]);
    $path = $request->file('arquivo')->store('legislacoes', 'public');
    $data = $request->except('arquivo') + ['arquivo' => $path];
    Legislacao::create($data);
        return redirect()->route('admin.legislacoes.index')->with('ok', 'Documento adicionado!');
    }

    // CORRIGIDO AQUI: $legislacao foi renomeado para $legislaco
    public function edit(Legislacao $legislaco)
    {
        return view('admin.legislacoes.form', ['legislacao' => $legislaco]);
    }

    // CORRIGIDO AQUI: $legislacao foi renomeado para $legislaco
    public function update(Request $request, Legislacao $legislaco)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'arquivo' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            'data_publicacao' => 'nullable|date',
        ]);
        $dados = $request->except('arquivo');
        if ($request->hasFile('arquivo')) {
            if ($legislaco->arquivo && Storage::disk('public')->exists($legislaco->arquivo)) {
                Storage::disk('public')->delete($legislaco->arquivo);
            }
            $path = $request->file('arquivo')->store('legislacoes', 'public');
            $dados['arquivo'] = $path;
        }
    $legislaco->update($dados);
        return redirect()->route('admin.legislacoes.index')->with('ok', 'Documento atualizado!');
    }

    // CORRIGIDO AQUI: $legislacao foi renomeado para $legislaco
    public function destroy(Legislacao $legislaco)
    {
        if ($legislaco->arquivo && Storage::disk('public')->exists($legislaco->arquivo)) {
            Storage::disk('public')->delete($legislaco->arquivo);
        }
        $legislaco->delete();
        return redirect()->route('admin.legislacoes.index')->with('ok', 'Documento removido!');
    }
}
