<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Route;

// User Routes
Route::middleware(['auth', 'userMiddleware'])->group(function(){

    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');

    Route::post('/add-new-address', [UserController::class, 'storeAddress'])->name('user.address.store');

    // Tambah Baru Alamat
    Route::get('/add-new-address', function () {
        return view('/user/process/addAddress');
    })->middleware(['auth', 'verified'])->name('user.process.addAddress');

    Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('add.to.cart');
    Route::get('/shopping-cart', [CartController::class, 'viewCart'])->name('user.cart');
    // Route untuk update kuantitas di keranjang
    Route::post('/update-cart', [CartController::class, 'updateCart'])->name('update.cart');
    // Route untuk menghapus produk dari keranjang
    Route::post('/remove-from-cart', [CartController::class, 'removeFromCart'])->name('remove.from.cart');

    // Route untuk validasi checkout
    Route::post('/checkout/validation', [CheckoutController::class, 'validateCheckout'])->name('user.checkout');
    Route::get('/checkout/validation', [CheckoutController::class, 'view'])->name('checkout.validation');

    // Route untuk proses checkout
    Route::post('/checkout', [CheckoutController::class, 'processCheckout'])->name('checkout.process');
    // Route::post('/checkout/process', [CheckoutController::class, 'processCheckout'])->name('user.checkout.process');

});

// Admin Routes
Route::middleware(['auth', 'adminMiddleware'])->group(function(){

    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // Halaman Content Catalog Admin
    Route::get('/admin/content-catalog', [CatalogController::class, 'index'])
        ->name('contentCatalog.index');

    Route::post('/admin/content-catalog', [CatalogController::class, 'store'])
        ->name('contentCatalog.store');

    // Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Halaman Content Product Admin
    Route::get('/admin/content-product', [ProductController::class, 'index'])
        ->name('contentProduct.index');

    Route::post('/admin/content-product', [ProductController::class, 'store'])
        ->name('contentProduct.store');

    // Halaman Detail Product Admin
    Route::get('/admin/detail-product', [DetailController::class, 'index'])
        ->name('detailProduct.index');

    Route::post('/admin/detail-product', [DetailController::class, 'store'])
        ->name('detailProduct.store');

    Route::post('/admin/color-product/{productId}', [ColorController::class, 'store'])->name('colorProduct.store');

    Route::get('/admin/color-product/{productId}', [ColorController::class, 'index'])->name('admin.colorProduct');


        // PROSES ADMIN //

    // CREATE //

        // Tambah Color Product
        Route::get('/admin/add-new-color-product/{productId}', function ($productId) {
            return view('/admin/process/addColor', compact('productId'));
        })->middleware(['auth', 'verified'])->name('addColor');
        

        // Tambah Baru Product
        Route::get('/admin/add-new-product', function () {
            return view('/admin/process/addProduct');
        })->middleware(['auth', 'verified'])->name('addProduct');

        // Tambah Baru Detail Product
        Route::get('/admin/add-new-detail-product', [DetailController::class, 'add'], function () {
            return view('/admin/process/addDetail');
        })->middleware(['auth', 'verified'])->name('addDetail.add');

        // Tambah Baru Catalog
        Route::get('/admin/add-new-catalog', function () {
            return view('/admin/process/addCatalog');
        })->middleware(['auth', 'verified'])->name('addCatalog');

    // END CREATE //

    // UPDATE //

        // Update Color
        Route::get('/admin/update-color-product/{colorId}', [ColorController::class, 'update'])
        ->middleware(['auth', 'verified'])
        ->name('updateColor.update');

        Route::post('/admin/update-color-product/{colorId}', [ColorController::class, 'updated'])
        ->middleware(['auth', 'verified'])
        ->name('updateColor.updated');


        // Update Product
        Route::get('/admin/update-product{id}', [ProductController::class, 'update'], function () {
            return view('/admin/updateProduct');
        })->middleware(['auth', 'verified'])->name('updateProduct.update');

        Route::post('/update-product{id}', [ProductController::class, 'updated'], function () {
            return view('/admin/updateProduct');
        })->middleware(['auth', 'verified'])->name('updateProduct.updated');


        // Update Detail Product
        Route::get('/admin/update-detail{id}', [DetailController::class, 'update'], function () {
            return view('/admin/updateDetail');
        })->middleware(['auth', 'verified'])->name('updateDetail.update');

        Route::post('/update-detail{id}', [DetailController::class, 'updated'], function () {
            return view('/admin/updateDetail');
        })->middleware(['auth', 'verified'])->name('updateDetail.updated');


        // Update Catalog
        Route::get('/admin/update-catalog{id}', [CatalogController::class, 'update'], function () {
            return view('/admin/updateCatalog');
        })->middleware(['auth', 'verified'])->name('updateCatalog.update');

        Route::post('/update-catalog{id}', [CatalogController::class, 'updated'], function () {
            return view('/admin/updateCatalog');
        })->middleware(['auth', 'verified'])->name('updateCatalog.updated');

    // END UPDATE //

    // DELETE //

        // Hapus Data Color Product
        Route::delete('/admin/delete-color/{colorId}', [ColorController::class, 'delete'])
        ->middleware(['auth', 'verified'])
        ->name('deleteColor.delete');

        // Hapus Data Product
        Route::delete('/delete-product{id}', [ProductController::class, 'delete'], function () {
            return view('/admin/deleteProduct');
        })->middleware(['auth', 'verified'])->name('deleteProduct.delete');

        // Hapus Data Detail Product
        Route::delete('/delete-detail{id}', [DetailController::class, 'delete'], function () {
            return view('/admin/deleteDetail');
        })->middleware(['auth', 'verified'])->name('deleteDetail.delete');

        // Hapus Data Catalog
        Route::delete('/delete-catalog{id}', [CatalogController::class, 'delete'], function () {
            return view('/admin/deleteCatalog');
        })->middleware(['auth', 'verified'])->name('deleteCatalog.delete');

    // END DELETE //

// END PROSES ADMIN //
});

// Halaman Utama (Home Landing Page)
Route::get('/', [CatalogController::class, 'user'], function () {
    return view('home');
});

// Halaman tanpa filter kategori (user)
Route::get('/catalog', [ProductController::class, 'user'])->name('catalog.user');

// Halaman dengan filter kategori (showCatalog)
Route::get('/catalog-page', [ProductController::class, 'showCatalog'])->name('catalog');

// Halaman Detail
Route::get('/detail-product{id}', [ProductController::class, 'detail'])->name('product.detail');


require __DIR__.'/auth.php';
