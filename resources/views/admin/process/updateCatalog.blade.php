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
    <body class="font-sans selection:bg-stone-500 selection:text-white" style="background-color: #E1DDD9; antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center px-10 mx-auto p-0">
            <div>
                <a href="/dashboard">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-8 px-8 py-4 shadow-md overflow-hidden rounded-lg" style="background-color: rgba(255, 255, 255, 0.62);">
                <form method="POST" action="{{ route('updateCatalog.updated',['id' => $data->id]) }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Product Image Catalog -->
                    <div class="mt-4">
                        <x-input-label for="imageCtg" :value="__('Image Catalog')" />
                        <x-text-input id="imageCtg" class="block mt-1 w-full" type="file" accept="imageCtg/*" name="imageCtg" value="{{ $data->image }}" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('imageCtg')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <!-- Button Back ke Tabel Content Catalog -->
                        <a class="underline text-blue-600 hover:underline" href="/admin/content-catalog">
                            Back
                        </a>

                        <x-primary-button class="ms-3">
                            {{ __('Submit') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
