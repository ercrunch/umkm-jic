<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detail;
use App\Models\Product;

class DetailController extends Controller
{
    // Halaman Detail Product Admin
    public function index() {
        $items = Detail::all();
        $products = Product::all(); // Ambil semua data produk

        return view('admin.detailProduct', [
            'products' => $items
        ]);
    }
     // Halaman Detail Product Admin
    public function add() {
        $items = Detail::all();
        $products = Product::all(); // Ambil semua data produk

        return view('admin.process.addDetail', [
            'detail' => $items,
            'products' => $products
        ]);
    }    

    // Menyimpan Gambar
    public function store(Request $request) {
        $data = $request->all();

        // Cek dan tangani file yang diunggah
        $fileFields = ['color_img_1', 'color_img_2', 'color_img_3', 'detail_img_1', 'detail_img_2', 'detail_img_3'];
        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                $data[$field] = $request->file($field)->store('detail_product', 'public');
            } else {
                // Atur nilai default jika tidak ada file yang diunggah
                $data[$field] = ''; // Atau sesuaikan dengan nilai default yang Anda inginkan
            }
        }

        // Ambil nama produk berdasarkan ID
        $product = Product::find($data['product_id']);
            $data['product_name'] = $product->name;

        // Buat data produk baru
        $detail = Detail::create($data);
            
        // Redirect ke halaman index
        return redirect()->route('detailProduct.index');

    }

    public function product() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function update(Request $request,$id){
        $products = Product::all();
        $data = Detail::find($id);

        return view('admin.process.updateDetail', compact('products', 'data'));
    }

    public function updated(Request $request, $id) {
        $data = $request->except('_token');
    
        // Proses upload gambar jika ada
        foreach (['color_img_1', 'color_img_2', 'color_img_3', 'detail_img_1', 'detail_img_2', 'detail_img_3'] as $field) {
            if ($request->hasFile($field)) {
                $data[$field] = $request->file($field)->store('detail_product', 'public');
            } else {
                // Atur nilai default jika tidak ada file yang diunggah
                $data[$field] = ''; 
            }
        }
    
        // Hapus kunci 'updated_at' dari array
        unset($data['updated_at']);
    
        // update data
        Detail::whereId($id)->update($data);
    
        return redirect()->route('detailProduct.index');
    }
    
    public function delete(Request $request,$id){
        $data = Detail::find($id);

        if($data){
            $data->delete();
        }

        return redirect()->route('detailProduct.index');
    }

}
