<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::orderBy('nome')->get();
        return view('admin.categorias', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate(['nome' => 'required|string|max:255|unique:categorias,nome']);
        Categoria::create(['nome' => $request->nome]);
        return back()->with('ok', '✅ Categoria criada com sucesso!');
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return back()->with('ok', '🗑️ Categoria removida!');
    }
}
