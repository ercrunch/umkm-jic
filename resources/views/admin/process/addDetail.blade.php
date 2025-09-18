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
                <form method="POST" action="{{ route('detailProduct.store') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Product Name -->
                    <div class="mt-4">
                        <x-input-label for="product_id" :value="__('Product')" />
                        <select id="product_id" name="product_id" class="block mt-1 w-full rounded-md shadow-sm focus:ring-opacity-50">
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('product_id')" class="mt-2" />
                    </div>

                    <!-- Color of Product-->
                    <div class="mt-4">
                        <x-input-label for="color_img_1" :value="__('Color Product 1')" />
                        <x-text-input id="color_img_1" class="block mt-1 w-full" type="file" accept="color_img_1/*" name="color_img_1" :value="old('color_img_1')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('color_img_1')" class="mt-2" />
                    </div>

                    <!-- Color of Product-->
                    <div class="mt-4">
                        <x-input-label for="color_img_2" :value="__('Color Product 2')" />
                        <x-text-input id="color_img_2" class="block mt-1 w-full" type="file" accept="color_img_2/*" name="color_img_2" :value="old('color_img_2')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('color_img_2')" class="mt-2" />
                    </div>

                    <!-- Color of Product-->
                    <div class="mt-4">
                        <x-input-label for="color_img_3" :value="__('Color Product 3')" />
                        <x-text-input id="color_img_3" class="block mt-1 w-full" type="file" accept="color_img_3/*" name="color_img_3" :value="old('color_img_3')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('color_img_3')" class="mt-2" />
                    </div>

                    <!-- Detail Product -->
                    <div class="mt-4">
                        <x-input-label for="detail_img_1" :value="__('Detail Product 1')" />
                        <x-text-input id="detail_img_1" class="block mt-1 w-full" type="file" accept="detail_img_1/*" name="detail_img_1" :value="old('detail_img_1')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('detail_img_1')" class="mt-2" />
                    </div>

                    <!-- Detail Product -->
                    <div class="mt-4">
                        <x-input-label for="detail_img_2" :value="__('Detail Product 2')" />
                        <x-text-input id="detail_img_2" class="block mt-1 w-full" type="file" accept="detail_img_2/*" name="detail_img_2" :value="old('detail_img_2')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('detail_img_2')" class="mt-2" />
                    </div>

                    <!-- Detail Product -->
                    <div class="mt-4">
                        <x-input-label for="detail_img_3" :value="__('Detail Product 3')" />
                        <x-text-input id="detail_img_3" class="block mt-1 w-full" type="file" accept="detail_img_3/*" name="detail_img_3" :value="old('detail_img_3')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('detail_img_3')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <!-- Button Back ke Tabel Content Detail Product -->
                        <a class="underline text-blue-600 hover:underline" href="/admin/detail-product">
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
