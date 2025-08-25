<?php

namespace App\Domain\Auth\Providers;

use App\Domain\Auth\Contracts\AuthProviderInterface;
use App\Domain\Auth\Contracts\UserRepositoryInterface;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AuthentikProvider implements AuthProviderInterface
{
    public function __construct(private UserRepositoryInterface $users) {}

    public static function key(): string
    {
        return 'authentik';
    }

    public function redirect(): RedirectResponse
    {
        return Socialite::driver('authentik')->redirect();
    }

    public function handleCallback(): User
    {
        $socialUser = Socialite::driver('authentik')->user();
        return $this->users->findOrCreateFromSocialite($socialUser, self::key());
    }
}
