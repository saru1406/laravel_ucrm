<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Http\Repositories\ItemRepositoryInterface::class,
            \App\Http\Repositories\ItemRepository::class,
        );

        $this->app->bind(
            \App\Http\Services\ItemServiceInterface::class,
            function ($app) {
                return new \App\Http\Services\ItemService(
                    $app->make(\App\Http\Repositories\ItemRepositoryInterface::class)
                );
            },
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
