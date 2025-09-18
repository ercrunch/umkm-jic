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
                    <img class="w-10 h-auto" src="../assets/images/jic01.png" alt="Logo">
                    <i>just.in.case</i>
                </a>
            </div>

            <!-- Right Side (Home, Catalog, About Us Links) -->
            <div class="flex space-x-4 sm:ml-auto">
                <!-- Links for Home, Catalog, About Us -->
                <!-- <a
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
                </a> -->
                @auth
                    @if(Auth::user()->usertype == 'admin')
                        <!-- Admin specific link -->
                        <a href="{{ route('admin.dashboard') }}" class="rounded-md px-3 py-2 text-red-600 font-bold">
                            Admin Dashboard
                        </a>
                    @else
                        <!-- User specific link -->

                        <!-- Acc Icon -->
                        <a href="{{ route('dashboard') }}">
                            <img class="w-10 h-auto" src="../assets/images/acc-icon.png" alt="Profile">
                        </a>
                    @endif
                @else
                    <!-- If not logged in, redirect to login -->
                    
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

    <div class="cart-container">
        <div class="cart-header">
            <h1 class="cart-title">Cart</h1>
            <div>
                <a class="inline-block px-3 py-2 bg-white rounded-lg text-sm font-semibold sm:text-base text-black hover:text-stone-500 " href="javascript:history.back()">
                        Back
                </a>
                <a class="inline-block px-3 py-2 bg-white rounded-lg text-sm font-semibold sm:text-base text-black hover:text-stone-500 " href="{{ route('user.process.addAddress') }}">
                        Add New Address
                </a>
            </div>
        </div>
        <div class="cart-items">
            @empty($cart)
            <div class="text-xl my-4 font-semibold">
                <p>{{ $message ?? 'Your Cart is Empty ! Add Some Product ... ' }}</p>
            </div>
            @else
                @foreach ($cart as $item)
                <div class="product-card" data-item-id="{{ $item['product_id'] ?? '' }}">
                    <img src="{{ url('storage/' . $item['image']) }}" alt="{{ $item['product_name'] }}" class="product-image">
                    <h3 class="product-name">{{ $item['product_name'] }}</h3>
                    <p class="product-price">IDR {{ number_format($item['product_price'], 0, ',', '.') }}</p>
                    <p class="product-color">Warna: {{ $item['color'] }}</p> 
                    <div class="product-quantity" data-item-id="{{ $item['product_id'] ?? '' }}">
                        <button class="quantity-btn decrease">-</button>
                        <span class="quantity-value">{{ $item['quantity'] }}</span>
                        <button class="quantity-btn increase">+</button>
                    </div>
                </div>
                @endforeach
            @endempty
        </div>

        <form method="POST" action="{{ route('user.checkout') }}">
            @csrf
            <!-- Kirimkan data keranjang sebagai array -->
            <input type="hidden" name="cart_data" value="{{ json_encode($cart) }}">
            <button type="submit" class="checkout-btn">Check Out</button>
        </form>

        <!-- Tombol Check Out -->
        <!-- <button class="checkout-btn">Check Out</button> -->
    </div>

    <script src="{{ asset('preline.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    // document.addEventListener("DOMContentLoaded", function() {
    //     // Meng-handle klik tombol tambah kuantitas
    //     document.querySelectorAll('.increase').forEach(button => {
    //         button.addEventListener('click', function() {
    //             updateQuantity(this, 1);
    //         });
    //     });

    //     // Meng-handle klik tombol kurangi kuantitas
    //     document.querySelectorAll('.decrease').forEach(button => {
    //         button.addEventListener('click', function() {
    //             updateQuantity(this, -1);
    //         });
    //     });

    //     function updateQuantity(button, change) {
    //         const itemId = button.closest('.product-quantity').getAttribute('data-item-id');
    //         const quantitySpan = button.closest('.product-quantity').querySelector('.quantity-value');
    //         let quantity = parseInt(quantitySpan.innerText);

    //         quantity += change;

    //         if (quantity < 1) {
    //             // Konfirmasi penghapusan jika quantity menjadi 0
    //             if (confirm("Apakah Anda yakin ingin menghapus produk ini dari keranjang?")) {
    //                 removeItem(itemId);
    //             }
    //         } else {
    //             // Update kuantitas di session
    //             updateCart(itemId, quantity);
    //             quantitySpan.innerText = quantity;
    //         }
    //     }

    //     function updateCart(itemId, quantity) {
    //         // Kirim permintaan AJAX untuk update keranjang
    //         fetch('/update-cart', {
    //             method: 'POST',
    //             headers: {
    //                 'Content-Type': 'application/json',
    //                 'X-CSRF-TOKEN': '{{ csrf_token() }}'
    //             },
    //             body: JSON.stringify({
    //                 item_id: itemId,
    //                 quantity: quantity
    //             })
    //         })
    //         .then(response => response.json())
    //         .then(data => {
    //             console.log(data.message); // Pesan dari backend
    //         });
    //     }

    //     function removeItem(itemId) {
    //         // Kirim permintaan AJAX untuk menghapus item
    //         fetch('/remove-from-cart', {
    //             method: 'POST',
    //             headers: {
    //                 'Content-Type': 'application/json',
    //                 'X-CSRF-TOKEN': '{{ csrf_token() }}'
    //             },
    //             body: JSON.stringify({
    //                 item_id: itemId
    //             })
    //         })
    //         .then(response => response.json())
    //         .then(data => {
    //             console.log(data.message); // Pesan dari backend
    //             location.reload(); // Reload halaman untuk menampilkan update keranjang
    //         });
    //     }
    // });

        document.addEventListener("DOMContentLoaded", function() {
        // Handle klik tombol tambah quantity
        document.querySelectorAll('.increase').forEach(button => {
            button.addEventListener('click', function() {
                updateQuantity(this, 1);
            });
        });

        // Handle klik tombol kurangi quantity
        document.querySelectorAll('.decrease').forEach(button => {
            button.addEventListener('click', function() {
                updateQuantity(this, -1);
            });
        });

        function updateQuantity(button, change) {
            const itemId = button.closest('.product-quantity').getAttribute('data-item-id');
            const color = button.closest('.product-card').querySelector('.product-color').innerText.trim().replace('Warna: ', ''); // Ambil warna produk
            const quantitySpan = button.closest('.product-quantity').querySelector('.quantity-value');
            let quantity = parseInt(quantitySpan.innerText);

            quantity += change;

            if (quantity < 1) {
                // Konfirmasi hapus jika quanitity 0
                if (confirm("Apakah Anda yakin ingin menghapus produk ini dari keranjang?")) {
                    removeItem(itemId, color);
                }
            } else {
                // Update quantity di session
                updateCart(itemId, quantity, color);
                quantitySpan.innerText = quantity;
            }
        }

        function updateCart(itemId, quantity, color) {
            // update keranjang
            fetch('/update-cart', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    item_id: itemId,
                    quantity: quantity,
                    color: color 
                })
            })
            // .then(response => response.json())
            // .then(data => {
            //     console.log('Response from server:', data); // Pastikan data message ada di sini
            //     alert(data.message); // Menampilkan pesan dari server
            // })
            // .catch(error => {
            //     console.error('Error:', error);
            //     alert('Terjadi kesalahan saat memperbarui keranjang.');
            // });

        }

        function removeItem(itemId, color) {
            // Hapus item dari keranjang
            fetch('/remove-from-cart', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    item_id: itemId,
                    color: color 
                })
            })
            .then(response => response.json())
            .then(data => {
                console.log(data.message);  // Menampilkan pesan di konsol
                alert(data.message); // Menampilkan alert dengan pesan dari server
                location.reload();  // Reload halaman untuk memperbarui tampilan keranjang
            })
            .catch(error => {
                console.error('Error:', error);  // Menampilkan error jika ada masalah
                alert('Terjadi kesalahan saat menghapus item dari keranjang.');  // Pesan kesalahan
            });

        }
    });

    </script>

</body>
</html>