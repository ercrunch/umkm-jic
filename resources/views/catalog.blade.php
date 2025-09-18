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
<body class="selection:bg-stone-500 selection:text-white" style="background-color: #D9D9D9;">
    <!-- Header -->
    <!-- Header -->
    <header class="flex flex-wrap sm:justify-between sm:flex-nowrap w-full text-sm py-4" style="background: linear-gradient(to right, #BEB8AE, #FFFFFF);">
        @if (Route::has('login'))
        <nav class="max-w-[85rem] w-full mx-auto px-4 sm:flex sm:items-center sm:justify-between" aria-label="Global">
            <div class="flex items-center justify-start">
                <a class="inline-flex items-center gap-x-2 text-xl font-semibold  text-black">
                    <img class="w-10 h-auto" src="assets/images/jic01.png" alt="Logo">
                    <i>just.in.case</i>
                </a>
            </div>

            <!-- Right Side (Home, Catalog, About Us Links) -->
            <div class="flex space-x-4 sm:ml-auto">
                <!-- Links for Home, Catalog, About Us -->
                <a
                    href="{{ url('/') }}"
                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 hover:text-stone-400 focus:outline-none"
                >
                    Home
                </a>
                <a
                    href="{{ url('/catalog-page') }}"
                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 hover:text-stone-400 focus:outline-none"
                >
                    Catalog
                </a>
                @auth
                    @if(Auth::user()->usertype == 'admin')
                        <!-- Admin specific link -->
                        <a href="{{ route('admin.dashboard') }}" class="rounded-md px-3 py-2 text-red-600 font-bold">
                            Admin Dashboard
                        </a>
                    @else
                        <!-- User specific link -->

                        <!-- Cart Icon -->
                        <a href="{{ route('user.cart') }}">
                            <img class="w-10 h-auto" src="assets/images/cart-icon.png" alt="Cart">
                        </a>

                        <!-- Acc Icon -->
                        <a href="{{ route('dashboard') }}">
                            <img class="w-10 h-auto" src="assets/images/acc-icon.png" alt="Profile">
                        </a>
                    @endif
                @else
                    <!-- If not logged in, redirect to login -->
                    
                    <!-- Cart Icon (redirect to login) -->
                    <a href="{{ route('login') }}">
                        <img class="w-10 h-auto" src="assets/images/cart-icon.png" alt="Cart">
                    </a>

                    <!-- Acc Icon (redirect to login) -->
                    <a href="{{ route('login') }}">
                        <img class="w-10 h-auto" src="assets/images/acc-icon.png" alt="Login">
                    </a>
                @endauth
            </div>

            </div>
        </nav>
        @endif
    </header>
    <!-- End Header -->

    <!-- Section -->
    <div class="relative w-full">
        <!-- Background Image -->
        <img class="w-full h-full object-cover" src="assets/images/pageCatalog.png" alt="Background">
    </div>
    
    <div class="flex justify-between items-center p-4 mt-7">
        <!-- Dropdown Button -->
        <div class="relative inline-block text-left ml-auto">
            <button type="button" class="inline-flex justify-center items-center gap-2 px-4 py-2 text-sm font-medium rounded-lg bg-[#BEB8AE] text-white hover:bg-[#A49C89] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#BEB8AE]" id="dropdownButton" aria-expanded="false" aria-haspopup="true">
                Categories
                <svg class="w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>

            <!-- Dropdown Menu -->
            <div class="dropdown-menu absolute hidden right-0 w-48 mt-2 origin-top-right bg-[#BEB8AE] rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" aria-labelledby="dropdownButton">
                <div class="py-1">
                <a href="{{ route('catalog', ['category' => 'all']) }}" 
                class="text-white block hover:bg-stone-400 px-4 py-2 text-sm">
                    Show All
                </a>
                    @foreach ($categories as $category)
                        <a href="{{ route('catalog', ['category' => $category->category]) }}" class="text-white block hover:bg-stone-400 px-4 py-2 text-sm">{{ $category->category }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <main class=" px-5">
        <!-- New Card -->
        <div class="p-4 grid grid-cols-2 gap-4 md:grid-cols-3 md:p-6 xl:grid-cols-3 xl:p-8">
            @foreach ($products as $product)
                <!-- Card -->
                <div class="flex flex-col bg-[#BEB8AE] border shadow-sm rounded-xl p-3 space-y-3">
                    <a href="{{ route('product.detail', ['id' => $product->id]) }}">
                        <div class="h-15">
                            <img class="w-full h-full rounded-t-xl object-contain" src="{{ url('storage/' . $product->image) }}" alt="Image Description">
                        </div>
                    </a>
                    <div>
                        <h3 class="text-sm font-semibold text-white truncate">
                            {{ $product->name }}
                        </h3>
                        <div class="mt-1 flex justify-between items-center">
                            <span class="text-sm font-semibold text-white">
                                Rp{{ number_format($product->price, 2, ',', '.') }}
                            </span>
                            <a class="py-2 px-3 inline-flex justify-center items-center gap-x-2 text-xs font-extrabold rounded-lg border border-transparent bg-[#D9D9D9] text-white hover:bg-stone-400 focus:outline-none disabled:pointer-events-none" href="{{ route('product.detail', ['id' => $product->id]) }}">
                                See More
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End Card -->
            @endforeach
        </div>
    </main>

    <!-- Footer -->
    <footer class="py-16 text-center text-sm text-black dark:text-black/70">
        <strong><i>just.in.case</i></strong>
    </footer>
    <!-- End Footer -->

    <script src="./node_modules/preline/dist/preline.js"></script>

    <script>
        document.getElementById('dropdownButton').addEventListener('click', function() {
            const menu = document.querySelector('.dropdown-menu');
            menu.classList.toggle('hidden');
        });
    </script>
    
</body>
</html>