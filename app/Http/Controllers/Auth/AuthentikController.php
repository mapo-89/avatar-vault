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
        $user = User::firstOrNew(
            ['email' => $socialUser->getEmail()]
        );

        if (! $user->exists) {
            $user->password = bcrypt(uniqid()); // nur beim ersten Mal
        }

        $user->fill([
            'name' => $socialUser->getName() ?: $socialUser->getNickname(),
            'oidc_sub' => $socialUser->getId(),
            'oidc_provider' => 'authentik',
            'oidc_groups' => $socialUser->user['groups'] ?? [],
        ]);

        $user->save();

        // 3️⃣ Laravel User einloggen
        auth()->login($user, true);

        return redirect()->route('dashboard');
    }
}

