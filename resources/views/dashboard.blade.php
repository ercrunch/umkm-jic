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
        <img class="w-full h-full object-cover " src="assets/images/pageUser.png" alt="Background">
    </div>

    <!-- Profile Section -->
    <div class="profile">
        <img src="assets/images/cat.jpg" alt="Profile Picture">
        <div class="profile-info">
        <h2>{{ Auth::user()->name }} <span class="badge">Premium</span></h2>
        </div>
    </div>

    <div class="p-4 grid grid-cols-1 gap-4 md:grid-cols-1 md:p-6 xl:grid-cols-1 xl:p-8">   
        <div class="flex flex-col bg-[#BEB8AE] bg-opacity-50 border shadow-sm rounded-xl p-3 space-y-3">
            <div class="card pesanan">
                <strong><h3>Pesanan</h3></strong>
                <table>
                    <thead>
                    <tr>
                        <th>Order Number</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Total Amount</th>
                        <!-- <th>Status</th> -->
                        <!-- <th>Bukti Pembayaran</th> -->
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <!-- Menampilkan Order Number -->
                            <td>{{ $order->order_number }}</td>

                            <!-- Menampilkan Name -->
                            <td>{{ $order->address ? $order->address->fullname : 'No name found' }}</td>

                            <!-- Menampilkan Phone Number -->
                            <td>{{ $order->address ? $order->address->phone : 'No phone found' }}</td>

                            <!-- Menampilkan Alamat -->
                            <td>{{ $order->address->address ?? 'No address found' }}</td>
                            
                            <!-- Menampilkan Total Amount -->
                            <td>IDR {{ number_format($order->total_amount, 0, ',', '.') }}</td>
                            
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- JIKA BISA TIGA HEHEHEH -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="p-4 grid grid-cols-1 gap-4 md:grid-cols-1 md:p-6 xl:grid-cols-3 xl:p-8">       
        <!-- Card -->
        <!-- <div class="flex flex-col bg-[#BEB8AE] bg-opacity-50 border shadow-sm rounded-xl p-3 space-y-3">
            Status Pesanan
            <div class="card">
                <h3>Status Pesanan</h3>
                <p class="status">Ivy Wallet</p>
                <p>Status: <strong>Menunggu pembayaran</strong></p>
            </div>
        </div> -->
        <!-- End Card -->
        <!-- Card -->
        <!-- <div class="flex flex-col bg-[#BEB8AE] bg-opacity-50 border shadow-sm rounded-xl p-3 space-y-3">
            Info Pengiriman
            <div class="card">
                <h3>Info Pengiriman</h3>
                <div class="icon">🚚</div>
                <p>Dalam pengiriman ke alamat tujuan</p>
            </div>
        </div> -->
        <!-- End Card -->
         <!-- Card -->
        <!-- <div class="flex flex-col bg-[#BEB8AE] bg-opacity-50 border shadow-sm rounded-xl p-3 space-y-3">
            <div class="card pesanan">
                <h3>Pesanan</h3>
                <table>
                    <thead>
                    <tr>
                        <th>No Pesanan</th>
                        <th>Produk</th>
                        <th>Status</th>
                        <th>Bukti Pembayaran</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>BX792011</td>
                        <td>Marlen Wallet</td>
                        <td class="status-diterima">Diterima</td>
                        <td><a href="#">Lihat Bukti</a></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div> -->
        <!-- End Card -->
    </div>

    <div class="text-right mb-6 mx-6">
        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
            @csrf
            <button type="submit" class="px-6 py-3 bg-gray-100 text-gray-700 rounded-lg font-semibold hover:bg-gray-200">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>


    <script src="{{ asset('preline.js') }}"></script>

</body>
</html>