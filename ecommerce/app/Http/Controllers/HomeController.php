<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman beranda untuk user.
     */
    public function index(): View
    {
        $products = Product::query()
            ->orderByDesc('id')
            ->take(8)
            ->get();

        return view('home', compact('products'));
    }
}
