<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Menampilkan daftar semua kategori produk (READ - list).
     */
    public function index(): View
    {
        $categories = ProductCategory::withCount('products')
            ->withSum('products', 'stock')
            ->orderBy('id')
            ->paginate(10);

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Menampilkan form untuk membuat kategori baru.
     */
    public function create(): View
    {
        return view('admin.categories.create');
    }

    /**
     * Menyimpan kategori baru ke database (CREATE).
     */
    public function store(Request $request): RedirectResponse
    {
        $request->merge([
            'slug' => Str::slug($request->filled('slug') ? $request->slug : $request->name),
        ]);

        $data = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:255', 'unique:product_categories,name'],
            'slug' => ['required', 'string', 'max:255', 'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/', 'unique:product_categories,slug'],
        ]);

        ProductCategory::create($data);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengubah kategori yang sudah ada.
     */
    public function edit(ProductCategory $category): View
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Memperbarui data kategori yang sudah ada (UPDATE).
     */
    public function update(Request $request, ProductCategory $category): RedirectResponse
    {
        $request->merge([
            'slug' => Str::slug($request->filled('slug') ? $request->slug : $request->name),
        ]);

        $data = $request->validate([
            'name' => [
                'required', 'string', 'min:3', 'max:255',
                'unique:product_categories,name,'.$category->id,
            ],
            'slug' => [
                'required', 'string', 'max:255', 'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
                'unique:product_categories,slug,'.$category->id,
            ],
        ]);

        $category->update($data);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    /**
     * Menghapus kategori dari database (DELETE).
     */
    public function destroy(ProductCategory $category): RedirectResponse
    {
        if ($category->products()->exists()) {
            return back()->withErrors(['name' => 'Kategori tidak bisa dihapus karena masih punya produk.']);
        }

        $category->delete();

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }
}
