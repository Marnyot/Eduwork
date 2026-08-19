<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Menampilkan ringkasan statistik toko.
     */
    public function index(): View
    {
        $stats = [
            [
                'label' => 'Produk',
                'value' => Product::count(),
                'icon' => 'box-seam-fill',
            ],
            [
                'label' => 'Kategori Produk',
                'value' => ProductCategory::count(),
                'icon' => 'tags-fill',
            ],
            [
                'label' => 'Klik Produk',
                'value' => (int) Product::sum('clicks'),
                'icon' => 'cursor-fill',
            ],
            [
                'label' => 'Order',
                'value' => Order::count(),
                'icon' => 'receipt-cutoff',
            ],
            [
                'label' => 'User',
                'value' => User::count(),
                'icon' => 'people-fill',
            ],
        ];

        $orderTrend = collect(range(6, 0))->map(function (int $daysAgo) {
            $date = now()->subDays($daysAgo);

            return [
                'label' => $date->format('d/m'),
                'count' => Order::whereDate('created_at', $date->toDateString())->count(),
            ];
        });

        $latestOrders = Order::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'orderTrend', 'latestOrders'));
    }
}
