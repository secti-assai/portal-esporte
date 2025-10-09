<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use App\Models\Evento;
use App\Models\MembroEquipe;
use App\Models\Local;
use App\Models\LinkRapido;
use App\Models\Legislacao;
use App\Models\Faq;

class PortalController extends Controller
{
    public function index()
    {
        // --- DADOS JÁ EXISTENTES ---
        $noticias = Noticia::where('status', 'publicada')
            ->latest('data_publicacao')
            ->take(6)->get();

        $eventos = Evento::where('data_evento', '>=', now())
            ->orderBy('data_evento', 'asc')
            ->take(5)->get();

        // --- NOVOS DADOS DINÂMICOS ---
        // Temporariamente usando dados estáticos até executar migrations
        try {
            $links_rapidos = LinkRapido::take(8)->get();
        } catch (\Exception $e) {
            $links_rapidos = collect();
        }
        
        try {
            $equipe = MembroEquipe::orderBy('ordem', 'asc')->get();
        } catch (\Exception $e) {
            $equipe = collect();
        }
        
        try {
            $locais = Local::orderBy('nome', 'asc')->get();
        } catch (\Exception $e) {
            $locais = collect();
        }
        
        try {
            $legislacoes = Legislacao::orderBy('id', 'desc')->get();
        } catch (\Exception $e) {
            $legislacoes = collect();
        }
        
        try {
            $faqs = Faq::orderBy('ordem', 'asc')->get();
        } catch (\Exception $e) {
            $faqs = collect();
        }

        return view('index', compact(
            'noticias',
            'eventos',
            'links_rapidos',
            'equipe',
            'locais',
            'legislacoes',
            'faqs'
        ));
    }
}