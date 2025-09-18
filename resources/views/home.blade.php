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
<!-- E1DDD9 -->
<body class="selection:bg-stone-500 selection:text-white" style="background-color: #D9D9D9;">
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
                <a
                    href="#About-Us"
                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 hover:text-stone-400 focus:outline-none"
                >
                    About Us
                </a>
                <!-- @auth
                    <a
                        href="{{ url('/dashboard') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-black dark:hover:text-white/80 dark:focus-visible:ring-white"
                    >
                        
                    </a>
                @else
                    <a href="{{ route('login') }}">
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-black dark:hover:text-black/80 dark:focus-visible:ring-white"
                        <img class="w-10 h-auto" src="assets/images/acc-icon.png" alt="Logo">
                    </a>
                @endauth -->
                 <!-- Authentication Logic -->
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
        </nav>
        @endif
    </header>
    <!-- End Header -->

    <!-- Section -->
    <div class="relative w-full">
        <!-- Background Image -->
        <img class="w-full h-full object-cover " src="assets/images/pageHome.png" alt="Background">
    </div>

    <main class="mt-6 px-6 py-6">

        <p class="text-4xl font-serif text-black sm:text-2xl leading-tight  pl-20 font-bold">
            Categories
        </p>

        <div class="container grid grid-cols-2 gap-4 px-10 mx-auto p-6">
            <!-- Bagian Kategori -->
            <div class="categories grid grid-cols-3 gap-4">
                <a href="{{ route('catalog', ['category' => 'Short Wallet']) }}">
                    <div class="category-box flex flex-col items-center justify-center bg-[#BEB8AE] rounded-md h-15 p-2">
                        <img src="assets/images/categories/short-wallet.png" alt="Short Wallet" class="h-full object-contain">
                        <p class="text-md font-semibold text-center">Short Wallet</p>
                    </div>
                </a>
                <a href="{{ route('catalog', ['category' => 'Long Wallet']) }}">
                    <div class="category-box flex flex-col items-center justify-center bg-[#BEB8AE] rounded-md h-15 p-2">
                        <img src="assets/images/categories/long-wallet.png" alt="Long Wallet" class="h-full object-contain">
                        <p class="text-md font-semibold text-center">Long Wallet</p>
                    </div>
                </a>
                <a href="{{ route('catalog', ['category' => 'Card Holder']) }}">
                    <div class="category-box flex flex-col items-center justify-center bg-[#BEB8AE] rounded-md h-15 p-2">
                        <img src="assets/images/categories/card-holder.png" alt="Card Holder" class="h-full object-contain">
                        <p class="text-md font-semibold text-center">Card Holder</p>
                    </div>
                </a>
                <a href="{{ route('catalog', ['category' => 'Sling Bag']) }}">
                    <div class="category-box flex flex-col items-center justify-center bg-[#BEB8AE] rounded-md h-15 p-2">
                        <img src="assets/images/categories/sling-bag.png" alt="Sling Bag" class="h-full object-contain">
                        <p class="text-md font-semibold text-center">Sling Bag</p>
                    </div>
                </a>
                <a href="{{ route('catalog', ['category' => 'Hand Bag']) }}">
                    <div class="category-box flex flex-col items-center justify-center bg-[#BEB8AE] rounded-md h-15 p-2">
                        <img src="assets/images/categories/hand-bag.png" alt="Hand Bag" class="h-full object-contain">
                        <p class="text-md font-semibold text-center">Hand Bag</p>
                    </div>
                </a>
                <a href="{{ route('catalog', ['category' => 'Tote Bag']) }}">
                    <div class="category-box flex flex-col items-center justify-center bg-[#BEB8AE] rounded-md h-15 p-2">
                        <img src="assets/images/categories/tote-bag.png" alt="Tote Bag" class="h-full object-contain">
                        <p class="text-md font-semibold text-center">Tote Bag</p>
                    </div>
                </a>
            </div>
            <!-- Bagian Foto -->
            <div class="photo-container flex justify-center items-center bg-gray-100 rounded-lg h-54">
                <img class="w-full h-full object-cover rounded-xl" src="assets/images/best seller.png" alt="BestSeller">
            </div>
        </div>

        <!-- Carousel Card -->
        <div class="container mx-auto p-4 border-4 border-gray-300 rounded-xl shadow-lg">
            <div data-hs-carousel='{"loadingClasses": "opacity-0","isAutoPlay": true}' class="relative">
                <div class="hs-carousel relative overflow-hidden w-full" style="min-height: 44vh;">
                    <div class="hs-carousel-body absolute top-0 bottom-0 start-0 flex flex-nowrap transition-transform duration-700 opacity-0">
                        <div class="hs-carousel-slide relative">
                            <img class="w-full h-full object-cover drop-shadow-lg" src="assets/images/PJ1.png" alt="First Slide">
                        </div>
                        <div class="hs-carousel-slide relative">
                            <img class="w-full h-full object-cover drop shadow-lg" src="assets/images/PJ2.png" alt="First Slide">
                        </div>
                        <!-- <div class="hs-carousel-slide relative">
                            <img class="w-full h-full object-cover drop shadow-lg brightness-50" src="assets/images/03C.jpg" alt="First Slide">
                        </div> -->
                    </div>
                </div>

                <button type="button" class="hs-carousel-prev hs-carousel:disabled:opacity-50 disabled:pointer-events-none absolute inset-y-0 start-0 inline-flex justify-center items-center w-[46px] h-full text-gray-800 hover:bg-gray-800/10 rounded-s-lg">
                    <span class="text-2xl" aria-hidden="true">
                        <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m15 18-6-6 6-6"></path>
                        </svg>
                    </span>
                    <span class="sr-only">Previous</span>
                </button>
                <button type="button" class="hs-carousel-next hs-carousel:disabled:opacity-50 disabled:pointer-events-none absolute inset-y-0 end-0 inline-flex justify-center items-center w-[46px] h-full text-gray-800 hover:bg-gray-800/10 rounded-e-lg">
                    <span class="sr-only">Next</span>
                        <span class="text-2xl" aria-hidden="true">
                        <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6"></path>
                        </svg>
                    </span>
                </button>

                <div class="hs-carousel-pagination flex justify-center absolute bottom-3 start-0 end-0 space-x-2">
                    <span class="hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-gray-400 rounded-full cursor-pointer"></span>
                    <span class="hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-gray-400 rounded-full cursor-pointer"></span>
                    <!-- <span class="hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-gray-400 rounded-full cursor-pointer"></span> -->
                </div>
            </div>
            <!-- Notes Gallery -->
            <div class="container px-4 mx-8 item-center">
                <img src="assets/images/Galleryy.png" class="object-cover rounded-lg mx-auto" style="width: 400px; height: auto;">
            </div>
            <!-- End Notes Gallery -->

            <!-- Catalog  -->
            <div class="p-4 grid grid-cols-3 gap-2 md:grid-cols-3 md:gap-4 md:p-8">
                @foreach ($catalogs as $item)
                    <div class="bg-white aspect-[4/3] rounded-lg md:aspect-[3/4] xl:aspect[4/3]">
                        <img src="{{ url('storage/' .$item->imageCtg) }}" alt="Pict of Catalog" class="object-cover w-full h-full rounded-lg" width="200" height="200">
                    </div>
                @endforeach
            </div>
            <!-- End Catalog -->
        </div>
        <!-- End Carousel Card -->
    </main>

    <!-- Footer -->
    <footer id="About-Us" class="py-10 text-white text-sm" style="background-color: #BEB8AE; font-family:Arial; padding-left : 20px">
        <!-- Container -->
        <div class="max-w-10xl mx-auto px-6 lg:px-20">
            <!-- About Us Section -->
            <div class="lg:flex lg:justify-between lg:items-center text-center lg:text-left">
                <!-- Left Section: About Us -->
                <div class="lg:w-1/3 mb-5 lg:mb-0 text-left">
                    <!-- Judul -->
                    <h1 class="text-5xl font-bold mb-5" style="font-family: Georgia, serif; margin-left: 9px;">About Us</h1>
                    <!-- Ikon Media Sosial -->
                    <div class="flex margin-right: 70px; space-x-8">
                        <!-- Instagram -->
                        <a href="https://www.instagram.com/justincaseofficial.id/" target="_blank" rel="noopener noreferrer">
                            <img src="assets/images/Instagram-icon.png" alt="Instagram Icon" class="w-9 h-9">
                        </a>
                        <!-- Whatsapp -->
                        <a href="https://wa.me/6282392697879" target="_blank" rel="noopener noreferrer">
                            <img src="assets/images/whatsapp-icon.png" alt="WhatsApp Icon" class="w-10 h-9.5">
                        </a>
                        <!-- Shopee -->
                        <a href="https://shopee.co.id/jicofficialshop" target="_blank" rel="noopener noreferrer">
                            <img src="assets/images/shopee-icon.png" alt="Shopee Icon" class="w-9 h-9">
                        </a>
                        <!-- TikTok -->
                        <a href="https://www.tiktok.com/@jic_official?_t=8jqwqucmma6&_r=1" target="_blank" rel="noopener noreferrer">
                            <img src="assets/images/tiktok-icon.png" alt="TikTok Icon" class="w-9 h-9">
                        </a>
                    </div>
                </div>
                <!-- Right Section: Description -->
                <div class="lg:w-2/3">
                    <h3 class="text-3xl font-bold mb-4" style="font-family: Georgia, serif;">Just in Case</h3>
                    <p class="italic" style="text-align: justify;">Merupakan salah satu brand lokal yang hadir dari inspirasi anak muda untuk meningkatkan kualitas fashion dengan harga yang terjangkau namun tetap membuat penggunanya tampil casual dan elegan. 
                        JIC sangat mengutamakan kenyamanan bagi para penggunanya yang di sesuaikan dengan slogan kami.</p>
                    <p class="italic mt-5" style="text-align: justify;">" FEEL THE AUTHENTIC COMFORT " Produk JIC sendiri terbuat dari bahan PU leather yang lembut dan tahan air serta di rancang dengan teliti, dengan design yang trendy kami berharap produk JIC bisa lebih mudah di terima di semua kalangan. 
                        JIC juga berkomitmen untuk melakukan riset dalam menyediakan berbagai jenis produk fashion yang praktis untuk para penggunanya secara terus menerus. Harapan kami JIC dapat memberikan kesan aesthetic dan authentic ke setiap penggunanya.</p>
                    <p class="text-white mt-5 text-xs">© Copyright by Starbuzz</p> 
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->



    <script src="{{ asset('preline.js') }}"></script>

</body>
</html>