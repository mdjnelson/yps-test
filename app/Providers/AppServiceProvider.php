<?php

namespace App\Providers;

use App\Contracts\DataServiceInterface;
use App\Services\PunkBeerDataService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(DataServiceInterface::class, PunkBeerDataService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
