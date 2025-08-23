<?php

namespace App\Http\Controllers;

use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('authentik')->redirect();
    }

    public function handleProviderCallback()
    {
        // 1️⃣ Socialite User holen
        $socialUser = Socialite::driver('authentik')->user();

        // 2️⃣ Laravel User erstellen/aktualisieren
        $user = User::updateOrCreate(
            [
                'email' => $socialUser->getEmail(), // eindeutiges Feld
            ],
            [
                'name' => $socialUser->getName() ?: $socialUser->getNickname(),
                'password' => bcrypt(uniqid()), // Zufallspasswort, wird nie benutzt
                'oidc_sub' => $socialUser->getId(),
                'oidc_provider' => 'authentik',
                'oidc_groups' => $socialUser->user['groups'] ?? [],
            ]
        );

        // 3️⃣ Laravel User einloggen
        auth()->login($user, true);

        return redirect()->route('dashboard');
    }
}

