<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/products', function (Request $request) {
    $query = Product::query()->with('productCategory');

    if ($request->filled('search')) {
        $keyword = '%'.$request->search.'%';
        $query->where(function ($q) use ($keyword) {
            $q->where('name', 'like', $keyword)
                ->orWhere('description', 'like', $keyword)
                ->orWhereHas('productCategory', function ($category) use ($keyword) {
                    $category->where('name', 'like', $keyword);
                });
        });
    }

    $products = $query->orderByDesc('id')->paginate(12)->withQueryString();

    return view('products', compact('products'));
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

// Detail produk by slug
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('products.show');

// Resource untuk modul Produk
Route::resource('products', ProductController::class)->except(['index', 'show']);

// ===== Area Admin (sementara tanpa role, hanya dipisah) =====
Route::prefix('admin')->name('admin.')->group(function () {
    // CRUD Produk Admin
    Route::resource('products', AdminProductController::class);

    // CRUD Kategori Produk
    Route::resource('categories', CategoryController::class);
});

// ===== Auth (Breeze) =====
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
