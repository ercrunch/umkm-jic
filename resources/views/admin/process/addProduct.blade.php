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
                <form method="POST" action="{{ route('contentProduct.store') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Product Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Product Category -->
                    <div class="mt-4">
                        <x-input-label for="category" :value="__('Category')" />
                        <select id="category" class="block mt-1 w-full" name="category" required>
                            <option value="short wallet" {{ old('category') == 'short wallet' ? 'selected' : '' }}>Short Wallet</option>
                            <option value="long wallet" {{ old('category') == 'long wallet' ? 'selected' : '' }}>Long Wallet</option>
                            <option value="card holder" {{ old('category') == 'card holder' ? 'selected' : '' }}>Card Holder</option>
                            <option value="sling bag" {{ old('category') == 'sling bag' ? 'selected' : '' }}>Sling Bag</option>
                            <option value="hand bag" {{ old('category') == 'hand bag' ? 'selected' : '' }}>Hand Bag</option>
                            <option value="tote bag" {{ old('category') == 'tote bag' ? 'selected' : '' }}>Tote Bag</option>
                        </select>
                        <x-input-error :messages="$errors->get('category')" class="mt-2" />
                    </div>


                    <!-- Product Price -->
                    <div class="mt-4">
                        <x-input-label for="price" :value="__('Price')" />
                        <x-text-input id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                    </div>

                    <!-- Product Image -->
                    <div class="mt-4">
                        <x-input-label for="image" :value="__('Image')" />
                        <x-text-input id="image" class="block mt-1 w-full" type="file" accept="image/*" name="image" :value="old('image')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>

                    <!-- Product Desc -->
                    <div class="mt-4">
                        <x-input-label for="description" :value="__('Description')" />
                        <textarea id="description" class="block mt-1 w-full border-gray-700 bg-white text-gray-600 focus:border-rose-200  focus:ring-rose-300  rounded-md shadow-sm" type="text" name="description" :value="old('description')" required autofocus autocomplete="name"></textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <!-- Button Back ke Tabel Content Product -->
                        <a class="underline text-blue-600 hover:underline" href="/admin/content-product">
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
