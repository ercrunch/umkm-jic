<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        // Validasi input
        $request->validate([
            'product_id' => 'required|integer',
            'product_name' => 'required|string',
            'product_price' => 'required|numeric',
            'image' => 'required|string',
            'color_id' => 'required|integer',
        ]);
        // Ambil data cart dari session 
        $cart = session()->get('user.cart', []);

        // Data produk yang akan ditambahkan ke cart
        $product = [
            'product_id' => $request->input('product_id'),
            'product_name' => $request->input('product_name'),
            'product_price' => $request->input('product_price'),
            'image' => $request->input('image'),
            'color' => $request->input('color_id'),
            'quantity' => 1,
        ];

        // cek apakah produk sudah ada di cart
        $productExists = false; 

        // Periksa apakah produk dengan product_id yang sama sudah ada di keranjang
        foreach ($cart as &$item) {
            // Periksa apakah kunci 'product_id' dan 'color' ada dalam item
            if (isset($item['product_id'], $item['color']) && 
                $item['product_id'] == $product['product_id'] && 
                $item['color'] == $product['color']) {

                // Jika produk ada, tambahkan quantity
                $item['quantity'] += 1;
                $productExists = true;
                break;
            }
        }

        // Jika produk belum ada, tambahkan produk baru
        if (!$productExists) {
            $cart[] = $product;
        }
        // dd($product);  // Menampilkan produk yang ditambahkan sebelum disimpan

        // dd($request->input('color_id'));

        // save again ke session
        session()->put('user.cart', $cart);
        if ($productExists) {
            session()->flash('message', 'Produk sudah ada di keranjang, quantity diperbarui!');
        } else {
            session()->flash('message', 'Produk berhasil ditambahkan ke keranjang!');
        }

        return redirect()->route('product.detail', ['id' => $product['product_id']]);
        }

    public function viewCart()
    {
        $cart = session()->get('user.cart', []);
        
        Log::info("Isi Keranjang (View Cart): ", $cart); // Debugging sesi

        return view('user.cart', compact('cart'));
    }

    public function updateCart(Request $request)
{
    // Validasi input
    $request->validate([
        'item_id' => 'required|integer',
        'quantity' => 'required|integer|min:1',
        'color' => 'required|string', // Menambahkan color pada validasi
    ]);

    // Ambil keranjang dari session
    $cart = session()->get('user.cart', []);

    // Cari item berdasarkan item_id dan color, lalu update kuantitasnya
    foreach ($cart as &$item) {
        if ($item['product_id'] == $request->input('item_id') && $item['color'] == $request->input('color')) {
            $item['quantity'] = $request->input('quantity');
            break;
        }
    }

    // Simpan kembali keranjang ke session
    session()->put('user.cart', $cart);

    return response()->json(['message' => 'Keranjang berhasil diperbarui']);
}


public function removeFromCart(Request $request)
{
    // Validasi input
    $request->validate([
        'item_id' => 'required|integer',
        'color' => 'required|string', // Menambahkan color pada validasi
    ]);

    // Ambil keranjang dari session
    $cart = session()->get('user.cart', []);

    // Filter keranjang untuk menghapus item berdasarkan item_id dan color
    $cart = array_filter($cart, function($item) use ($request) {
        return $item['product_id'] != $request->input('item_id') || $item['color'] != $request->input('color');
    });

    // Reindex array agar tidak ada gap
    $cart = array_values($cart);

    // Simpan kembali keranjang ke session
    session()->put('user.cart', $cart);

    return response()->json(['message' => 'Produk berhasil dihapus dari keranjang']);
}

}
