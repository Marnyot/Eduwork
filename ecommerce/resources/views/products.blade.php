@extends('template.layout')

@section('title', 'Daftar Produk')

@section('content')
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
        <h1 class="mb-0">Daftar Produk</h1>

        <form action="{{ route('products.public') }}" method="GET" role="search" class="search-form">
            <div class="input-group">
                <span class="input-group-text">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                    </svg>
                </span>
                <input type="search" name="search" class="form-control"
                       placeholder="Cari produk atau kategori..."
                       value="{{ request('search') }}" autocomplete="off">
                @if (request('search'))
                    <a href="{{ route('products.public') }}" class="input-group-text text-decoration-none clear-search" title="Hapus pencarian">&times;</a>
                @endif
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </form>
    </div>

    @if (request('search'))
        <span class="search-result-info d-inline-block mb-4">
            {{ $products->total() }} produk ditemukan untuk
            “<strong>{{ request('search') }}</strong>”
        </span>
    @endif

    <div class="row">
        @forelse ($products as $product)
            <div class="col-md-4 mb-4">
                <x-product-card
                    :title="$product->name"
                    :category="$product->productCategory?->name"
                    :price="$product->price"
                    :image="$product->image"
                    :slug="$product->slug"
                />
            </div>
        @empty
            <div class="col">
                <p class="text-muted">
                    @if (request('search'))
                        Tidak ada produk yang cocok dengan pencarianmu.
                    @else
                        Belum ada produk.
                    @endif
                </p>
            </div>
        @endforelse
    </div>

    {{ $products->links('pagination::bootstrap-5') }}
@endsection