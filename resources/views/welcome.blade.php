<x-guest-layout>
    <div class="max-w-7xl mx-auto p-6 lg:p-8">
        <h1 class="text-4xl font-bold text-center mb-6 flex flex-col items-center">
            Willkommen bei
            <img src="{{ Vite::asset('resources/images/logo.png') }}"
                alt="AvatarVault"
                class="mt-4">
        </h1>


        <p class="text-center text-gray-600 mb-8 max-w-2xl mx-auto">
            Lade deinen Avatar hoch, verwalte ihn sicher und zeige ihn überall an.
        </p>

        <div class="flex justify-center space-x-4">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn-indigo">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="btn-indigo">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn-outline-indigo">Registrieren</a>
                    @endif
                @endauth
            @endif
        </div>
    </div>
</x-guest-layout>
