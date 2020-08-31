<?php

namespace App\Providers;

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
            'App\Interfaces\RoleRepositoryInterface',
            'App\Repositories\RoleRepository'
        );

        $this->app->bind(
            'App\Interfaces\CountryRepositoryInterface',
            'App\Repositories\CountryRepository'
        );

        $this->app->bind(
            'App\Interfaces\CityRepositoryInterface',
            'App\Repositories\CityRepository'
        );

        $this->app->bind(
            'App\Interfaces\SectorRepositoryInterface',
            'App\Repositories\SectorRepository'
        );

        $this->app->bind(
            'App\Interfaces\SubSectorRepositoryInterface',
            'App\Repositories\SubSectorRepository'
        );

        $this->app->bind(
            'App\Interfaces\PermissionRepositoryInterface',
            'App\Repositories\PermissionRepository'
        );

        $this->app->bind(
            'App\Interfaces\UserRepositoryInterface',
            'App\Repositories\UserRepository'
        );

        $this->app->bind(
            'App\Interfaces\CompanyRepositoryInterface',
            'App\Repositories\CompanyRepository'
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
