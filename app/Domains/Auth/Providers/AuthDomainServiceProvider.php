<?php

namespace App\Domains\Auth\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domains\Auth\Contracts\UserRepositoryInterface;
use App\Domains\Auth\Repositories\UserRepository;

class AuthDomainServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Bind repository contract to Eloquent implementation
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
