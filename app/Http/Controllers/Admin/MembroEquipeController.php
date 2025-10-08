<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MembroEquipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MembroEquipeController extends Controller
{
    public function index()
    {
        $membros = MembroEquipe::orderBy('ordem')->get();
        return view('admin.equipe.index', compact('membros'));
    }

    public function create()
    {
        return view('admin.equipe.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'cargo' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'ordem' => 'required|integer',
        ]);

        $dados = $request->all();

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('equipe', 'public');
            $dados['foto'] = $path;
        }

        MembroEquipe::create($dados);
        return redirect()->route('admin.equipe.index')->with('ok', 'Membro adicionado!');
    }

    // CORRIGIDO AQUI: $membro foi renomeado para $equipe
    public function edit(MembroEquipe $equipe)
    {
        return view('admin.equipe.form', ['membro' => $equipe]);
    }

    // CORRIGIDO AQUI: $membro foi renomeado para $equipe
    public function update(Request $request, MembroEquipe $equipe)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'cargo' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'ordem' => 'required|integer',
        ]);

        $dados = $request->all();

        if ($request->hasFile('foto')) {
            if ($equipe->foto && Storage::disk('public')->exists($equipe->foto)) {
                Storage::disk('public')->delete($equipe->foto);
            }
            $path = $request->file('foto')->store('equipe', 'public');
            $dados['foto'] = $path;
        }

        $equipe->update($dados);
        return redirect()->route('admin.equipe.index')->with('ok', 'Membro atualizado!');
    }

    // CORRIGIDO AQUI: $membro foi renomeado para $equipe
    public function destroy(MembroEquipe $equipe)
    {
        if ($equipe->foto && Storage::disk('public')->exists($equipe->foto)) {
            Storage::disk('public')->delete($equipe->foto);
        }
        $equipe->delete();
        return redirect()->route('admin.equipe.index')->with('ok', 'Membro removido!');
    }
}