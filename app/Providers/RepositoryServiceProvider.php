<?php

namespace App\Providers;

use App\Repositories\Interfaces\Order\OrderProductRepositoryInterface;
use App\Repositories\Interfaces\Order\OrderRepositoryInterface;
use App\Repositories\Interfaces\Product\CategoryRepositoryInterface;
use App\Repositories\Interfaces\Product\ProductRepositoryInterface;
use App\Repositories\Order\OrderProductRepository;
use App\Repositories\Order\OrderRepository;
use App\Repositories\Product\CategoryRepository;
use App\Repositories\Product\ProductRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            CategoryRepositoryInterface::class,
            CategoryRepository::class
        );
        $this->app->bind(
            ProductRepositoryInterface::class,
            ProductRepository::class
        );
        $this->app->bind(
            OrderRepositoryInterface::class,
            OrderRepository::class
        );
       $this->app->bind(
            OrderProductRepositoryInterface::class,
            OrderProductRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
