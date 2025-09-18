<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Masukkan Alpine.js -->
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/alpine.min.js" defer></script>
        <!-- Masukkan Tailwind CSS -->
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.x.x/dist/tailwind.min.css" rel="stylesheet">


        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.googleapis.com/css2?family=Kaisei+Decol:wght@400;500&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased" style="background-color: #E1DDD9;">
        <div class="min-h-screen ">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-[#BEB8AE] shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        
        <footer class="py-16 text-center text-sm text-black dark:text-black/70">
            <strong><i>just.in.case</i></strong>
        </footer>
        

        <script src="././node_modules/preline/dist/preline.js"></script>
    </body>
</html>
