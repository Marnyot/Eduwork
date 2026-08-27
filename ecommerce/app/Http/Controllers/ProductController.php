<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Menampilkan daftar semua produk (READ - list).
     */
    public function index(): View
    {
        $products = Product::query()
            ->orderByDesc('id')
            ->paginate(10);

        return view('products.index', compact('products'));
    }

    /**
     * Menampilkan form untuk membuat produk baru.
     */
    public function create(): View
    {
        $categories = ProductCategory::orderBy('name')->get();

        return view('products.create', compact('categories'));
    }

    /**
     * Menyimpan produk baru ke database (CREATE).
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/', 'unique:products,slug'],
            'description' => ['required', 'string'],
            'image' => ['required', 'string', 'max:255'],
            'stock' => ['required', 'integer', 'min:0'],
            'price' => ['required', 'integer', 'min:0'],
            'product_category_id' => ['required', 'exists:product_categories,id'],
        ]);

        Product::create($data);

        return redirect()
            ->route('products.public')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail satu produk (READ - detail).
     * 404 otomatis dikembalikan bila produk tidak ditemukan.
     */
    public function show(string $slug): View
    {
        $product = Product::where('slug', $slug)
            ->with('productCategory')
            ->firstOrFail();

        $product->increment('clicks');

        $productRecommendations = Product::where('product_category_id', $product->product_category_id)
            ->where('id', '!=', $product->id)
            ->where('stock', '>', 0)
            ->inRandomOrder()
            ->take(4)
            ->get();

        $inStock = $product->stock > 0;

        return view('products.show', compact('product', 'productRecommendations', 'inStock'));
    }

    /**
     * Menampilkan form untuk mengubah produk yang sudah ada.
     */
    public function edit(Product $product): View
    {
        $categories = ProductCategory::orderBy('name')->get();

        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Memperbarui data produk yang sudah ada (UPDATE).
     */
    public function update(Request $request, Product $product): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => [
                'required', 'string', 'max:255', 'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
                'unique:products,slug,'.$product->id,
            ],
            'description' => ['required', 'string'],
            'image' => ['required', 'string', 'max:255'],
            'stock' => ['required', 'integer', 'min:0'],
            'price' => ['required', 'integer', 'min:0'],
            'product_category_id' => ['required', 'exists:product_categories,id'],
        ]);

        $product->update($data);

        return redirect()
            ->route('products.public')
            ->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Menghapus produk dari database (DELETE).
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()
            ->route('products.public')
            ->with('success', 'Produk berhasil dihapus.');
    }
}
