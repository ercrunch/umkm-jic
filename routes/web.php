<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\DetailController;
use Illuminate\Support\Facades\Route;

// Halaman Utama (Home Landing Page)
Route::get('/', [CatalogController::class, 'user'], function () {
    return view('home');
});

// Halaman Catalog
Route::get('/catalog-page', [ProductController::class, 'user'], function () {
    return view('catalog');
});

// Halaman Detail
Route::get('/detail-product{id}', [ProductController::class, 'detail'])->name('product.detail');


// HALAMAN ADMIN //

    // Halaman Dashboard Admin
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // Halaman Content Catalog Admin
    Route::get('/content-catalog', [CatalogController::class, 'index'], function () {
        return view('/admin/contentCatalog');
    })->middleware(['auth', 'verified'])->name('contentCatalog.index');

    Route::post('/content-catalog', [CatalogController::class, 'store'], function () {
        return view('/admin/contentCatalog');
    })->middleware(['auth', 'verified'])->name('contentCatalog.store'); //Storage Catalog

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // Halaman Content Product Admin
    Route::get('/content-product', [ProductController::class, 'index'], function () {
        return view('/admin/contentProduct');
    })->middleware(['auth', 'verified'])->name('contentProduct.index');

    Route::post('/content-product', [ProductController::class, 'store'], function () {
        return view('/admin/contentProduct');
    })->middleware(['auth', 'verified'])->name('contentProduct.store'); //Storage Product

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // Halaman Detail Product Admin
    Route::get('/content-detail-product', [DetailController::class, 'index'], function () {
        return view('/admin/detailProduct');
    })->middleware(['auth', 'verified'])->name('detailProduct.index');

    Route::post('/content-detail-product', [DetailController::class, 'store'], function () {
        return view('/admin/detailProduct');
    })->middleware(['auth', 'verified'])->name('detailProduct.store'); //Storage Product

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

// END HALAMAN ADMIN //

// PROSES ADMIN //

    // CREATE //

        // Tambah Baru Product
        Route::get('/add-new-product', function () {
            return view('/admin/process/addProduct');
        })->middleware(['auth', 'verified'])->name('addProduct');

        // Tambah Baru Detail Product
        Route::get('/add-new-detail-product', [DetailController::class, 'add'], function () {
            return view('/admin/process/addDetail');
        })->middleware(['auth', 'verified'])->name('addDetail.add');

        // Tambah Baru Catalog
        Route::get('/add-new-catalog', function () {
            return view('/admin/process/addCatalog');
        })->middleware(['auth', 'verified'])->name('addCatalog');

    // END CREATE //

    // UPDATE //

        // Update Product
        Route::get('/update-product{id}', [ProductController::class, 'update'], function () {
            return view('/admin/updateProduct');
        })->middleware(['auth', 'verified'])->name('updateProduct.update');

        Route::post('/update-product{id}', [ProductController::class, 'updated'], function () {
            return view('/admin/updateProduct');
        })->middleware(['auth', 'verified'])->name('updateProduct.updated');


        // Update Detail Product
        Route::get('/update-detail{id}', [DetailController::class, 'update'], function () {
            return view('/admin/updateDetail');
        })->middleware(['auth', 'verified'])->name('updateDetail.update');

        Route::post('/update-detail{id}', [DetailController::class, 'updated'], function () {
            return view('/admin/updateDetail');
        })->middleware(['auth', 'verified'])->name('updateDetail.updated');


        // Update Catalog
        Route::get('/update-catalog{id}', [CatalogController::class, 'update'], function () {
            return view('/admin/updateCatalog');
        })->middleware(['auth', 'verified'])->name('updateCatalog.update');

        Route::post('/update-catalog{id}', [CatalogController::class, 'updated'], function () {
            return view('/admin/updateCatalog');
        })->middleware(['auth', 'verified'])->name('updateCatalog.updated');

    // END UPDATE //

    // DELETE //

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

require __DIR__.'/auth.php';
