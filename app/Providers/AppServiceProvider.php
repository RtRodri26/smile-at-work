<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Profile;
use Illuminate\Support\Facades\View;

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

    public function boot()
    {
        // Compartir el perfil del usuario autenticado en todas las vistas
        View::composer('*', function ($view) {
            if (auth()->check()) {
                $profile = Profile::where('user_id', auth()->id())->first();
                $view->with('profile', $profile);
            }
        });
    }
}
