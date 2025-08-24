<?php

use App\Http\Controllers\Auth\AuthentikController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('auth/authentik', [AuthentikController::class, 'redirectToAuthentik'])->name('authentik.auth');
Route::get('auth/authentik/callback', [AuthentikController::class, 'handleAuthentikCallback']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
