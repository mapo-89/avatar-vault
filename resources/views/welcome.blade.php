<x-guest-layout>
    <div class="max-w-7xl mx-auto p-6 lg:p-8">
        <h1 class="text-4xl font-bold text-center mb-6 flex flex-col items-center">
            Willkommen bei
            <img src="{{ asset('images/logo.png') }}"
                alt="AvatarVault"
                class="mt-4">
        </h1>

        <p class="text-center text-gray-600 mb-8 max-w-2xl mx-auto">
            Lade deinen Avatar hoch, verwalte ihn sicher und zeige ihn überall an.
        </p>

        <div class="flex justify-center space-x-4">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn-indigo w-48 flex items-center justify-center">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="btn-indigo w-48 flex items-center justify-center">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn-outline-indigo w-48 flex items-center justify-center">Registrieren</a>
                    @endif
                @endauth
            @endif
        </div>

        <!-- Authentik Login ähnlich wie Microsoft-Button -->
        <div class="text-center mt-6">
            <p class="text-gray-600 mb-3">Oder fortfahren mit:</p>
            <div class="flex justify-center space-x-4 mb-4">
                <a href="{{ url('/auth/authentik') }}"
                   class="btn btn-lg w-48 authentik-button flex items-center justify-center">
                    <img src="{{ asset('images/authentik.png') }}"
                         alt="Authentik Logo"
                         class="mr-2 h-6">
                    Authentik
                </a>
            </div>
            <div class="flex justify-center space-x-4">
                <a href="{{ url('/auth/authentik') }}"
                   class="btn btn-lg w-48 authentik-button flex items-center justify-center">
                    <img src="{{ asset('images/microsoft.svg') }}"
                         alt="Microsoft Logo"
                         class="mr-2 h-6">
                    Microsoft
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>
