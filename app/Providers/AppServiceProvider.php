<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Profile;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\URL;


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
        if (env('APP_ENV') === 'production') {
        URL::forceScheme('https');
    }

        // Compartir el perfil del usuario autenticado en todas las vistas
        View::composer('*', function ($view) {
            if (auth()->check()) {
                $profile = Profile::where('user_id', auth()->id())->first();
                $view->with('profile', $profile);
            }
        });

         // Si existe la variable con el JSON
        if (env('GOOGLE_SERVICE_ACCOUNT_JSON_BASE64')) {

            $path = storage_path('app/google/service_account.json');
            if (!file_exists($path)) {
                throw new \Exception('Google service account JSON no encontrado');
            }
            $config = json_decode(file_get_contents($path), true);

        }
    }
}
