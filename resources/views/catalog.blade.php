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
                <a class="inline-flex items-center gap-x-2 text-xl font-semibold" href="/">
                    <img class="w-10 h-auto" src="assets/images/jic01.png" alt="Logo">
                    <i>just.in.case</i>
                </a>
            </div>
        </nav>
    @endif
    </header>
    <!-- End Header -->
    
    <main class="mt-6 px-5">
        <div class="p-2 grid grid-cols-2 gap-2 md:grid-cols-4 md:p-4 xl:grid-cols-4">
            @foreach ($products as $product)
                <!-- Card -->
                <a class="group relative block rounded-lg overflow-hidden" href="{{ route('product.detail', ['id' => $product->id]) }}">
                    <div class="aspect-[4/3] rounded-lg overflow">
                        <img class="group-hover:scale-105 transition-transform duration-500 ease-in-out rounded-lg w-full object-cover" src="{{ url('storage/' .$product->image) }}" alt="Image Description">
                    </div>
                    <div class="absolute bottom-0 start-0 end-0 p-2">
                        <div class="font-semibold rounded-lg p-3 bg-neutral-800 text-neutral-200 flex justify-between">
                            <div>
                                {{ $product->name }}
                            </div>
                            <div>
                                Rp{{ number_format($product->price, 2, ',', '.') }}
                            </div>
                        </div>
                    </div>
                </a>
                <!-- End Card -->
            @endforeach
        </div>

        <!-- Button ke Halaman Utama (Home) -->
        <div class="flex items-center justify-center mt-2">
            <a class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent bg-gray-100 text-gray-600 hover:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none " href="/">
                Back
            </a>
        </div>
    </main>

    <!-- Footer -->
    <footer class="py-16 text-center text-sm text-black dark:text-black/70">
        <strong><i>just.in.case</i></strong>
    </footer>
    <!-- End Footer -->

    <script src="./node_modules/preline/dist/preline.js"></script>
    
</body>
</html>