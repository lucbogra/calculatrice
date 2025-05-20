<?php

namespace App\Providers;

use App\Services\CalculatorService;
use App\Services\interfaces\CalculatorInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CalculatorInterface::class, CalculatorService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
