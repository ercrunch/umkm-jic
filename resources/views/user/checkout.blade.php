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

<body class="selection:bg-stone-500 selection:text-white" style="background-color: #D9D9D9;">

    <h1 class="checkout-validation-title">Checkout Validation</h1>
    
    <div class="cart-checkout">
        <form method="POST" action="{{ route('checkout.process') }}" class="checkout-form">
            @csrf
            <!-- Dropdown alamat -->
            <label for="address">Address</label>
            <select name="address_id" id="address" required onchange="updatePhoneNumber()">
                @foreach ($addresses as $address)
                    <option value="{{ $address->id }}" data-phone="{{ $address->phone }}">
                        {{ $address->fullname }} - {{ $address->address }}
                    </option>
                @endforeach
            </select>

            <!-- Menampilkan nomor telepon berdasarkan alamat yang dipilih -->
            <label for="phone">Phone Number</label>
            <input type="text" id="phone" name="phone" readonly>
            <!-- Menampilkan setiap item dalam keranjang -->
            @foreach ($cartData as $item)
                <div class="cart-item">
                    <div class="item-details">
                        <!-- Menampilkan warna di sebelah kiri nama produk -->
                        <span class="warna-display" style="background-color: {{ $item['color_code'] }};"></span>
                        <p>{{ $item['product_name'] }}</p>
                        <!-- Menampilkan harga perkalian di bawah nama produk -->
                        <div class="item-quantity">
                            <p>{{ $item['quantity'] }} × IDR {{ number_format($item['product_price'], 0, ',', '.') }}</p>
                        </div>
                    </div>
                    <div class="item-price">
                        <!-- Harga total per item -->
                        <p>IDR {{ number_format($item['item_total'], 0, ',', '.') }}</p>
                    </div>
                </div>
            @endforeach

            <!-- Menampilkan total keseluruhan -->
            <div class="checkout-total keseluruhan">
                <div class="total-details">
                    <p><strong>Total Amount</strong></p>
                    <p class="total-price"><strong>IDR {{ number_format($totalAmount, 0, ',', '.') }}</strong></p>
                </div>
            </div>
            <!-- Menampilkan nomor pesanan acak -->
            <div class="order-number">
                <p class="number"><strong>No.</strong> {{ $orderNumber }}</p>
            </div>

            <!-- Sembunyikan total_amount di input hidden -->
            <input type="hidden" name="total_amount" value="{{ $totalAmount }}">
                @csrf
                <!-- Kirimkan data konfirmasi checkout ke route pemrosesan -->
                <button type="submit" class="inline-block px-3 py-2 bg-white rounded-lg text-sm font-semibold sm:text-base text-black hover:text-stone-500">
                    Proceed to Checkout
                </button>
        </form>
    </div>

    <script src="{{ asset('preline.js') }}"></script>
    <script>
        function updatePhoneNumber() {
            // Ambil elemen select dan pilih opsi yang dipilih
            var addressSelect = document.getElementById('address');
            var selectedOption = addressSelect.options[addressSelect.selectedIndex];

            // Debugging untuk memastikan nomor telepon ditemukan
            console.log(selectedOption.getAttribute('data-phone')); // Periksa di console

            // Ambil nomor telepon dari atribut data-phone
            var phone = selectedOption.getAttribute('data-phone');

            // Masukkan nomor telepon ke input phone
            if (phone) {
                document.getElementById('phone').value = phone;
            } else {
                document.getElementById('phone').value = ''; // Kosongkan jika tidak ada
            }
        }

        // Panggil fungsi untuk memperbarui nomor telepon saat halaman pertama kali dimuat
        window.onload = function() {
            updatePhoneNumber(); // Memperbarui nomor telepon saat halaman pertama dimuat
        };
        
        
    </script>



</body>
</html>
