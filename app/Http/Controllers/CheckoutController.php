<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Address;
use App\Models\Order;

class CheckoutController extends Controller
{
    public function validateCheckout(Request $request)
    {
        // Ambil data keranjang dari sesi
        $cart = session()->get('cart', []);
    
        // Ambil data keranjang dari request jika ada
        $cartData = json_decode($request->input('cart_data'), true);
        $totalAmount = 0; // Variabel untuk total keseluruhan
    
        $processedCartData = []; // Data keranjang yang diproses untuk ditampilkan
    
        // Proses data dari keranjang sesi (cart) dan tambahkan ke $processedCartData
        foreach ($cart as $item) {
            // Ambil warna produk berdasarkan color_id
            $color = \App\Models\Color::find($item['color']);
            
            // Hitung total per item (harga * kuantitas)
            $itemTotal = $item['product_price'] * $item['quantity'];
    
            // Tambahkan total per item ke total keseluruhan
            $totalAmount += $itemTotal;
    
            // Tambahkan data item yang telah diproses
            $processedCartData[] = [
                'product_name' => $item['product_name'],
                'quantity' => $item['quantity'],
                'product_price' => $item['product_price'],
                'color_name' => $color ? $color->name : 'Unknown', // Nama warna
                'color_code' => $color ? $color->color_code : '#000000', // Kode warna
                'item_total' => $itemTotal, // Total harga per item
            ];
        }
    
        // Proses tambahan jika ada data cart dari request (cart_data)
        if (!empty($cartData)) {
            foreach ($cartData as &$item) {
                // Ambil warna produk berdasarkan color_id
                $color = \App\Models\Color::find($item['color']);
                $item['color_name'] = $color ? $color->name : 'Unknown';
                $item['color_code'] = $color ? $color->color_code : '#000000';
                
                // Hitung total per item (harga * kuantitas)
                $itemTotal = $item['product_price'] * $item['quantity'];
                
                // Tambahkan total per item ke total keseluruhan
                $totalAmount += $itemTotal;
    
                // Tambahkan data item ke cartData
                $processedCartData[] = [
                    'product_name' => $item['product_name'],
                    'quantity' => $item['quantity'],
                    'product_price' => $item['product_price'],
                    'color_name' => $item['color_name'],
                    'color_code' => $item['color_code'],
                    'item_total' => $itemTotal,
                ];
            }
        }
        // dd($processedCartData, $totalAmount);
        // Ambil alamat pengguna yang sedang login
        $user = auth()->user(); // Mendapatkan pengguna yang sedang login
        $addresses = $user->addresses; 
        // dd($user->addresses);// Mengambil alamat yang terkait dengan pengguna
        // Generate random order number
        $orderNumber = strtoupper('ORD' . bin2hex(random_bytes(4)));

        // Kirim data ke view
        return view('user.checkout', [
            'cartData' => $processedCartData, // Data keranjang yang sudah diproses
            'totalAmount' => $totalAmount, // Total keseluruhan
            'addresses' => $addresses,
            'orderNumber' => $orderNumber,
        ]);
    }
    

    // Method untuk memproses checkout
    public function processCheckout(Request $request)
    {
        // Validasi jika alamat pengiriman dan data lainnya telah terisi
        $request->validate([
            'address_id' => 'required|exists:addresses,id',
        ]);

        // Ambil data alamat dan total checkout
        $address = Address::find($request->address_id);
        $totalAmount = $request->input('total_amount'); // Ambil dari form atau session
        $user = Auth::user(); // Ambil data user yang login

        // Buat nomor pesanan acak
        $orderNumber = 'ORD-' . Str::upper(Str::random(8));

        // Simpan data order ke database
        $order = Order::create([
            'user_id' => $user->id,
            'address_id' => $address->id,
            'total_amount' => $totalAmount,
            'order_number' => $orderNumber,
            'order_date' => now(),
        ]);
        session()->flash('success', 'Your order has been placed successfully!');

        // Redirect kembali ke halaman dashboard dengan membawa pesan sukses
        return redirect()->route('dashboard');
    }
    public function showOrder($orderId)
    {
        // Ambil data order berdasarkan order_id
        $order = Order::with('address')->findOrFail($orderId);

        // Kirim data order ke view
        return view('dashboard', compact('order'));
    }
}
