<?php

namespace App\Domains\Auth\Services;

use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AuthService
{
    public function __construct(private AuthProviderFactory $factory) {}

    public function redirect(string $provider): RedirectResponse
    {
        return $this->factory->make($provider)->redirect();
    }

    public function handleCallback(string $provider): RedirectResponse
    {
        $user = $this->factory->make($provider)->handleCallback();

        Auth::login($user);

        return redirect()->intended('/dashboard');
    }
}
