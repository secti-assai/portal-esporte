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
        // Share portals with all views (view composer)
        View::composer('*', function ($view) {
            try {
                $portals = Portal::orderBy('name')->get();
            } catch (\Throwable $e) {
                // If the table doesn't exist yet (migrations not run), return empty to avoid breaking views
                $portals = collect();
            }

            $currentPortalKey = session('portal_key') ?: config('portal.key');

            $view->with('portals', $portals)->with('currentPortalKey', $currentPortalKey);
        });
    }
}
