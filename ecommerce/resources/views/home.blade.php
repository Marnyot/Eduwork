@extends('template.layout')

@section('title', 'Beranda')

@section('content')
    <div class="px-4 py-5 text-center">
        <h1 class="display-5 fw-bold">Selamat Datang di Eduwork</h1>
        <p class="lead">Toko online sederhana untuk kebutuhan belajar kamu.</p>
        <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg">Lihat Produk</a>
    </div>

    <h2 class="mt-5 mb-4">Produk Terbaru</h2>
    <div class="row row-cols-1 row-cols-md-4 g-4">
        @forelse ($products as $product)
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text text-muted">{{ number_format($product->price) }}</p>
                        <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-outline-primary">Detail</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col">
                <p class="text-muted">Belum ada produk.</p>
            </div>
        @endforelse
    </div>
@endsection