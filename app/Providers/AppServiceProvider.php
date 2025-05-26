<?php

namespace App\Providers;

use App\Services\BrandService;
use App\Services\CarModelService;
use App\Services\CarService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CarService::class, function ($app) {
            return new CarService(
                $app->make(BrandService::class),
                $app->make(CarModelService::class)
            );
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
