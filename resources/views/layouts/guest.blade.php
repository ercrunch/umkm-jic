<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans selection:bg-stone-500 selection:text-white" style="background-color: #CBC7C1; antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center px-10 mx-auto p-0">
            <div>
                <x-application-logo class="w-20 h-20 fill-current text-black" />
                <!-- Conditional Text Below Logo -->
                @if (Route::is('login'))
                    <h1 class="text-2xl font-bold text-black mt-4">Sign In</h1>
                @elseif (Route::is('register'))
                    <h1 class="text-2xl font-bold text-black mt-4">Sign Up</h1>
                @endif
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 shadow-md overflow-hidden rounded-lg" style="background-color: rgba(255, 255, 255, 0.62);
                @if(Route::is('register')) margin-top: 25px; margin-bottom: 25px; @endif">
                {{ $slot }}
            </div>

        </div>
    </body>
</html>
