<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 flex items-center space-x-6">
            <!-- Current Profile Photo -->
            <div class="mt-2" x-show="! photoPreview">
                <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" class="rounded-full size-20 object-cover">
            </div>

            <div>
                <h3 class="text-lg font-medium text-gray-900">{{ Auth::user()->name }}</h3>
                <p class="text-sm text-gray-600">{{ Auth::user()->email }}</p>
            </div>
        </div>

        <div class="mt-6">
            <p>Willkommen im Avatar Dashboard! Hier kannst du deinen Avatar hochladen und verwalten.</p>
        </div>



    </div>
</x-app-layout>
