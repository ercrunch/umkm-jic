<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    // public function index() {
    //     return view('dashboard');
    // }
    public function index()
    {
        // Ambil data order berdasarkan user yang sedang login
        $user = Auth::user();
        // Ambil data order untuk user yang login, termasuk detail order items
        $orders = Order::with('address', 'orderItems.product')
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        // Kirimkan data order ke view dashboard
        return view('dashboard', compact('orders'));
    }

    public function showCart() {
        return view('user.cart');
    }

    public function addAddress() {
        return view('user.process.addAddress');
    }

    public function storeAddress(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'fullname' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:500',
        ]);

        // Simpan alamat baru ke database
        Auth::user()->addresses()->create($validated);

        // Redirect kembali ke halaman cart atau ke mana pun sesuai kebutuhan
        return redirect()->route('user.cart')->with('success', 'Address added successfully!');
    }

    // Menambahkan relasi hasMany ke Address
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    // public function showAccount() {
    //     return view('user.account');
    // }
}
