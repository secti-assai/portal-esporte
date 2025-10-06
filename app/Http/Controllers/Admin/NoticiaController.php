<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Noticia;
use Illuminate\Support\Facades\Storage;

class NoticiaController extends Controller
{
    /**
     * Exibe todas as notícias (painel admin).
     */
    public function index()
    {
        $noticias = Noticia::orderBy('created_at', 'desc')->get();
        return view('admin.dashboard', compact('noticias'));
    }

    /**
     * Mostra o formulário de criação.
     */
    public function create()
    {
        return view('admin.form-noticia');
    }

    /**
     * Armazena uma nova notícia no banco.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'resumo' => 'required|string|max:500',
            'conteudo' => 'required|string',
            'imagem' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'status' => 'required|in:rascunho,publicada',
        ]);

        $noticia = new Noticia();
        $noticia->titulo = $request->titulo;
        $noticia->resumo = $request->resumo;
        $noticia->conteudo = $request->conteudo;
        $noticia->status = $request->status;
        $noticia->data_publicacao = now();

        // Upload da imagem (opcional)
        if ($request->hasFile('imagem')) {
            $path = $request->file('imagem')->store('noticias', 'public');
            $noticia->imagem = $path;
        }

        $noticia->save();

        return redirect()->route('admin.dashboard')->with('ok', 'Notícia criada com sucesso!');
    }

    /**
     * Mostra o formulário de edição.
     */
    public function edit($id)
    {
        $noticia = Noticia::findOrFail($id);
        return view('admin.form-noticia', compact('noticia'));
    }

    /**
     * Atualiza uma notícia existente.
     */
    public function update(Request $request, $id)
    {
        $noticia = Noticia::findOrFail($id);

        $request->validate([
            'titulo' => 'required|string|max:255',
            'resumo' => 'required|string|max:500',
            'conteudo' => 'required|string',
            'imagem' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'status' => 'required|in:rascunho,publicada',
        ]);

        $noticia->titulo = $request->titulo;
        $noticia->resumo = $request->resumo;
        $noticia->conteudo = $request->conteudo;
        $noticia->status = $request->status;

        // Atualiza imagem (se nova enviada)
        if ($request->hasFile('imagem')) {
            if ($noticia->imagem && Storage::disk('public')->exists($noticia->imagem)) {
                Storage::disk('public')->delete($noticia->imagem);
            }
            $path = $request->file('imagem')->store('noticias', 'public');
            $noticia->imagem = $path;
        }

        $noticia->save();

        return redirect()->route('admin.dashboard')->with('ok', 'Notícia atualizada com sucesso!');
    }

    /**
     * Remove uma notícia.
     */
    public function destroy($id)
    {
        $noticia = Noticia::findOrFail($id);

        // Apaga imagem associada, se existir
        if ($noticia->imagem && Storage::disk('public')->exists($noticia->imagem)) {
            Storage::disk('public')->delete($noticia->imagem);
        }

        $noticia->delete();

        return redirect()->route('admin.dashboard')->with('ok', 'Notícia excluída com sucesso!');
    }
}
