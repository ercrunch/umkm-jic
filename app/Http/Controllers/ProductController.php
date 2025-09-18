<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Detail;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{

    // Halaman Catalog Product User
    public function user() {
        $products = Product::all();

        return view('catalog', compact('products'));
    }

    // Halaman Detail Product User
    // public function detail($id) {
    //     $products = Product::find($id);
    //     return view('detail',['products'=>$products]);
    // }    
    public function detail(Request $request,$id){
        $products = Product::find($id);
        $details = Detail::find($id);
        $product = Product::with('colors')->findOrFail($id);

        return view('detail', compact('products', 'details', 'product'));
    }
    // public function detail($id) {
    //     $products = Product::find($id);
    //     $details = $products->details; // Mengambil detail produk terkait
    
    //     return view('detail', ['products' => $products, 'details' => $details]);
    // }

    // Halaman Content Product Admin
    public function index() {
        $items = Product::all();

        return view('admin.contentProduct', [
            'products' => $items
        ]);
    }

    public function showCatalog(Request $request)
    {
        // Ambil semua kategori unik dari kolom 'category' di tabel 'products'
        $categories = Product::select('category')->distinct()->get();

        // Ambil kategori dari query string
        $category = $request->input('category');

        // Jika kategori "all" dipilih, tampilkan semua produk
        if ($category == 'all') {
            $products = Product::all();
        } else {
            // Jika kategori lain dipilih, tampilkan produk berdasarkan kategori
            $products = $category ? Product::where('category', $category)->get() : Product::all();
        }

        // Kirim data ke view
        return view('catalog', compact('products', 'categories'));
    }



    // Menyimpan gambar
    public function store(Request $request) {
        // Ambil semua data dari form
        $data = $request->all();
    
        // Menangani file gambar yang di-upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('product', 'public');
        } else {
            $data['image'] = ''; // Jika tidak ada gambar, kosongkan nilai image
        }
    
        // Menambahkan kategori ke data produk
        $data['category'] = $request->category;
    
        // Hapus 'updated_at' jika ada
        unset($data['updated_at']);
    
        // Menyimpan produk baru
        Product::create($data);
    
        // Redirect ke halaman produk
        return redirect()->route('contentProduct.index');
    }
    

    public function update(Request $request, $id) {
        // Ambil data produk berdasarkan id
        $data = Product::find($id);

        // Jika produk tidak ditemukan, redirect kembali dengan pesan error
        if (!$data) {
            return redirect()->route('contentProduct.index')->withErrors('Product not found.');
        }

        // Ambil semua kategori yang tersedia dari kolom 'category' dalam tabel 'products'
        $categories = Product::select('category')->distinct()->get();

        // Tampilkan halaman update produk dengan data produk dan kategori
        return view('admin.process.updateProduct', compact('data', 'categories'));
    }
    

    public function updated(Request $request, $id) {
        // Mencari produk berdasarkan id
        $data = Product::find($id);

        // Jika produk tidak ditemukan, redirect kembali
        if (!$data) {
            return redirect()->route('contentProduct.index')->withErrors('Product not found.');
        }

        // Ambil semua data dari form, kecuali token
        $updatedData = $request->except('_token');

        // Menangani file gambar yang di-upload
        if ($request->hasFile('image')) {
            $updatedData['image'] = $request->file('image')->store('product', 'public');
        } else {
            $updatedData['image'] = $data->image; // Jika tidak ada gambar baru, gunakan gambar lama
        }

        // Menambahkan kategori
        $updatedData['category'] = $request->category;

        // Hapus 'updated_at' jika ada
        unset($updatedData['updated_at']);

        // Perbarui data produk
        $data->update($updatedData);

        // Redirect ke halaman produk
        return redirect()->route('contentProduct.index');
    }

    public function delete(Request $request,$id){
        $data = Product::find($id);

        if($data){
            $data->delete();
        }

        return redirect()->route('contentProduct.index');
    }
    
}
