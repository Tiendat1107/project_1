<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Person\PersonRepository;
use App\Repositories\Person\PersonRepositoryInterface;


class PersonServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(PersonRepositoryInterface::class, PersonRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
