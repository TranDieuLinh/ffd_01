<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Repositories\Eloquent\UserRepository;
use App\Repositories\Eloquent\CategoryRepository;
use App\Repositories\Eloquent\FoodRepository;
use App\Repositories\Eloquent\RequestRepository;
use App\Repositories\Eloquent\RateRepository;
use App\Repositories\Eloquent\OrderRepository;
use App\Repositories\Eloquent\OrderItemRepository;
use App\Repositories\Eloquent\LikeRepository;
use App\Repositories\Eloquent\CommentRepository;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\Contracts\RateRepositoryInterface;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\FoodRepositoryInterface;
use App\Repositories\Contracts\OrderRepositoryInterface;
use App\Repositories\Contracts\OrderItemRepositoryInterface;
use App\Repositories\Contracts\LikeRepositoryInterface;
use App\Repositories\Contracts\CommentRepositoryInterface;
use App\Repositories\Contracts\RequestRepositoryInterface;
use App;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        App::bind(UserRepositoryInterface::class, UserRepository::class);
        App::bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        App::bind(FoodRepositoryInterface::class, FoodRepository::class);
        App::bind(LikeRepositoryInterface::class, LikeRepository::class);
        App::bind(OrderItemRepositoryInterface::class, OrderItemRepository::class);
        App::bind(OrderRepositoryInterface::class, OrderRepository::class);
        App::bind(RateRepositoryInterface::class, RateRepository::class);
        App::bind(RequestRepositoryInterface::class, RequestRepository::class);
        App::bind(CommentRepositoryInterface::class, CommentRepository::class);
    }
}
