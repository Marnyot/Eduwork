@extends('template.layout')

@section('title', 'Daftar Produk')

@section('content')
    <h1 class="mb-4">Daftar Produk</h1>

    <div class="row">
        @forelse ($products as $product)
            <div class="col-md-4 mb-4">
                <x-product-card
                    :title="$product->name"
                    :description="'Rp ' . number_format($product->price)"
                    link="{{ route('products.public') }}"
                />
            </div>
        @empty
            <div class="col">
                <p class="text-muted">Belum ada produk.</p>
            </div>
        @endforelse
    </div>

    {{ $products->links() }}
@endsection