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
            ->paginate(8);

        return view('home', compact('products'));
    }
}
