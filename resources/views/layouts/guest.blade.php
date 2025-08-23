<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="/favicons/favicon.ico" type="image/x-icon">
        <link rel="icon" href="/favicons/favicon.png">
        <link rel="icon" sizes="57x57" href="/favicons/favicon-32x32.png">
        <link rel="icon" sizes="57x57" href="/favicons/favicon-57x57.png">
        <link rel="icon" sizes="72x72" href="/favicons/favicon-72x72.png">
        <link rel="icon" sizes="76x76" href="/favicons/favicon-76x76.png">
        <link rel="icon" sizes="114x114" href="/favicons/favicon-114x114.png">
        <link rel="icon" sizes="120x120" href="/favicons/favicon-120x120.png">
        <link rel="icon" sizes="144x144" href="/favicons/favicon-144x144.png">
        <link rel="icon" sizes="152x152" href="/favicons/favicon-152x152.png">

        <meta name="msapplication-TileColor" content="#FFFFFF">
        <meta name="msapplication-TileImage" content="/favicons/favicon-144x144.png">
        <meta name="application-name" content="{{ config('app.name', 'AvatarVault') }}">

        <title>{{ config('app.name', 'AvatarVault') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>

        @livewireScripts
    </body>
</html>
