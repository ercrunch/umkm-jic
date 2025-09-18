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
    
    <main class="mt-6 px-5">
        <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
            <!-- Product Details -->
            <div class="flex flex-col lg:flex-row">
                <!-- Product Image -->
                <div class="mb-5 group flex-shrink-0 relative rounded-xl overflow-hidden w-56 sm:w-96 h-90 mx-auto">
                <img src="{{ url('storage/' .$products->image) }}" alt="">
            </div>
                <!-- Product Info -->
                <div class="w-full lg:w-1/2 p-8">
                    <h1 class="text-3xl font-bold text-gray-800">{{ $products->name }}</h1>
                    <p class="text-xl font-semibold text-gray-600 mt-2">IDR {{ number_format($products->price, 0, ',', '.') }}</p>
                    <p class="text-gray-600 text-sm mt-4 leading-relaxed">{{ $products->description }}</p>

                    <!-- Color Options -->
                    <div class="mt-6">
                        <h2 class="text-lg font-semibold text-gray-800 mb-3">The Colors</h2>
                        <div id="productColorOptions" class="flex gap-2 mb-4">
                            @foreach ($product->colors as $color) 
                                <div class="w-10 h-10 rounded-full border-2" style="background-color: {{ $color->color_code }};" title="{{ $color->name }}">
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Add to Cart Button -->
                    <div class="mt-8">
                        @auth
                        <a id="addToCartButton" class="px-4 py-2 bg-black text-white rounded-lg font-semibold hover:bg-gray-700 btn"
                        onclick="document.getElementById('colorModal').classList.remove('hidden')">
                            Add to Cart
                        </a>
                        @endauth
                    </div>
                    <!-- Modal untuk Color Selection -->
                    <div id="colorModal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center">
                            <div class="bg-white rounded-lg w-80 p-6">
                                <h2 class="text-lg font-semibold mb-4">Pick The Color</h2>
                                
                                <!-- Form untuk Add To Cart -->
                                <form method="POST" action="{{ route('add.to.cart') }}">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="product_name" value="{{ $product->name }}">
                                    <input type="hidden" name="product_price" value="{{ $product->price }}">
                                    <input type="hidden" name="image" value="{{ $product->image }}">
                                    <input type="hidden" name="color_id" value="{{ $color->id }}" id="color_id_input">
                                    
                                    <!-- Pilihan Warna -->
                                    <div id="colorOptions" class="flex gap-2 mb-4">
                                        @foreach ($product->colors as $color)
                                            <label>
                                                <input type="radio" name="color_id" value="{{ $color->id }}" class="hidden peer" id="color_{{ $color->id }}">
                                                <div class="color-option w-10 h-10 rounded-full border-2 cursor-pointer peer-checked:ring-2 peer-checked:ring-black"
                                                    style="background-color: {{ $color->color_code }};"
                                                    data-color="{{ $color->name }}">
                                                </div>
                                            </label>
                                        @endforeach
                                    </div>
                                    
                                    <!-- Tombol Submit -->
                                    <button type="submit" id="confirmColorButton" class="inline-block px-3 py-2 bg-[#E1DDD9] rounded-lg text-sm font-semibold sm:text-base text-black hover:text-stone-500 cursor-pointer" disabled>
                                        Add 
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        
        <div id="additional-images" class="p-2 grid grid-cols-3 gap-2 md:grid-cols-3 md:gap-4 md:p-4">
            <div class="bg-white aspect-[4/3] rounded-lg md:aspect-[4/3] xl:aspect[4/3]">
                <img src="{{ url('storage/' .$details->color_img_1) }}" alt="Color of Product" class="object-cover w-full h-auto rounded-lg">
            </div>
            <div class="bg-white aspect-[4/3] rounded-lg md:aspect-[4/3] xl:aspect[4/3]">
                <img src="{{ url('storage/' .$details->color_img_2) }}" alt="Color of Product" class="object-cover w-full h-auto rounded-lg">
            </div>
            <div class="bg-white aspect-[4/3] rounded-lg md:aspect-[4/3] xl:aspect[4/3]">
                <img src="{{ url('storage/' .$details->color_img_3) }}" alt="Color of Product" class="object-cover w-full h-auto rounded-lg">
            </div>
            <div class="bg-white aspect-[4/3] rounded-lg md:aspect-[4/3] xl:aspect[4/3]">
                <img src="{{ url('storage/' .$details->detail_img_1) }}" alt="Detail of Catalog" class="object-cover w-full h-auto rounded-lg">
            </div>
            <div class="bg-white aspect-[4/3] rounded-lg md:aspect-[4/3] xl:aspect[4/3]">
                <img src="{{ url('storage/' .$details->detail_img_2) }}" alt="Detail of Catalog" class="object-cover w-full h-auto rounded-lg">
            </div>
            <div class="bg-white aspect-[4/3] rounded-lg md:aspect-[4/3] xl:aspect[4/3]">
                <img src="{{ url('storage/' .$details->detail_img_3) }}" alt="Detail of Catalog" class="object-cover w-full h-auto rounded-lg" >
            </div>
        </div>
        <!-- End Detail Product -->
         <!-- Scroll Down Button -->
        <div class="fixed bottom-5 right-5 z-80">
            <button onclick="scrollToDetails()" class="w-14 h-14 bg-black text-white rounded-full flex items-center justify-center shadow-lg hover:bg-gray-700">
                ⬇
            </button>
        </div>
        <!-- Back to Catalog Button -->
        <div class="text-center mt-12">
            <a href="/catalog-page" class="px-6 py-3 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200 btn">
                Back to Catalog
            </a>
        </div>
        <!-- Tampilkan pesan jika ada -->
        @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

    </main>

    <!-- Footer -->
    <footer class="py-16 text-center text-sm text-black dark:text-black/70">
        <strong><i>just.in.case</i></strong>
    </footer>
    <!-- End Footer -->

    <script src="{{ asset('preline.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const colorButtons = document.querySelectorAll('.color-option');
            const confirmButton = document.querySelector('#confirmColorButton');

            const colorRadios = document.querySelectorAll('input[name="color_id"]');

            colorRadios.forEach((radio) => {
                radio.addEventListener('change', function () {
                    if (this.checked) {
                        confirmButton.disabled = false; 
                    }
                });
            });
        });
        function scrollToDetails() {
            const detailSection = document.getElementById('additional-images');
            detailSection.scrollIntoView({ behavior: 'smooth' });
        }
        // Mengirimkan request untuk menambahkan produk ke keranjang
        fetch('/add-to-cart', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                product_id: productId,
                product_name: productName,
                product_price: productPrice,
                color_id: colorId,
                image: 'product_image_url_here'  
            })
        })
        .then(response => response.json())  
        .then(data => {
            alert(data.message);  
        })
        .catch(error => {            
            console.error('Error:', error);
            alert('Terjadi kesalahan saat menambahkan produk ke keranjang.');
        });
    
    </script>

</body>
</html>