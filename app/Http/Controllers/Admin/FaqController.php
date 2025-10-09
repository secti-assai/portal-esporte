<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::orderBy('ordem')->get();
        return view('admin.faqs.index', compact('faqs'));
    }

    public function create()
    {
        return view('admin.faqs.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'pergunta' => 'required|string',
            'resposta' => 'required|string',
            'ordem' => 'required|integer',
        ]);
    $data = $request->all();
    Faq::create($data);
        return redirect()->route('admin.faqs.index')->with('ok', 'Pergunta adicionada!');
    }

    public function edit(Faq $faq)
    {
        return view('admin.faqs.form', compact('faq'));
    }

    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'pergunta' => 'required|string',
            'resposta' => 'required|string',
            'ordem' => 'required|integer',
        ]);
    $data = $request->all();
    $faq->update($data);
        return redirect()->route('admin.faqs.index')->with('ok', 'Pergunta atualizada!');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('admin.faqs.index')->with('ok', 'Pergunta removida!');
    }
}
