<?php

namespace App\Providers;

use App\Services\SettingsService;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Une seule instance par requête : les paramètres ne sont lus qu'une fois.
        $this->app->singleton(SettingsService::class);
    }

    public function boot(): void
    {
        Schema::defaultStringLength(191);
    }
}