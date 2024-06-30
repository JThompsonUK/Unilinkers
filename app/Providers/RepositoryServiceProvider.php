<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\PropertyRepositoryInterface;
use App\Repositories\PropertyRepository;
use App\Interfaces\RoomsRepositoryInterface;
use App\Repositories\RoomsRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(PropertyRepositoryInterface::class, PropertyRepository::class);
        $this->app->bind(RoomsRepositoryInterface::class, RoomsRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
