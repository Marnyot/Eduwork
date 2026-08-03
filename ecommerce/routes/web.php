<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/products', function () {
    return view('products', ['products' => Product::orderByDesc('id')->paginate(12)]);
})->name('products.public');

Route::get('/cart', function () {
    return view('cart');
})->name('cart');

Route::get('/checkout', function () {
    return view('checkout');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

// Resource untuk modul Produk
Route::resource('products', ProductController::class)->except(['index']);

// Resource untuk modul Halaman
Route::resource('pages', PageController::class);

// ===== Area Admin (sementara tanpa role, hanya dipisah) =====
Route::prefix('admin')->name('admin.')->group(function () {
    // CRUD Produk Admin
    Route::resource('products', AdminProductController::class);

    // CRUD Kategori Produk
    Route::resource('categories', CategoryController::class);
});
