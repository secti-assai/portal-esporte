<?php

namespace App\Models\Concerns;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Config; // Mantenha este import

trait HasPortal
{
    protected static function bootHasPortal()
    {
        // Esta parte já está correta, busca os dados usando a sessão
        static::addGlobalScope('portal', function (Builder $builder) {
            $key = session('portal_key') ?: Config::get('portal.key');
            if ($key) {
                // A lógica original tinha uma pequena brecha, esta é mais segura
                $builder->where($builder->getModel()->getTable() . '.portal', $key);
            }
        });

        // ✅ CORREÇÃO APLICADA AQUI
        // Esta parte agora salva os dados usando a sessão
        static::creating(function ($model) {
            // Prioriza a chave da sessão, se não existir, usa a do config como fallback.
            $key = session('portal_key') ?: Config::get('portal.key');
            if ($key && empty($model->portal)) {
                $model->portal = $key;
            }
        });
    }
}