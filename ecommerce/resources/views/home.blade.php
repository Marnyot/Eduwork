@extends('template.layout')

@section('title', 'Beranda')

@section('content')
    <div class="hero text-center">
        <h1 class="hero-title fw-bold mx-auto">Selamat Datang di <span class="hero-highlight">Eduwork</span></h1>
        <hr class="hero-rule">
        <p class="hero-subtitle lead mx-auto">Toko online sederhana untuk kebutuhan belajar kamu.</p>
        <a href="{{ route('products.public') }}" class="btn btn-primary btn-lg">Lihat Produk</a>
    </div>

    <h2 class="mt-5 mb-4">Produk Terbaru</h2>
    <div class="row">
        @forelse ($products as $product)
            <div class="col-md-3 mb-4 d-flex">
                <x-product-card
                    :title="$product->name"
                    :description="'Rp ' . number_format($product->price, 0, ',', '.')"
                    :image="$product->image"
                    :slug="$product->slug"
                />
            </div>
        @empty
            <div class="col">
                <p class="text-muted">Belum ada produk.</p>
            </div>
        @endforelse
    </div>

    {{ $products->links('pagination::bootstrap-5') }}
@endsection
