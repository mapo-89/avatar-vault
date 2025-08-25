<?php

namespace App\Domain\Auth\Controllers;

use App\Http\Controllers\Controller;
use App\Domain\Auth\Services\AuthService;

class AuthController extends Controller
{
    public function redirect(string $provider, AuthService $service)
    {
        return $service->redirect($provider);
    }

    public function callback(string $provider, AuthService $service)
    {
        return $service->handleCallback($provider);
    }
}
