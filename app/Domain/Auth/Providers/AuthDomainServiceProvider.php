<?php

namespace App\Domain\Auth\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domain\Auth\Contracts\UserRepositoryInterface;
use App\Domain\Auth\Repositories\UserRepository;

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
