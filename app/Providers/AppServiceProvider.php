<?php

namespace App\Providers;

use App\Repositories\CaisseRepository;
use App\Repositories\CaisseRepositoryInterface;
use App\Repositories\TypeSortieRepository;
use App\Repositories\TypeSortieRepositoryInterface;
use App\Repositories\UniteRepository;
use App\Repositories\UniteRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
           UniteRepositoryInterface::class,
            UniteRepository::class
        );
        $this->app->bind(CaisseRepositoryInterface::class, CaisseRepository::class);
        $this->app->bind(TypeSortieRepositoryInterface::class, TypeSortieRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
