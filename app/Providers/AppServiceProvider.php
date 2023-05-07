<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use \App\Http\Repositories\ItemRepository;
use \App\Http\Repositories\ItemRepositoryInterface;
use \App\Http\Repositories\CustomerRepositoryInterface;
use \App\Http\Repositories\CustomerRepository;
use \App\Http\Services\CustomerServiceInterface;
use \App\Http\Services\CustomerService;
use \App\Http\Services\ItemServiceInterface;
use \App\Http\Services\ItemService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ItemRepositoryInterface::class, ItemRepository::class);

        $this->app->bind(CustomerRepositoryInterface::class, CustomerRepository::class);

        $this->app->bind(ItemServiceInterface::class, ItemService::class);

        $this->app->bind(CustomerServiceInterface::class, CustomerService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
