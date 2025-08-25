<?php
namespace App\Domains\Auth\Contracts;

use App\Models\User;

interface UserRepositoryInterface
{
    public function findOrCreateFromSocialite(object $socialUser, string $provider): User;
}
