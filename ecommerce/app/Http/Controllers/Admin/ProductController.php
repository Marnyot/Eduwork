<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
    public function index(Request $request): View
    {
        $products = Product::query()->with('productCategory');

        if ($request->filled('search')) {
            $keyword = '%'.$request->search.'%';
            $products->where(function ($query) use ($keyword) {
                $query->where('name', 'like', $keyword)
                    ->orWhereHas('productCategory', fn ($q) => $q->where('name', 'like', $keyword));
            });
        }

        $sortable = ['name' => 'name', 'price' => 'price', 'stock' => 'stock'];
        [$column, $direction] = explode('_', $request->get('sort', 'id_asc'), 2) + ['id', 'asc'];

        $products = $products
            ->orderBy($sortable[$column] ?? 'id', $direction === 'asc' ? 'asc' : 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('admin.products.index', compact('products'));
    }

    /**
     * Menampilkan form untuk membuat produk baru.
     */
    public function create(): View
    {
        $categories = ProductCategory::orderBy('name')->get();

        return view('admin.products.create', compact('categories'));
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
            ->route('admin.products.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail satu produk (READ - detail).
     * 404 otomatis dikembalikan bila produk tidak ditemukan.
     */
    public function show(Product $product): View
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Menampilkan form untuk mengubah produk yang sudah ada.
     */
    public function edit(Product $product): View
    {
        $categories = ProductCategory::orderBy('name')->get();

        return view('admin.products.edit', compact('product', 'categories'));
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
            ->route('admin.products.index')
            ->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Menghapus produk dari database (DELETE).
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Produk berhasil dihapus.');
    }
}
