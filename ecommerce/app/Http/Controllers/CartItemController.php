<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CartItemController extends Controller
{
    public function index(): View
    {
        return view('cart.index');
    }

    public function create(): View
    {
        return view('cart.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'quantity' => ['required', 'integer', 'min:1'],
        ]);

        CartItem::create([
            ...$data,
            'user_id' => auth()->id(),
        ]);

        return back()->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }

    public function show(CartItem $cartItem): View
    {
        return view('cart.show', compact('cartItem'));
    }

    public function edit(CartItem $cartItem): View
    {
        return view('cart.edit', compact('cartItem'));
    }

    public function update(Request $request, CartItem $cartItem): RedirectResponse
    {
        $data = $request->validate([
            'quantity' => ['required', 'integer', 'min:1'],
        ]);

        $cartItem->update($data);

        return back()->with('success', 'Jumlah item berhasil diperbarui.');
    }

    public function destroy(CartItem $cartItem): RedirectResponse
    {
        $cartItem->delete();

        return back()->with('success', 'Item berhasil dihapus dari keranjang.');
    }
}
