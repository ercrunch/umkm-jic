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

        return view('detail', compact('products', 'details'));
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

    // Menyimpan gambar
    public function store(Request $request) {
    $data = $request->all();

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('product', 'public');
    } else {
        $data['image'] = ''; 
    }

    // Hapus kunci 'updated_at' dari array 
    unset($data['updated_at']);

    // create data
    Product::create($data);

    return redirect()->route('contentProduct.index');
    
    }

    public function update(Request $request,$id){
        $data = Product::find($id);

        return view('admin.process.updateProduct', compact('data'));
    }

    public function updated(Request $request,$id){
        $data = $request->except('_token');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('product', 'public');
        } else {
            $data['image'] = ''; 
        }
    
        // Hapus kunci 'updated_at' dari array 
        unset($data['updated_at']);
    
        // update data
        Product::whereId($id)->update($data);
    
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
