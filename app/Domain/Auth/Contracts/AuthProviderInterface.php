<?php
namespace App\Domain\Auth\Contracts;

use App\Models\User;
use Symfony\Component\HttpFoundation\RedirectResponse;

interface AuthProviderInterface
{
    public static function key(): string;
    public function redirect(): RedirectResponse;
    public function handleCallback(): User;
}
