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
            'App\Interfaces\BaseRepositoryInterface',
            'App\Repositories\BaseRepository'
        );

        $this->app->bind(
            'App\Interfaces\CountryRepositoryInterface',
            'App\Repositories\CountryRepository'
        );

        $this->app->bind(
            'App\Interfaces\CityRepositoryInterface',
            'App\Repositories\CityRepository'
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
