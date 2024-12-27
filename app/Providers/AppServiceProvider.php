<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Jet;
use App\Observers\JetObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Jet::observe(JetObserver::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
