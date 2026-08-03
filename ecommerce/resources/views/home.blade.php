@extends('template.layout')

@section('title', 'Beranda')

@section('content')
    <div class="px-4 py-5 text-center">
        <h1 class="display-5 fw-bold">Selamat Datang di Eduwork</h1>
        <p class="lead">Toko online sederhana untuk kebutuhan belajar kamu.</p>
        <a href="{{ route('products.public') }}" class="btn btn-primary btn-lg">Lihat Produk</a>
    </div>

    <h2 class="mt-5 mb-4">Produk Terbaru</h2>
    <div class="row">
        @forelse ($products as $product)
            <div class="col-md-3 mb-4">
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
@endsection