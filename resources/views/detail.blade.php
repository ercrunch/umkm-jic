<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    
</head>
<body class="selection:bg-stone-500 selection:text-white" style="background-color: #E1DDD9;">
    <!-- Header -->
    <header class="flex flex-wrap sm:justify-start sm:flex-nowrap w-full bg-white text-sm py-4">
    @if (Route::has('login'))
        <nav class="max-w-[85rem] w-full mx-auto px-4 sm:flex sm:items-center sm:justify-start" aria-label="Global">
        @auth
            <a
                href="{{ url('/dashboard') }}"
                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-black dark:hover:text-white/80 dark:focus-visible:ring-white"
            >
                Dashboard
            </a>
        @else
            <a
                href="{{ route('login') }}"
                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-black dark:hover:text-black/80 dark:focus-visible:ring-white"
            >
            </a>

            @if (Route::has('register'))
                <a
                    href="{{ route('register') }}"
                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-black dark:hover:text-black/80 dark:focus-visible:ring-white"
                >
                </a>
            @endif
        @endauth
            <div class="flex items-center justify-start">
                <a class="inline-flex items-center gap-x-2 text-xl font-semibold  text-black" href="/catalog-page">
                    <img class="w-10 h-auto" src="assets/images/jic01.png" alt="Logo">
                    <i>just.in.case</i>
                </a>
            </div>
        </nav>
    @endif
    </header>
    <!-- End Header -->
    
    <main class="mt-6 px-5">
        <!-- Detail Product -->
        <div class="flex flex-col items-center justify-center">
            <div class="mb-5 group flex-shrink-0 relative rounded-xl overflow-hidden w-56 sm:w-96 h-80 mx-auto">
                <img src="{{ url('storage/' .$products->image) }}" alt="">
            </div>
            <div class="inline-flex flex-col items-center gap-y-2 text-2xl font-semibold text-black">
                {{ $products->name }}<br>
            </div>
            <div class="mt-2 inline-flex flex-col items-center gap-y-5 text-l sm:text-xl sm:mb-3 text-black">
                <p class="text-black sm:text-l text-center" style="margin-left: 50px; margin-right: 50px;">
                    {{ $products->description }}
                </p>
            </div>
        </div>
        
        <div class="p-2 grid grid-cols-3 gap-2 md:grid-cols-3 md:gap-4 md:p-4">
            <div class="bg-white aspect-[4/3] rounded-lg md:aspect-[4/3] xl:aspect[4/3]">
                <img src="{{ url('storage/' .$details->color_img_1) }}" alt="Color of Product" class="object-cover w-full h-full rounded-lg" width="100" height="100">
            </div>
            <div class="bg-white aspect-[4/3] rounded-lg md:aspect-[4/3] xl:aspect[4/3]">
                <img src="{{ url('storage/' .$details->color_img_2) }}" alt="Color of Product" class="object-cover w-full h-full rounded-lg" width="100" height="100">
            </div>
            <div class="bg-white aspect-[4/3] rounded-lg md:aspect-[4/3] xl:aspect[4/3]">
                <img src="{{ url('storage/' .$details->color_img_3) }}" alt="Color of Product" class="object-cover w-full h-full rounded-lg" width="100" height="100">
            </div>
            <div class="bg-white aspect-[4/3] rounded-lg md:aspect-[4/3] xl:aspect[4/3]">
                <img src="{{ url('storage/' .$details->detail_img_1) }}" alt="Detail of Catalog" class="object-cover w-full h-full rounded-lg" width="100" height="100">
            </div>
            <div class="bg-white aspect-[4/3] rounded-lg md:aspect-[4/3] xl:aspect[4/3]">
                <img src="{{ url('storage/' .$details->detail_img_2) }}" alt="Detail of Catalog" class="object-cover w-full h-full rounded-lg" width="100" height="100">
            </div>
            <div class="bg-white aspect-[4/3] rounded-lg md:aspect-[4/3] xl:aspect[4/3]">
                <img src="{{ url('storage/' .$details->detail_img_3) }}" alt="Detail of Catalog" class="object-cover w-full h-full rounded-lg" width="100" height="100">
            </div>
        </div>
        <!-- End Detail Product -->

        <!-- Button ke Halaman Katalog -->
        <div class="flex items-center justify-center mt-2">
            <a class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent bg-gray-100 text-gray-600 hover:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none " href="/catalog-page">
                Back
            </a>
        </div>
    </main>

    <!-- Footer -->
    <footer class="py-16 text-center text-sm text-black dark:text-black/70">
        <strong><i>just.in.case</i></strong>
    </footer>
    <!-- End Footer -->

    <script src="{{ asset('preline.js') }}"></script>

</body>
</html>