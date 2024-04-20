<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Country\CountryRepository;
use App\Repositories\Country\CountryRepositoryInterface;


class CountryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CountryRepositoryInterface::class, CountryRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
