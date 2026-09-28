<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Vite;

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
        // Longueur par defaut des chaines pour les migrations (MySQL < 8 / utf8mb4)
        \Illuminate\Support\Facades\Schema::defaultStringLength(191);
    }
}
