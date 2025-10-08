<?php

namespace App\Models\Concerns;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Config;

trait HasPortal
{
    protected static function bootHasPortal()
    {
        static::addGlobalScope('portal', function (Builder $builder) {
            $key = session('portal_key') ?: Config::get('portal.key');
            if ($key) {
                $builder->where(function ($q) use ($key) {
                    $q->whereNull('portal')->orWhere('portal', $key);
                });
            }
        });

        static::creating(function ($model) {
            $key = Config::get('portal.key');
            if ($key && empty($model->portal)) {
                $model->portal = $key;
            }
        });
    }
}
