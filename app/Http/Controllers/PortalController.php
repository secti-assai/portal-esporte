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
            $links_rapidos = LinkRapido::take(4)->get();
        } catch (\Exception $e) {
            // Se a tabela não existe, usar dados estáticos
            $links_rapidos = collect([
                (object)[
                    'titulo' => 'Agendamentos',
                    'descricao_curta' => 'Marque consultas, matrículas ou atendimentos.',
                    'url' => route('agendamentos.index'),
                    'icone' => 'fas fa-file-alt'
                ],
                (object)[
                    'titulo' => 'Calendário Oficial',
                    'descricao_curta' => 'Confira as datas e eventos importantes.',
                    'url' => route('calendario.index'),
                    'icone' => 'fas fa-calendar-check'
                ],
                (object)[
                    'titulo' => 'Editais e Licitações',
                    'descricao_curta' => 'Acompanhe os processos de seleção e contratação.',
                    'url' => route('editais.index'),
                    'icone' => 'fas fa-bullhorn'
                ],
                (object)[
                    'titulo' => 'Perguntas Frequentes',
                    'descricao_curta' => 'Tire suas dúvidas de forma rápida e fácil.',
                    'url' => route('faq.index'),
                    'icone' => 'fas fa-info-circle'
                ]
            ]);
        }
        
        try {
            $equipe = MembroEquipe::orderBy('id', 'asc')->get();
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
            $faqs = Faq::orderBy('id', 'asc')->get();
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