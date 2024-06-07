<?php

namespace App\Http\Controllers;
use App\Models\Catalog;

use Illuminate\Http\Request;

class CatalogController extends Controller
{

    // Halaman Tampilan Catalog User
    public function user() {
        $catalogs = Catalog::all();

        return view('home', compact('catalogs'));
    }

    public function index () {
        $items = Catalog::all();

        return view("admin.contentCatalog", [
            'catalogs' => $items 
        ]);
    }

    public function store(Request $request) {
        $data = $request->all();
        $data['imageCtg'] = $request->file('imageCtg')->store('catalog', 'public');
        Catalog::create($data);

        return redirect()->route('contentCatalog.index');
    }

    public function update(Request $request,$id){
        $data = Catalog::find($id);

        return view('admin.process.updateCatalog', compact('data'));
    }

    public function updated(Request $request,$id){
        $data = $request->except('_token');
        $data['imageCtg'] = $request->file('imageCtg')->store('catalog', 'public');
        Catalog::whereId($id)->update($data);

        return redirect()->route('contentCatalog.index');
    }

    public function delete(Request $request,$id){
        $data = Catalog::find($id);

        if($data){
            $data->delete();
        }

        return redirect()->route('contentCatalog.index');
    }
}
