<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Noticia;
use Illuminate\Support\Facades\Storage;

class NoticiaController extends Controller
{
    /**
     * Lista todas as notícias no painel admin.
     */
    public function index()
    {
        $noticias = Noticia::orderBy('created_at', 'desc')->get();
        return view('admin.dashboard', compact('noticias'));
    }

    /**
     * Mostra o formulário de criação de notícia.
     */
    public function create()
    {
        return view('admin.form-noticia');
    }

    /**
     * Armazena uma nova notícia.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'categoria' => 'nullable|string|max:255',
            'resumo' => 'required|string|max:500',
            'conteudo' => 'required',
            'imagem' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'status' => 'required|in:rascunho,publicada',
        ]);

        $noticia = new Noticia();
        $noticia->categoria = $request->categoria;
        $noticia->titulo = $request->titulo;
        $noticia->resumo = $request->resumo;
        $noticia->conteudo = $request->conteudo;
        $noticia->status = $request->status;
        $noticia->data_publicacao = now();
        $noticia->autor = auth()->user()->name ?? 'Admin';

        // Upload de imagem principal
        if ($request->hasFile('imagem')) {
            $path = $request->file('imagem')->store('noticias', 'public');
            $noticia->imagem = $path;
        }

        $noticia->save();

        return redirect()->route('admin.dashboard')->with('ok', '📰 Notícia publicada com sucesso!');
    }

    /**
     * Editar uma notícia existente.
     */
    public function edit($id)
    {
        $noticia = Noticia::findOrFail($id);
        return view('admin.form-noticia', compact('noticia'));
    }

    /**
     * Atualizar uma notícia existente.
     */
    public function update(Request $request, $id)
    {
        $noticia = Noticia::findOrFail($id);

        $request->validate([
            'titulo' => 'required|string|max:255',
            'resumo' => 'required|string|max:500',
            'conteudo' => 'required',
            'imagem' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'status' => 'required|in:rascunho,publicada',
        ]);

        $noticia->titulo = $request->titulo;
        $noticia->resumo = $request->resumo;
        $noticia->conteudo = $request->conteudo;
        $noticia->status = $request->status;

        // Atualiza imagem se necessário
        if ($request->hasFile('imagem')) {
            if ($noticia->imagem && Storage::disk('public')->exists($noticia->imagem)) {
                Storage::disk('public')->delete($noticia->imagem);
            }
            $path = $request->file('imagem')->store('noticias', 'public');
            $noticia->imagem = $path;
        }

        $noticia->save();

        return redirect()->route('admin.dashboard')->with('ok', '✏️ Notícia atualizada com sucesso!');
    }

    /**
     * Exclui uma notícia e sua imagem.
     */
    public function destroy($id)
    {
        $noticia = Noticia::findOrFail($id);

        if ($noticia->imagem && Storage::disk('public')->exists($noticia->imagem)) {
            Storage::disk('public')->delete($noticia->imagem);
        }

        $noticia->delete();

        return redirect()->route('admin.dashboard')->with('ok', '🗑️ Notícia excluída com sucesso!');
    }

    /**
     * Endpoint do TinyMCE para upload de imagens embutidas.
     */
    public function uploadTinyMCE(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');

            if ($file->isValid()) {
                $path = $file->store('noticias', 'public');
                $url = asset('storage/' . $path);

                return response()->json(['location' => $url]);
            }
        }

        return response()->json(['error' => 'Falha no upload'], 422);
    }
}
