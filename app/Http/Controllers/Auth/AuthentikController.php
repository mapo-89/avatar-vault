<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class AuthentikController extends Controller
{
    public function redirectToAuthentik()
    {
        return Socialite::driver('authentik')->redirect();
    }

    public function handleAuthentikCallback()
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
                'oidc_sub' => $socialUser->getId(),
                'oidc_provider' => 'authentik',
                'oidc_groups' => $socialUser->user['groups'] ?? [],
            ]
        );

        // Passwort nur setzen, wenn null
        if (is_null($user->password)) {
            $user->password = bcrypt(uniqid());
            $user->save();
        }

        // 3️⃣ Laravel User einloggen
        auth()->login($user, true);

        return redirect()->route('dashboard');
    }
}

