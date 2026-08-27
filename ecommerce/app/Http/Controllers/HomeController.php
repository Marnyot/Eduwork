<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman beranda untuk user.
     */
    public function index(): View
    {
        $products = Product::query()
            ->with('productCategory')
            ->where('stock', '>', 0)
            ->orderByDesc('id')
            ->take(8)
            ->get();

        $categories = ProductCategory::withCount('products')
            ->orderBy('name')
            ->get();

        return view('home', [
            'products' => $products,
            'categories' => $categories,
            'productCount' => Product::count(),
            'categoryCount' => $categories->count(),
        ]);
    }
}
