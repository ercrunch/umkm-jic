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
    <header class="flex flex-wrap sm:justify-start sm:flex-nowrap w-full text-sm py-4">
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
                <a class="inline-flex items-center gap-x-2 text-xl font-semibold  text-black" href="login">
                    <img class="w-10 h-auto" src="assets/images/jic01.png" alt="Logo">
                    <i>just.in.case</i>
                </a>
            </div>
        </nav>
    @endif
    </header>
    <!-- End Header -->
    
    <!-- Slider -->
    <div data-hs-carousel='{"loadingClasses": "opacity-0","isAutoPlay": true}' class="relative">
        <div class="hs-carousel relative overflow-hidden w-full" style="min-height: 88vh;">
            <div class="hs-carousel-body absolute top-0 bottom-0 start-0 flex flex-nowrap transition-transform duration-700 opacity-0">
                <div class="hs-carousel-slide relative">
                    <img class="w-full h-full object-cover drop shadow-lg brightness-50" src="assets/images/01C.png" alt="First Slide">
                    <div class="absolute inset-0 flex flex-col justify-center items-center">
                    <p class="text-2xl text-gray-100 transition duration-700 text-center">Welcome To Our Site<br>And</p>
                        <p class="sm:text-5xl text-2xl text-gray-100 transition duration-700 mb-4 text-center"><strong><em>Feel The Authentic Comfort</strong></em></p>
                        <!-- Button ke Halaman Katalog -->
                        <div class="flex items-center justify-center">
                            <a class="py-4 px-5 inline-flex items-center gap-x-3 text-m font-semibold rounded-full border border-transparent bg-gray-100 text-gray-600 hover:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none " href="/catalog-page">
                                See Our Product
                            </a>
                        </div>
                    </div>
                </div>
                <div class="hs-carousel-slide relative">
                    <img class="w-full h-full object-cover drop shadow-lg brightness-50" src="assets/images/02C.jpg" alt="First Slide">
                    <div class="absolute inset-0 flex flex-col justify-center items-center">
                        <p class="text-3xl text-gray-100 transition duration-700 mb-4 text-center">Find the real comfort with <br><strong><em>just.in.case</strong><em></p>
                    </div>
                </div>
                <div class="hs-carousel-slide relative">
                    <img class="w-full h-full object-cover drop shadow-lg brightness-50" src="assets/images/03C.jpg" alt="First Slide">
                    <div class="absolute inset-0 flex flex-col justify-center items-center">
                        <p class="text-3xl text-gray-100 transition duration-700 mb-4 text-center">Affordable Price <br>Elegant Appearance</p>
                    </div>
                </div>
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
            <span class="hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-gray-400 rounded-full cursor-pointer"></span>
        </div>
    </div>
    <!-- End Slider -->

    <main class="mt-6 px-5">
        <!-- About Us -->
        <div class="container px-10 mx-auto p-0">
            <div class="border rounded-lg shadow-lg p-5 text-center whitespace-normal">
                <h2 class="mb-2 text-black text-l font-bold sm:text-2xl sm:mb-3"><u>ABOUT US</u></h2>
                <p class=" text-black sm:text-l">just.in.case (JIC) merupakan salah satu brand lokal yang hadir dari inspirasi anak muda untuk meningkatkan kualitas fashion  dengan harga yang<br> terjangkau namun tetap membuat penggunanya tampil casual dan elegan. JIC sangat mengutamakan kenyamanan  bagi para penggunanya yang disesuaikan dengan slogan kami, yaitu.
                <br>
                <br><strong>“FEEL THE AUTHENTIC COMFORT”</br></strong>
                <br>

                Produk JIC sendiri terbuat dari bahan PU leather yang lembut dan tahan air serta di rancang dengan teliti. Dengan design yang trendy kami berharap produk JIC bisa lebih mudah diterima di semua kalangan. JIC juga berkomitmen untuk melakukan riset dalam menyediakan berbagai jenis produk fashion yang praktis untuk para penggunanya secara terus menerus. Harapan kami JIC dapat memberikan kesan aesthetic dan authentic pada setiap penggunanya.</p>
            </div>
        </div>

        <!-- Catalog  -->
        <div class="p-2 grid grid-cols-3 gap-2 md:grid-cols-3 md:gap-4 md:p-4">
            @foreach ($catalogs as $item)
                <div class="bg-white aspect-[4/3] rounded-lg md:aspect-[3/4] xl:aspect[4/3]">
                    <img src="{{ url('storage/' .$item->imageCtg) }}" alt="Pict of Catalog" class="object-cover w-full h-full rounded-lg" width="200" height="200">
                </div>
            @endforeach
        </div>

        <!-- Button ke Halaman Katalog -->
        <div class="flex items-center justify-center mt-2 mb-5">
            <a href="/catalog-page" class="py-4 px-4 inline-flex items-center gap-x-2 text-m font-semibold rounded-full border border-transparent bg-gray-100 text-gray-600 hover:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none ">
                See Our Product
            </a>
        </div>
    </main>

    <!-- Footer -->
    <footer class="py-10 bg-orange-900 text-center text-white text-sm">
        <div>
            <div class="text-center text-white text-2xl">
                <strong><u>Contact Us</u></strong>
            </div>
            <div class="flex items-center justify-center mt-4 space-x-20">
                <!-- Icon Instagram -->
                <div class="flex items-center mr-4">
                    <a href="https://www.instagram.com/justincaseofficial.id/" target="_blank" rel="noopener noreferrer" class="flex items-center">
                        <img src="assets/images/instagram-icon.png" alt="" class="w-8 h-8 mr-2">
                        <span>@justincaseofficial.id</span>
                    </a>
                </div>
                <!-- Icon Whatsapp -->
                <div class="flex items-center mr-4">
                    <a href="https://wa.me/6282392697879" target="_blank" rel="noopener noreferrer" class="flex items-center">
                        <img src="assets/images/whatsapp-icon.png" alt="" class="w-8 h-8 mr-2">
                        <span>jic.official</span>
                    </a>
                </div>
                <!-- Icon TikTok -->
                <div class="flex items-center">
                    <a href="https://www.tiktok.com/@jic_official?_t=8jqwqucmma6&_r=1" target="_blank" rel="noopener noreferrer" class="flex items-center">
                        <img src="assets/images/tiktok-icon.png" alt="" class="w-8 h-8 mr-2">
                        <span>jic.official</span>
                    </a>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <!-- Copyright -->
    <div class="py-3 bg-orange-950 text-center text-white text-sm">
        <strong>© 2024 <i>just.in.case</i></strong>
    </div>
    
    <script src="{{ asset('preline.js') }}"></script>

</body>
</html>