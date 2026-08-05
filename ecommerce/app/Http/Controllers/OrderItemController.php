<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderItemController extends Controller
{
    public function index(): View
    {
        return view('order-items.index');
    }

    public function create(): View
    {
        return view('order-items.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'order_id' => ['required', 'exists:orders,id'],
            'product_id' => ['required', 'exists:products,id'],
            'quantity' => ['required', 'integer', 'min:1'],
            'price' => ['required', 'integer', 'min:0'],
        ]);

        OrderItem::create($data);

        return redirect()
            ->route('order-items.index')
            ->with('success', 'Item pesanan berhasil ditambahkan.');
    }

    public function show(OrderItem $orderItem): View
    {
        return view('order-items.show', compact('orderItem'));
    }

    public function edit(OrderItem $orderItem): View
    {
        return view('order-items.edit', compact('orderItem'));
    }

    public function update(Request $request, OrderItem $orderItem): RedirectResponse
    {
        $data = $request->validate([
            'quantity' => ['required', 'integer', 'min:1'],
            'price' => ['required', 'integer', 'min:0'],
        ]);

        $orderItem->update($data);

        return redirect()
            ->route('order-items.index')
            ->with('success', 'Item pesanan berhasil diperbarui.');
    }

    public function destroy(OrderItem $orderItem): RedirectResponse
    {
        $orderItem->delete();

        return redirect()
            ->route('order-items.index')
            ->with('success', 'Item pesanan berhasil dihapus.');
    }
}
