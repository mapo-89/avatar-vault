<?php

namespace App\Domain\Auth\Services;

use App\Domain\Auth\Contracts\AuthProviderInterface;
use App\Domain\Auth\Providers\AuthentikProvider;
use InvalidArgumentException;

class AuthProviderFactory
{
    public function __construct(
        private AuthentikProvider $authentik,
    ) {}

    public function make(string $provider): AuthProviderInterface
    {
        return match ($provider) {
            AuthentikProvider::key() => $this->authentik,
            default => throw new InvalidArgumentException("Unsupported provider [$provider]"),
        };
    }
}
