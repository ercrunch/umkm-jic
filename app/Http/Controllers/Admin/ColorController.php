<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index($productId)
    {
        $product = Product::with('colors')->findOrFail($productId);
        return view('admin.colorProduct', compact('productId', 'product')); // Pastikan $productId ada di sini
    }

    


    // Tampilkan form input warna berdasarkan produk
    public function create($productId)
    {
        $product = Product::findOrFail($productId);
        return view('admin.process.addColor', compact('productId', 'product')); // Mengirimkan productId dan product ke view
    }


    // Simpan warna ke database
    public function store(Request $request, $productId)
    {
        $request->validate([
            'color_name' => 'required|string|max:255',
            'color_code' => 'required|string|max:10',
            'color_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $color = new Color();
        $color->product_id = $productId;
        $color->color_name = $request->input('color_name');
        $color->color_code = $request->input('color_code');

        // if ($request->hasFile('color_image')) {
        //     $path = $request->file('color_image')->store('colors', 'public');
        //     $color->color_image = $path;
        // }

        $color->save();

        return redirect()->route('admin.colorProduct', $productId)
                        ->with('success', 'Color added successfully');
    }

    // ColorController.php
    public function update($colorId)
    {
        $color = Color::findOrFail($colorId); // Temukan warna berdasarkan ID
        return view('admin.process.updateColor', compact('color')); // Kirim data warna ke tampilan
    }

    // ColorController.php
    public function updated(Request $request, $colorId)
    {
        $request->validate([
            'color_name' => 'required|string|max:255',
            'color_code' => 'required|string|max:10',
            'color_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $color = Color::findOrFail($colorId); // Temukan warna berdasarkan ID
        $color->color_name = $request->input('color_name');
        $color->color_code = $request->input('color_code');

        // Jika ada gambar warna baru, simpan gambar baru
        // if ($request->hasFile('color_image')) {
        //     $path = $request->file('color_image')->store('colors', 'public');
        //     $color->color_image = $path;
        // }

        $color->save(); // Simpan pembaruan warna

        return redirect()->route('admin.colorProduct', $color->product_id)
            ->with('success', 'Color updated successfully');
    }

    public function delete($colorId)
    {
        // Cari data warna berdasarkan colorId
        $color = Color::find($colorId);

        // Jika warna ditemukan, hapus
        if ($color) {
            $color->delete();
        }

        // Redirect kembali ke halaman daftar warna produk
        return redirect()->route('admin.colorProduct', $color->product_id) // Kembali ke halaman produk terkait
            ->with('success', 'Color deleted successfully');
    }



}
