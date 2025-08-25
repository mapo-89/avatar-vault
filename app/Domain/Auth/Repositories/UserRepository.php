<?php

namespace App\Domain\Auth\Repositories;

use App\Domain\Auth\Contracts\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function findOrCreateFromSocialite(object $socialUser, string $provider): User
    {
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

        return $user;
    }
}
