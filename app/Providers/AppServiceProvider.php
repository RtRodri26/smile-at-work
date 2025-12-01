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

         // Si existe la variable con el JSON
        if (env('GOOGLE_SERVICE_ACCOUNT_JSON_BASE64')) {

            $path = storage_path('app/google');

            // Si no existe la carpeta "google", la crea
            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }

            $jsonDecoded = base64_decode(env('GOOGLE_SERVICE_ACCOUNT_JSON_BASE64'));

    file_put_contents($path . '/service_account.json', $jsonDecoded);
        }
    }
}
