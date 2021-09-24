<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\FoodRepository;
use App\Repositories\OrderRepository;
use App\Repositories\ReviewRepository;
use App\Contracts\FoodRepositoryInterface;
use App\Contracts\OrderRepositoryInterface;
use App\Contracts\ReviewRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(FoodRepositoryInterface::class, FoodRepository::class);
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
        $this->app->bind(ReviewRepositoryInterface::class, ReviewRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
