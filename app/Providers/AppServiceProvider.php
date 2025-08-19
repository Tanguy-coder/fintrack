<?php

namespace App\Providers;

use App\Gateway\CaisseRepositoryInterface;
use App\Gateway\EmployeRepositoryinterface;
use App\Gateway\RapportRepositoryInterface;
use App\Gateway\SortieRepositoryInterface;
use App\Gateway\TypeSortieRepositoryInterface;
use App\Gateway\UniteRepositoryInterface;
use App\Gateway\UserRepositoryInterface;
use App\Repositories\CaisseRepository;
use App\Repositories\EmployeRepository;
use App\Repositories\RapportRepository;
use App\Repositories\SortieRepository;
use App\Repositories\TypeSortieRepository;
use App\Repositories\UniteRepository;
use App\Repositories\UserRepository;
use Carbon\Carbon;
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
        $this->app->bind(EmployeRepositoryinterface::class, EmployeRepository::class);
        $this->app->bind(\App\Gateway\AssuranceRepositoryInterface::class, \App\Repositories\AssuranceRepository::class);
        $this->app->bind(\App\Gateway\SalaireRepositoryInterface::class, \App\Repositories\SalaireRepository::class);
        $this->app->bind(\App\Gateway\TypeEntreeRepositoryInterface::class, \App\Repositories\TypeEntreeRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Carbon::setLocale('fr');
    }
}
