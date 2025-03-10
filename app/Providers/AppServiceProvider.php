<?php

namespace App\Providers;

use App\Repositories\CaisseRepository;
use App\Repositories\CaisseRepositoryInterface;
use App\Repositories\RapportRepository;
use App\Repositories\RapportRepositoryInterface;
use App\Repositories\SortieRepository;
use App\Repositories\SortieRepositoryInterface;
use App\Repositories\TypeSortieRepository;
use App\Repositories\TypeSortieRepositoryInterface;
use App\Repositories\UniteRepository;
use App\Repositories\UniteRepositoryInterface;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryInterface;
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
        $this->app->bind(SortieRepositoryInterface::class, SortieRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(RapportRepositoryInterface::class, RapportRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
