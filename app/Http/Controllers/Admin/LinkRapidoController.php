<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LinkRapido;
use Illuminate\Http\Request;

class LinkRapidoController extends Controller
{
    public function index()
    {
        $links = LinkRapido::get();
        return view('admin.links-rapidos.index', compact('links'));
    }

    public function create()
    {
        return view('admin.links-rapidos.form');
    }

    public function store(Request $request)
    {
        // (método store continua igual)
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao_curta' => 'required|string|max:255',
            'url' => 'required|url',
            'icone' => 'required|string',
        ]);
    $data = $request->all();
    LinkRapido::create($data);
        return redirect()->route('admin.links-rapidos.index')->with('ok', 'Link rápido criado!');
    }

    // CORRIGIDO AQUI: $linkRapido foi renomeado para $links_rapido
    public function edit(LinkRapido $links_rapido)
    {
        return view('admin.links-rapidos.form', ['linkRapido' => $links_rapido]);
    }

    // CORRIGIDO AQUI: $linkRapido foi renomeado para $links_rapido
    public function update(Request $request, LinkRapido $links_rapido)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao_curta' => 'required|string|max:255',
            'url' => 'required|url',
            'icone' => 'required|string',
        ]);
    $data = $request->all();
    $links_rapido->update($data);
        return redirect()->route('admin.links-rapidos.index')->with('ok', 'Link rápido atualizado!');
    }

    // CORRIGIDO AQUI: $linkRapido foi renomeado para $links_rapido
    public function destroy(LinkRapido $links_rapido)
    {
        $links_rapido->delete();
        return redirect()->route('admin.links-rapidos.index')->with('ok', 'Link rápido removido!');
    }
}
