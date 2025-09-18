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
                <form method="POST" action="{{ route('colorProduct.store', ['productId' => $productId]) }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Hidden Input untuk Product ID -->
                    <input type="hidden" name="product_id" value="{{ $productId }}">

                    <!-- Color Name -->
                    <div>
                        <x-input-label for="color_name" :value="__('Color Name')" />
                        <x-text-input id="color_name" class="block mt-1 w-full" type="text" name="color_name" :value="old('color_name')" required autofocus autocomplete="color_name" />
                        <x-input-error :messages="$errors->get('color_name')" class="mt-2" />
                    </div>

                    <!-- Color Code -->
                    <div>
                        <x-input-label for="color_code" :value="__('Color Code')" />
                        <x-text-input id="color_code" class="block mt-1 w-full" type="text" name="color_code" :value="old('color_code')" required autofocus autocomplete="color_code" />
                        <x-input-error :messages="$errors->get('color_code')" class="mt-2" />
                    </div>

                    <!-- Product Image (Optional) -->
                    <!-- <div class="mt-4">
                        <x-input-label for="color_image" :value="__('Color Image')" />
                        <x-text-input id="color_image" class="block mt-1 w-full" type="file" accept="image/*" name="color_image" />
                        <x-input-error :messages="$errors->get('color_image')" class="mt-2" />
                    </div> -->

                    <div class="flex items-center justify-end mt-4">
                        <!-- Button Back ke Tabel Content Product -->
                        <a class="underline text-blue-600 hover:underline" href="{{ route('admin.colorProduct', $productId) }}">
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
