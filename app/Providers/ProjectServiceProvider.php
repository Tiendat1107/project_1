<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Projects\ProjectRepositoryInterface;
use App\Repositories\Projects\ProjectRepository;

class ProjectServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ProjectRepositoryInterface::class, ProjectRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
