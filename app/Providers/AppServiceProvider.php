<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Portal;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Define o portal fixo como Assistência Social
        View::composer('*', function ($view) {
            $currentPortalKey = config('portal.key', 'assistencia_social');
            $view->with('currentPortalKey', $currentPortalKey);
        });
    }
}
