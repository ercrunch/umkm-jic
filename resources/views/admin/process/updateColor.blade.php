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
                <!-- resources/views/admin/process/updateColor.blade.php -->
                <form method="POST" action="{{ route('updateColor.updated', $color->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="mb-4">
                        <label for="color_name" class="block text-sm font-medium text-gray-700">Color Name</label>
                        <input type="text" name="color_name" id="color_name" value="{{ old('color_name', $color->color_name) }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                    </div>

                    <div class="mb-4">
                        <label for="color_code" class="block text-sm font-medium text-gray-700">Color Code</label>
                        <input type="text" name="color_code" id="color_code" value="{{ old('color_code', $color->color_code) }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                    </div>

                    <!-- <div class="mb-4">
                        <label for="color_image" class="block text-sm font-medium text-gray-700">Color Image</label>
                        <input type="file" name="color_image" id="color_image" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                    </div> -->

                    <div class="flex items-center justify-end mt-4">
                        <!-- Button Back ke Tabel Detail Product -->
                        <a class="underline text-blue-600 hover:underline" href="{{ route('admin.colorProduct', $color->product_id) }}">
                            Back
                        </a>

                        <x-primary-button class="ms-3">
                            {{ __('Save') }}
                        </x-primary-button>
                    </div>
                </form>

            </div>
        </div>
    </body>
</html>
