<?php

use App\Domain\Auth\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/auth/{provider}',          [AuthController::class, 'redirect'])->name('auth.redirect');
Route::get('/auth/{provider}/callback', [AuthController::class, 'callback'])->name('auth.callback');

// Optional: Alte spezifische Routen als Redirects (Backward Compatibility)
Route::get('/auth/authentik', fn() => redirect()->route('auth.redirect', ['provider' => 'authentik']));
Route::get('/auth/authentik/callback', fn() => redirect()->route('auth.callback', ['provider' => 'authentik']));

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
