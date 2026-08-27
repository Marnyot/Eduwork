@extends('template.layout')

@section('title', 'Detail Produk')

@section('content')
    <div class="container my-4">
        <div class="mb-3">
            <a href="{{ route('products.public') }}" class="btn btn-link px-0">&larr; Kembali</a>
        </div>

        <div class="row">
            <div class="col-md-3">
                <img src="{{ asset($product->image) }}" class="img-fluid" alt="{{ $product->name }}">
            </div>
            <div class="col-md-9">
                <h1 class="detail-title">{{ $product->name }}</h1>
                <p>{{ $product->description }}</p>
                <p class="detail-price">Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                <p>Kategori: {{ $product->productCategory->name }}</p>
                <p>
                    <span class="badge text-bg-{{ $inStock ? 'success' : 'secondary' }}">
                        {{ $inStock ? 'Stok tersedia (' . $product->stock . ')' : 'Stok habis' }}
                    </span>
                </p>
                @if ($inStock)
                    <a href="#" class="btn btn-primary">Add to Cart</a>
                @else
                    <button type="button" class="btn btn-secondary" disabled>Stok Habis</button>
                @endif
            </div>
        </div>

        <div class="mt-5">
            <h3>Rekomendasi Produk</h3>
            <div class="row">
                @forelse ($productRecommendations as $relatedProduct)
                    <div class="col-md-3 mb-4 d-flex">
                        <x-product-card
                            :title="$relatedProduct->name"
                            :description="'Rp ' . number_format($relatedProduct->price, 0, ',', '.')"
                            :image="$relatedProduct->image"
                            :slug="$relatedProduct->slug"
                        />
                    </div>
                @empty
                    <div class="col">
                        <p class="text-muted">Belum ada rekomendasi.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
